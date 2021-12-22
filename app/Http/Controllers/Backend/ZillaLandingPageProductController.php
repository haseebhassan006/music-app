<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:01
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ZillaLandingPageProduct;

class ZillaLandingPageProductController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getProducts(Request $request)
    {
        $items = ZillaLandingPageProduct::select('id as value', 'name')
                ->where('user_id', $this->request->user()->id)->get();

        return response()->json($items);
    }

    public function index(Request $request)
    {
        // $data = ZillaLandingPageProduct::where('user_id', auth()->user()->id);
        $data = ZillaLandingPageProduct::get();

        if ($this->request->filled('search')) {
            $data->where('name', 'like', '%' . $this->request->search . '%');
        }

        // $data->orderBy('updated_at', 'DESC');
        // $data = $data->paginate(10);

        return view('backend.zilla-products.index')
        ->with('data', $data);
      
    }

    public function create()
     {   
         $currencies      = config('productcurrencies');
         return view('backend.zilla-products.create',compact(
             'currencies'
         ));
    }

    public function createProduct()
    {
        $this->request->validate([
            'name'    =>  'required',
            'price' => 'required',
            'currency'   => 'required',
            ]
        );
        $form_data = array(
            'user_id' => auth()->user()->id,
            'name'        =>   $this->request->name,
            'price' => $this->request->price,
            'currency'        =>   $this->request->currency,
            'description' => $this->request->description,
        );

        ZillaLandingPageProduct::create($form_data);

        return redirect()->route('backend.zilla-products')->with('status', 'success')->with('message', 'product successfully added!');
    }
  
    public function edit($id)
    {
        $item = ZillaLandingPageProduct::findorFail($id);

        $currencies      = config('productcurrencies');
        return view('backend.zilla-products.edit',compact(
            'currencies','item'
        ));
    }

    public function editProduct(Request $request, $id)
    {
        $item = ZillaLandingPageProduct::findorFail($id);

        $this->request->validate([
            'name'    =>  'required',
            'price' => 'required',
            'currency'   => 'required',
            ]
        );
        
        
        $form_data = array(
            'user_id' => auth()->user()->id,
            'name'        =>   $this->request->name,
            'price' => $this->request->price,
            'currency'        =>   $this->request->currency,
            'description' => $this->request->description,
        );


        $item->editProduct($form_data);

        return redirect()->route('backend.zilla-products')->with('status', 'success')->with('message', 'product successfully updated!');
       
    }

    public function delete(Request $request, $id)
    {
        echo "1";die;
        $item = ZillaLandingPageProduct::findorFail($id);

        $item->delete();

        return redirect()->route('backend.zilla-products')->with('status', 'success')->with('message', 'product successfully deleted!');
        
        
    }

}