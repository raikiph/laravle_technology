<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        // seo
        $meta_desc = "shop cong nghe cua raiki";
        $meta_keywords = "cong nghe";
        $meta_title = "shop cong nghe";
        $url_canonical = $request->url();

        // seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderBy('tbl_product.product_id')->get();
        // $manager_product = view('admin.all_product')->with('all_product', $all_product);
        // return view('admin_layout')->with('admin.all_product', $manager_product);
        return view('pages.home')->with('category', $cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product'));
    }
    public function tim_kiem(Request $request){
        $keyword = $request->keyword_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        return view('pages.product.search')->with('category', $cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
    public function send_mail(){
        $to_name = 'Raiki';
        $to_email = 'raikiphivan@gmail.com';
        $data = array("name"=>"Mail tu tai khoan khach hang","body"=>'Mail gui ve van de hang hoa');
        Mail::send('admin.',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Quan mat khau admin');
            $message->from($to_email,$to_name);
        });
}
}
