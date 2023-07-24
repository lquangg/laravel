<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function list(Request $request){
        $title = "Danh sách";
        $product = Products::all();
     if($request ->post() && $request->search_name){
        $product =DB::table('products')
        ->where('name','like','%'.$request->search_name.'%')->get();
     }
     return view('product.index',compact('title','product'));

    }
    public function add_products(ProductsRequest $request) {
        $title = "Add new produsts";
        if ($request->isMethod('post')) {

            $params = $request->post();

            unset($params['_token']);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('hinh', $request->file('image'));
            }


            $products = new Products();
            $products->name = $request->name;

            $products->image = $request->image;
            $products->gia = $request->gia;
            $products->mota = $request->mota;

            // Thực công việc lưu dữ liệu
            $products->save();


        }

        return view('product.add', compact('title'));
    }

    public function edit_products (ProductsRequest $request,$id) {
        $title = "Edit products";

        // Tìm kiếm thông tin chi tiết của 1 bản ghi theo id
        $detail = Products::find($id);
        if ($request->isMethod('post')) {
            $update = Products::where('id', $id)
            ->update($request->except('_token'));
            // except giống unset

        }

        return view('product.edit', compact('title', 'detail'));
    }

    public function delete_products($id) {
        if ($id) {
            $deleted = Products::where('id', $id)->delete();
            if( $deleted){
                return redirect()->route('search');
            }

        }
        return;
    }
}

