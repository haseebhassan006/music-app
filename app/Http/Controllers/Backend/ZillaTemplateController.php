<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:01
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use URL;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use View;
use App\Models\Album;
use Image;
use App\Models\ZillaTemplate;
use App\Models\ZillaLandingPage;
use App\Models\ZillaBlock;
use App\Models\ZillaCategory;
use App\Models\ZillaGroupCategory;

class ZillaTemplateController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAllTemplate($id = "",Request $request) {
     
        $data = "";
        $categories = ZillaCategory::all();
        $groupCategories = ZillaGroupCategory::all();
        if ($id) {
            $data = ZillaTemplate::where('category_id', $id);
            $data->where('active', true);
        }
        else{
           $data = ZillaTemplate::all();
           $data->where('active', true);
        }
        if ($this->request->filled('search')) {
            $data->where('name', 'like', '%' . $this->request->search . '%');
        }

        // $data->orderBy('created_at', 'DESC');
          
        // $data = $data->paginate(12);

        return view('backend.zilla-templates.templates', compact('data','groupCategories','categories'));

    }

    public function index(Request $request)
    {
     
        // $data = ZillaLandingPageProduct::where('user_id', auth()->user()->id);
        $data = ZillaTemplate::get();
        // if ($this->request->filled('search')) {
        //     $data->where('name', 'like', '%' . $this->request->search . '%');
        // }

        // $data->orderBy('updated_at', 'DESC');
        // $data = $data->paginate(10);
        return view('backend.zilla-templates.index')
        ->with('data', $data);
      
    }



    // public function create()
    // {   
    //     $categories = ZillaCategory::select("id", "name")->get();
    //     return view('backend.zilla-templates.create', compact(
    //         'categories'
    //     ));
    // }




    public function uploadImage(Request $request)
    {
        $validator = Validator::make($this->request->all(), [
                'files' => 'required|mimes:jpg,jpeg,png,svg|max:20000',
        ]);
        if ($validator->fails()) {    
            return response()->json(['error' => __('The file must be an jpg,jpeg,png,svg')]);
        }
        $images=array();
        $imagesURL=array(); 

        if($request->hasfile('files'))
        {
            $file = $request->file('files');

            $name=$file->getClientOriginalName();
            $new_name = $name;
            $file->move(public_path('storage/content_media/'), $new_name);
            $imagesURL[] = URL::to('/storage/content_media/'.$new_name);
            $images[]=$new_name;

        }
        return response()->json($imagesURL);
    }


}