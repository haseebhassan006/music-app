<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:01
 */

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use View;
use App\Models\Album;
use Image;
use App\Models\ZillaTemplate;
use App\Models\ZillaCategory;
use App\Models\ZillaGroupCategory;


class ZillaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ZillaCategory::with('groupcategory');

        if ($this->request->filled('search')) {
            $data->where('name', 'like', '%' . $this->request->search . '%');
        }

        $data = $data->paginate(10);

        return view('backend.zilla-templates.categories.index', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $groupCategories = ZillaGroupCategory::select("id", "name")->get();

        return view('backend.zilla-templatescategories.create', compact(
            'groupCategories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->request->validate([
            'name'    =>  'required',
            'group_category_id' => 'required',
            'thumb'   => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000',
            ],
            [
                'thumb.mimes' => __('The :attribute must be an jpg,jpeg,png,svg'),
            ]
        );
       

        $image = $this->request->file('thumb');
        $new_name = "";
        if ($image) {
            # code...
            $new_name = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('storage/categories'), $new_name);
        }
        
        
        $form_data = array(
            'name'        =>   $request->name,
            'group_category_id' => $request->group_category_id,
            'thumb'            =>   $new_name
        );


        $user = ZillaCategory::create($form_data);

        return redirect()->route('backend.settings.index')
            ->with('success', __('Created successfully'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ZillaCategory::findorFail($id);

        $groupCategories = ZillaGroupCategory::select("id", "name")->get();

        return view('backend.zilla-templatescategories.categories.edit', compact(
            'groupCategories','category'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        
        $image = $request->file('thumb');
        
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'group_category_id' => 'required',
                'thumb'   => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000',
                ],
                [
                    'thumb.mimes' => __('The :attribute must be an jpg,jpeg,png,svg'),
                ]
            );

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/categories'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
            ]);
        }
  


                
        $form_data = array(
            'name'        =>   $request->name,
            'group_category_id' => $request->group_category_id,
            'thumb'            =>   $image_name
        );
        
        ZillaCategory::whereId($id)->update($form_data);

        return redirect()->route('backend.settings.index')
            ->with('success', __('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = ZillaCategory::find($id);
        
        $delete_status = $item->delete();

        if($delete_status == 1) {
              return redirect()->route('backend.settings.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('backend.settings.index')->with('error',"Can't delete because it has Template in it");
        }

    }

}
