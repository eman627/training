<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Http\Resources\productCollection;
use Validator;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new productCollection(products::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
   $product->save();
   return response()->json("succesfull stor", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
