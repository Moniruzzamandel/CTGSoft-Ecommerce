<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Product;
use App\Category;
use Image; 
use Session;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Products';
        if (Auth::user()->type === 1 || Auth::user()->hasRole('Editor')) {
           $data = Product::with(['creator','category'])->orderBy('id','DESC')->get();
        }else{
           $data = Product::with(['creator','category'])->where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        }
        return view('admin.product.index', compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Product Create';
        $categories = Category::where('status', 1)->pluck('name','id');
        return view('admin.product.create', compact('page_name','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required', 
            'price'=>'required',
            'description'=>'required', 
            'category_id'=>'required',
            'img'=>'required',  
          ]);
  
       $product = new Product();
       $product->title = $request->title;
       $product->slug = str_slug($request->title,'-');
       $product->price = $request->price;
       $product->description = $request->description;
       $product->category_id = $request->category_id;
       $product->status = 1;
       $product->main_image = '';
       $product->thumb_image = '';
       $product->created_by = Auth::id();
       $product->save();
	   
       $file = $request->file('img');
       $extension = $file->getClientOriginalExtension();
       $main_image = 'product_main_'.$product->id.'.'.$extension;
       $thumb_image = 'product_thumb_'.$product->id.'.'.$extension;
       Image::make($file)->resize(400,600)->save(public_path('/product/'.$main_image));
       Image::make($file)->resize(170,225)->save(public_path('/product/'.$thumb_image));
       $product->main_image = $main_image;
       $product->thumb_image = $thumb_image;
       $product->save();

       Session::flash('success', 'Successfully Product Created');   
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = 'Product Edit';
        $product = Product::find($id);
        $categories = Category::where('status',1)->pluck('name','id');
        return view('admin.product.edit',compact('page_name','product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'description'=>'required', 
            'category_id'=>'required',             
          ]);
  
        $product = Product::find($id);
        // Unlink and edit Image
        if($request->file('img')){
            @unlink(public_path('/product/'.$product->$main_image));
            @unlink(public_path('/product/'.$product->$thumb_image));
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $main_image = 'product_main_'.$product->id.'.'.$extension;
            $thumb_image = 'product_thumb_'.$product->id.'.'.$extension;
            Image::make($file)->resize(400,600)->save(public_path('/product/'.$main_image));
            Image::make($file)->resize(170,225)->save(public_path('/product/'.$thumb_image));
            $product->main_image = $main_image;
            $product->thumb_image = $thumb_image;
        }

        $product->title = $request->title;
        $product->slug = str_slug($request->title,'-');
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        Session::flash('success', 'Successfully Product Edit');   
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // Storage::delete('/public/Product/' . $Product->main_image);
        // Storage::delete('/public/Product/' . $Product->thumb_image);
        // Storage::delete('/public/Product/' . $Product->list_image);
        @unlink(public_path('/public/product/'.$product->$main_image));
        @unlink(public_path('/public/product/'.$product->$thumb_image));
        $product->delete();

        Session::flash('success', 'Successfully Product Delete');   
        return redirect()->route('product.index');
    }

    public function status($id){
        $product = Product::find($id);
        if ($product->status === 1) {
             $product->status = 0;
         }else{
              $product->status = 1;
         }
           $product->save();

        Session::flash('success', 'Successfully Status Updated');   
        return redirect()->route('product.index');
     }
}
