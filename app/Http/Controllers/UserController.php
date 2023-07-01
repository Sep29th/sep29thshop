<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function detailUser()
    {
        $user = User::find(session('user_id'));
    }
    public function editUser()
    {
        $user = User::find(session('user_id'));
    }
    public function cart()
    {
        $cart = DB::table('carts')
            ->where('user_id', '=', session('user_id'))
            ->get();
    }
    public function order($page)
    {
        $user_id = session('user_id');
        if ($page == 'ordered') {
            $data = DB::table('sales_order')
                ->where('user_id', '=', $user_id)
                ->where('status', '!=', 'received')
                ->where('status', '!=', 'cancelled')
                ->get();
            // return

        } else if ($page == 'bought') {
            $data = DB::table('sales_order')
                ->where('user_id', '=', $user_id)
                ->where('status', '=', 'received')
                ->get();
            // return
        } else if ($page == 'cancelled') {
            $data = DB::table('sales_order')
                ->where('user_id', '=', $user_id)
                ->where('status', '=', 'cancelled')
                ->get();
            // return 
        } else return view('404');
    }
    public function detailOrder($order_id)
    {
        $order = DB::table('sales_order')
            ->where('product_id', '=', $order_id)
            ->get();
        // return 
    }
    public function review()
    {
        // vao trang giong het detailproduct, 
        // nhung phan comment se tu co phan danh diem
        // va text danh gia, 1 phim submmit de day 
        // comment vua xong vao dau danh sach review
    }
    public function mainPage()
    {
        $listProduct = Product::all();
        $listCategory = DB::table('products')
            ->selectRaw('DISTINCT(category)')
            ->get();
        $listSale = Product::orderBy('sale', 'desc')
            ->get();
        $listScore = Product::orderBy('score', 'desc')
            ->get();
        $listSold = Product::orderBy('sold', 'desc')
            ->get();
        return view('UserView/MainPage', compact('listProduct', 'listCategory', 'listSale', 'listScore', 'listSold'));
    }
    public function detailProducts($product_id)
    {
        $product = Product::find($product_id);
        $review = DB::table('reviews')
            ->where('product_id', '=', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $product_relate = Product::where('category', $product->category);
        // return
    }
}
