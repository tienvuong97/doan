<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Http\Requests\StoreProductTypeRequest;
use Validator;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        //
        $producttype = ProductType::where('status',1)->paginate(5);
        return view('admin.pages.product_type.list',['producttype'=>$producttype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        //
        $category = Category::where('status',1)->get();
        return view('admin.pages.product_type.add',['category'=>$category]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        //
        $this->validate($request,
        [
            'name'=>'required|min:2|max:100|unique:product_type,name'
        ],
        [
            'name.required'=>'Tên loại sản phẩm không được để trống',
            'name.unique'=>'Tên loại sản phẩm đã bị trùng',
            'name.min'=>'Tên loại sản phẩm chứa từ 2-100 kí tự',
            'name.max'=>'Tên loại sản phẩm chứa từ 2-100 kí tự'
        ]);
        $producttype = new ProductType();
        $producttype->idCategory = $request->ct;
        $producttype ->name= $request ->name;
        $producttype->slug = utf8tourl($request->name);
        $producttype->status=$request->status;
        $producttype->save();
        return redirect('admin/producttype/add')->with('thongbao','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        //
        $producttype = ProductType::find($id);
        $category = Category::where('status',1)->get();
        return view('admin.pages.product_type.edit',['category'=>$category,'producttype'=>$producttype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        //
        $producttype = ProductType::find($id);
        $this->validate($request,
        [
            'name'=>'required|min:2|max:100'
        ],
        [
            'name.required'=>'Tên loại sản phẩm không được để trống',
            'name.unique'=>'Tên loại sản phẩm đã bị trùng',
            'name.min'=>'Tên loại sản phẩm chứa từ 2-100 kí tự',
            'name.max'=>'Tên loại sản phẩm chứa từ 2-100 kí tự'
        ]);
        $producttype->idCategory = $request->ct;
        $producttype ->name= $request ->name;
        $producttype->slug = utf8tourl($request->name);
        $producttype->status=$request->status;
        $producttype->save();
        return redirect('admin/producttype/edit/'.$id)->with('thongbao','Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        //
        $producttype = ProductType::find($id);
        $producttype->delete(); 
        return back()->with('thongbao','Xóa thành công');
    }
}
