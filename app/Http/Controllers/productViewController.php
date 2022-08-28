<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\productCollection;
class productViewController extends Controller
{
    public function index()
    {
        $all_products=new productCollection(products::all());

        return view('product.index',['all_products'=> $all_products]) ;
    }
    public function create()
    {
        // if (Auth::user()->cannot('create', users_mobiles::class)) {
        //     abort(403);
        // }
        return view('product.create') ;
    }
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),
        [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|numeric',
        'image' =>'image|mimes:jpeg,png,jpg,gif,PNG,JPG,JPEG,svg|max:2048'
    ], [
        'name.required' => 'برجاء ادخال اسم المنتج',
        'name.string' => 'لابد ان يكون اسم المنتج بالحروف',
        'description.required' => 'برجاء ادخال وصف المنتج ',
        'description.string' => 'لابد ان يكون اسم المستخدم بالحروف',
        'image.required'=>'هذا الحقل مطلوب ادخاله',
        'image.mime'=>'صيغه الصوره غير مدعومه',
        'category_id.required'=>'هذا الحقل مطلوب ادخاله',
]);
if ($validator->fails()) {
    return response()->json(['error'=>$validator->errors()], 401);
}
       $product= new products();
       $file=$request->file('image');
       $upload_path="public/image";
      $originalName= $file->getClientOriginalName();
      $file->move($upload_path,$originalName);
      $product=new products;
      $product->name=$request->name;
      $product->price=$request->price;
      $product->description=$request->description;
      $product->category_id=$request->category_id;
      $product->image=$originalName;
      if($product->save())
      return redirect()->route('product.index')->with('success','product created successfully');


    }
}
