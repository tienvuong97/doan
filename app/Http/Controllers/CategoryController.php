<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Crypt;
use Validator;

class CategoryController extends Controller
{
  public function getList(){
      $category = Category::paginate(5);
      return view('admin.pages.category.list',['category'=>$category]);
  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        //
        return view('admin.pages.category.add');
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
            'name'=>'required|min:3|max:100|unique:category,name'
        ],
        [
            'name.required'=>'Tên danh mục không được để trống',
            'name.unique'=>'Tên danh mục đã bị trùng',
            'name.min'=>'Tên danh mục chứa từ 3-100 kí tự',
            'name.max'=>'Tên danh mục chứa từ 3-100 kí tự'
        ]);
        $category = new Category;
        $category ->name= $request ->name;
        $category->slug = utf8tourl($request->name);
        $category->status=$request->status;
        $category->save();
        return redirect('admin/category/add')->with('thongbao','Thêm danh mục thành công');

    }

    
    public function getEdit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.pages.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        //
        $category = Category::find($id);
        $this->validate($request,
        [
            'name'=>'required|min:3|max:100|unique:category,name'
        ],
        [
            'name.required'=>'Tên danh mục không được để trống',
            'name.unique'=>'Tên danh mục đã bị trùng',
            'name.min'=>'Tên danh mục chứa từ 3-100 kí tự',
            'name.max'=>'Tên danh mục chứa từ 3-100 kí tự'
        ]);
        
        $category ->name= $request ->name;
        $category->slug = utf8tourl($request->name);
        $category->status=$request->status;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('thongbao','Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('thongbao','Xóa thành công');
    }
}
