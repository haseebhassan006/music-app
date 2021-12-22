<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\ZillaGroupCategory;

class ZillaGroupCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ZillaGroupCategory::query();

        if ($this->request->filled('search')) {
            $data->where('name', 'like', '%' . $this->request->search . '%');
        }

        $data = $data->paginate(10);

        return view('backend.zilla-templates.groupcategories.index', compact(
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

        return view('backend.zilla-templates.groupcategories.create');
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
            'thumb'            =>   $new_name
        );


        $user = ZillaGroupCategory::create($form_data);

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
        $category = ZillaGroupCategory::findorFail($id);

        return view('backend.zilla-templates.groupcategories.edit', compact(
            'category'
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
            'thumb'            =>   $image_name
        );
        
        GroupCategory::whereId($id)->update($form_data);

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
        $item = ZillaGroupCategory::find($id);
        
        $delete_status = $item->delete();

        if($delete_status == 1) {
              return redirect()->route('backend.settings.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('backend.settings.index')->with('error',"Can't delete because it has Group in it");
        }

    }

}
