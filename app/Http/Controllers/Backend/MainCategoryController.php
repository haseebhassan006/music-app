<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:01
 */

namespace App\Http\Controllers\Backend;

use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;
use View;
use Image;
use App\Models\MainCategory;

class MainCategoryController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }




    public function index(Request $request)
    {
        // $data = ZillaLandingPageProduct::where('user_id', auth()->user()->id);
        $data = MainCategory::get();

        if ($this->request->filled('search')) {
            $data->where('name', 'like', '%' . $this->request->search . '%');
        }

        // $data->orderBy('updated_at', 'DESC');
        // $data = $data->paginate(10);

        return view('backend.maincategories.index')
        ->with('data', $data);
      
    }

    public function add()
    {
        return view('backend.maincategories.form');
    }


    public function addPost(Request $request){
        $data = $this->request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $maincat = new MainCategory;

        $maincat->name = $request->name;
        $maincat->description =$request->description;
        // echo $flight;die;
        $maincat->save();

         return redirect()->route('backend.maincategories')->with('status', 'success')->with('message', 'Maincategory successfully added!');
    }

    public function delete()
    {
        $data = MainCategory::findOrFail($this->request->route('id'));

        $data->delete();

        return redirect()->route('backend.maincategories')->with('status', 'success')->with('message', 'Maincategory successfully deleted!');
    }


    public function edit($id)
    {
        $data = MainCategory::find($id);

        return view('backend.maincategories.edit')
        ->with('data', $data);
    }


    public function editProduct(Request $request, $id)
    {
        $data = MainCategory::findorFail($id);

        $data = $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
    
        $updatecat = new MainCategory;

        $updatecat->name = $request->name;
        $updatecat->description =$request->description;
        // echo $flight;die;
        $updatecat->editProduct();

        return redirect()->route('backend.maincategories')->with('status', 'success')->with('message', 'product successfully updated!');
       
    }


}