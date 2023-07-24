<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function lit(Request $request){
        $title = "Danh sách";
        $categorys = Category::all();
     if($request ->post() && $request->search_name){
        $categorys =DB::table('category')
        ->where('name','like','%'.$request->search_name.'%')->get();
     }
     return view('category.index',compact('title','categorys'));

    }
    public function add_category(CategoryRequest $request) {
        $title = "Add new category";
        if ($request->isMethod('post')) {

            $params = $request->post();

            unset($params['_token']);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('hinh', $request->file('image'));
            }


            $category = new Category();
            $category->name = $request->name;

            $category->image = $request->image;



            // Thực công việc lưu dữ liệu
            $category->save();


        }

        return view('category.add', compact('title'));
    }

    public function edit_category (CategoryRequest $request,$id) {
        $title = "Edit Category";

        // Tìm kiếm thông tin chi tiết của 1 bản ghi theo id
        $detail = Category::find($id);
        if ($request->isMethod('post')) {
            $update = Category::where('id', $id)
            ->update($request->except('_token'));
            // except giống unset

        }

        return view('category.edit', compact('title', 'detail'));
    }

    public function delete_category($id) {
        if ($id) {
            $deleted = Category::where('id', $id)->delete();
            if( $deleted){
                return redirect()->route('search');
            }

        }
        return;
    }
}



