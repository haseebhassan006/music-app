<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:01
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\ZillaCategory;
use App\Models\ZillaTemplate;
use App\Models\ZillaLandingPage;
use App\Models\ZillaBlock;
use App\Models\FormData;
use URL;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Artisan;
use App\Models\Helpers\MailChimp;



class ZillaLandingPageController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index(Request $request)
    {
     
        // $data = ZillaLandingPageProduct::where('user_id', auth()->user()->id);
        $data = ZillaLandingPage::get();
        // if ($this->request->filled('search')) {
        //     $data->where('name', 'like', '%' . $this->request->search . '%');
        // }

        // $data->orderBy('updated_at', 'DESC');
        // $data = $data->paginate(10);
        return view('backend.zilla-landingpages.index')
        ->with('data', $data);
      
    }

    public function previewTemplate($id){
       
        if ($id) {
            $template = ZillaTemplate::find($id);
            if (!$template) {
                return redirect()->route('zilla-templates')
                ->with('error', __('Template id not found'));
            }
            // $template = replaceVarContentStyle($template);
            $item = $template;
            return view('backend.zilla-landingpages.preview_template', compact('item'));
            
        }
        abort(404);
    }

    public function getTemplateJson($id,Request $request)
    {
        $template = ZillaTemplate::find($id);   
        if (!$template) {
            return response()->json([
                'error' => __('Template id not found')
            ]);
        }
         $template = replaceVarContentStyles($template);
        
         $blockscss = replaceVarContentStyles(config('app.blockscss'));
        $blockscss = config('app.blockscss');
        return response()->json([
            'blockscss'=>$blockscss, 
            'style' => $template->style,
            'content'=>$template->content, 
            'thank_you_page' => $template->thank_you_page,
            'thank_you_style' => $template->thank_you_style,
        ]);
        
    }

    public function frameMainPage($id){  
        if ($id) {
            $template = ZillaTemplate::find($id);
            if (!$template) {
                return redirect()->route('zilla-templates')
                ->with('error', __('Template id not found'));
            }
            return view('backend.zilla-landingpages.frame_main_page', compact(
                'template'
            ));
        }
        abort(404);
    }

    public function frameThankYouPage($id){
        
        if ($id) {

            $template = ZillaTemplate::find($id);
            if (!$template) {
                return redirect()->route('zilla-templates')
                ->with('error', __('Template id not found'));
            }
            return view('backend.zilla-landingpages.frame_thank_you_page', compact('template'));
            
        }
        abort(404);
    }


    public function save(Request $request)
    {

        $stn = generateRandomNumber(8);
        $apnm = getAppName();
        // random subdomain
        $request->request->add(['sub_domain' => generateRandomNumber(8).'.'.getAppName()]);
        
        // $validator = Validator::make($request->all(),
        //     [
        //     'name' => 'required|max:255',
        //     'template_id' => 'required',
        //     'sub_domain'     => 'regex:/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/|unique:landing_pages|min:5'
        //     ]
        // );
        $sub_domain = $request->input('sub_domain');
        $template_id = $request->input('template_id');

        // Get template ID content and style => load builder
        $template = ZillaTemplate::find($template_id);

        if (!$template) {
            return redirect()->route('zilla-templates')
            ->with('error', __('Template id not found'));
        }

        $template = replaceVarContentStyles($template);
        $item = "";

        // if ($validator->fails()) {
        //     return redirect()->back()->with('error',$validator->errors()->first());
        // }

        // else{
            $item = ZillaLandingPage::create([
                'user_id'  => auth()->user()->id,
                'name' => $request->input('name'),
                'html' => $template->content,
                'css' => $template->style,
                'thank_you_page_html' => $template->thank_you_page,
                'thank_you_page_css' => $template->thank_you_style,
                'template_id' => $template_id,
                'sub_domain' => $sub_domain,
                'settings' => [
                    "intergration" => [
                        "type" => "none",
                        "settings" => [],
                    ]
                ]
            ]);
        // }
        
        return redirect()->route('backend.zilla-landingpages.builder', ['code'=>$item->code]);
    }

    public function setting($code,Request $request)
    {
        if ($code) {
            
            $data = ZillaLandingPage::where('user_id', $this->request->user()->id);
            
            $item = $data->where('code', $code)->first();
            

            $item_intergration = $item->settings['intergration'];


            if ($item) {
                $intergrations_data = config('intergrations.data');
                return view('backend.zilla-landingpages.settings', compact('item','intergrations_data','item_intergration'));
            }
            
        }
        abort(404);
    }


    public function settingUpdate($id,Request $request)
    {
        
        // add validate intergration
        $intergration_type = $this->request->intergration_type;
        
        $validate_intergration = [];
        
        if ($intergration_type == "mailchimp") {

            $validate_intergration = [
                'mailchimp.api_key'    => 'required',
                'mailchimp.contact_subscription_status'    => 'required',
                'mailchimp.mailing_list'    => 'required',
            ];
            
        }


        $validate = [
            'name'    => 'required',
            'domain_type'   => 'required|integer',
            'sub_domain'           => 'regex:/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/|unique:landing_pages,sub_domain,' . $id,
            'custom_domain'     => 'regex:/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/|unique:landing_pages,custom_domain,' . $id
        ];

        $validate = array_merge($validate, $validate_intergration);
       
        // echo $this->request->type_form_submit;die;

        // $this->request->validate($validate);

        if ($this->request->type_form_submit == 'url') {

            if (filter_var($this->request->redirect_url, FILTER_VALIDATE_URL) === FALSE) {
                return back()->with('error', __('Redirect URL Not a valid URL'));
            }
        }

        if ($this->request->type_payment_submit == 'url') {

            if (filter_var($this->request->redirect_url_payment, FILTER_VALIDATE_URL) === FALSE) {
                return back()->with('error', __('Redirect URL Not a valid URL'));
            }
        }

        $domain_main = '.'.getAppName();
        if (isset($this->request->sub_domain)) {
            # code...
            if (strpos($domain_main, $this->request->sub_domain)) {
                return back()->with('error', __('Subdomain must have ').$domain_main);
            }
        }
        

        $page  = ZillaLandingPage::findOrFail($id);

        $dataRequest = $this->request->all();
        
        if (!$this->request->filled('is_publish')) {
            $dataRequest['is_publish'] = false;
        } else {
            $dataRequest['is_publish'] = true;
        }
        
        // intergrations
        
        $intergration_setting = [
            "type" => "none",
            "settings" => [],
        ];

        switch ($intergration_type) {

            case 'mailchimp':

                $intergration_setting = [
                    "type" => $intergration_type,
                    "settings" => [
                        'api_key'    => $this->request->mailchimp['api_key'],
                        'contact_subscription_status'    => $this->request->mailchimp['contact_subscription_status'],
                        'mailing_list'    => $this->request->mailchimp['mailing_list'],
                        'merge_fields'  => $this->request->mailchimp['merge_fields'],
                    ]
                ];
                break;
            
            default:
                break;
        }

        $dataRequest['settings'] = [
            "intergration" => $intergration_setting
        ];

        $favicon = $this->request->file('favicon');

        if ($favicon) {
            $new_name = 'favicon' . '.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('storage/pages/'.$id.'/'), $new_name);
            $dataRequest['favicon'] = $new_name;
        }

        $social_image = $this->request->file('social_image');
        if ($social_image) {
            $new_name = 'social_image' . '.' . $social_image->getClientOriginalExtension();
            $social_image->move(public_path('storage/pages/'.$id.'/'), $new_name);
            $dataRequest['social_image'] = $new_name;
        }
        
        $page->update($dataRequest);

        return back()->with('success', __('Updated successfully'));
    }

    public function updateBuilder($code, $type = 'main-page', Request $request)
    {
        $type_arr = array('main-page','thank-you-page');
        
        if (!in_array($type, $type_arr)) {
            return response()->json(['error'=>__("Not Found Type")]);
        }

        if ($code) {
            
            $item = ZillaLandingPage::where('code', $code)->first();
            if ($item) {

                if ($type == 'thank-you-page') {
                    $item->thank_you_page_components = $this->request->input('gjs-components');
                    $item->thank_you_page_styles = $this->request->input('gjs-styles');
                    $item->thank_you_page_html = $this->request->input('gjs-html');
                    $item->thank_you_page_css = $this->request->input('gjs-css');
                }
                else{

                    $item->components = $this->request->input('gjs-components');
                    $item->styles = $this->request->input('gjs-styles');
                    $item->html = $this->request->input('gjs-html');
                    $item->css = $this->request->input('gjs-css');
                    $item->main_page_script = $this->request->input('main_page_script');
                    
                }
                
                
                if($item->save()){
                    return response()->json(['success'=>__("Updated successfully")]);
                }
            }
            
        }
        return response()->json(['error'=>__("Updated failed")]);
    }


    public function loadBuilder($code, $type = 'main-page', Request $request){
        
        $type_arr = array('main-page','thank-you-page');
        
        if (!in_array($type, $type_arr)) {
            return response()->json(['error'=>__("Not Found Type")]);
        }

        if ($code) {

            $page = ZillaLandingPage::where('user_id', $this->request->user()->id);
            $pages = $page->where('code', $code)->first();
            if($pages){
                
                if ($type == 'thank-you-page') {
                    return response()->json([
                        'gjs-components'=>$pages->thank_you_page_components, 
                        'gjs-styles' => $pages->thank_you_page_styles,
                        'gjs-html'=>$pages->thank_you_page_html, 
                        'gjs-css' => $pages->thank_you_page_css
                    ]);
                }
                return response()->json([
                    'gjs-components'=>$pages->components, 
                    'gjs-styles' => $pages->styles,
                    'gjs-html'=>$pages->html, 
                    'gjs-css' => $pages->css
                ]);
               
            }
            
        }
        abort(404);
    }


    public function builder($code, $type = 'main-page' ,Request $request){
        
        
        $type_arr = array('main-page','thank-you-page');
      
        if (!in_array($type, $type_arr)) {
            abort(404);
        }
        
       
        if ($code || !in_array($type,['main_page','thank-you-page'])) {

            $page = ZillaLandingPage::where('user_id', $this->request->user()->id);
            
            $pages = $page->where('code', $code)->first();
            
            if($pages){
               
                $blocks = ZillaBlock::with('category')->where('active', true)->orderBy('name')->get();
                $blockscss = replaceVarContentStyles(config('app.blockscss'));
                $images_url = getAllImagesUsers($this->request->user()->id);
                $all_icons = config('app.all_icons');

                return view('backend.zilla-landingpages.builder', compact('pages','blocks','blockscss','images_url','all_icons'));
            }
            
        }
        abort(404);
    }


    public function delete($code,Request $request)
    {
        if ($code) {
            // ZillaLandingPage::where('id', $code)->delete();
            DB::table('zilla_landing_pages')->where('code', '=', $code)->where('user_id', $request->user()->id)->delete();
            // echo $data;die;

            // $item = $data->where('code', $code)->first();

            // if($item){
                // $item->delete();
                return redirect()->route('backend.zilla-landingpages')->with('status', 'success')->with('message', 'Landingpage deleted successfully');
            // }
        }
        abort(404);
    }

    public function clone($id,Request $request)
    {
        $page = ZillaLandingPage::findorFail($id);
        $item = $page->replicate();
        $item->name = "Copy ". $page->name;
        $item->sub_domain = generateRandomNumber(8).'.'.getAppName();
        $item->custom_domain = null;

        $item->save();
        return redirect()->route('backend.zilla-landingpages')->with('status', 'success')->with('message', 'You copy the landing page :name successfully',['name'=>$page->name]);

    }


    public function deleteImage(Request $request)
    {
        $input=$request->all();
        $link_array = explode('/',$input['image_src']);
        $image_name = end($link_array);
        $path = public_path('storage/user_storage/'.$this->request->user()->id."/".$image_name);

        if(File::exists($path)) {
            File::delete($path);
        }
        return response()->json($image_name);
    }

}