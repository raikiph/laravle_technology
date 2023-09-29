<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    use App\Http\Requests;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Redirect;
    session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function add_customer(Request $request){
       
        $data = array();
        $data['customer_name'] = $request->customer_name; 
        $data['customer_email'] = $request->customer_email; 
        $data['customer_password'] = md5($request->customer_password); 
        $data['customer_phone'] = $request->customer_phone;
        
        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');
    }
    public function checkout(){
        // echo 'checkout';
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name; 
        $data['shipping_email'] = $request->shipping_email; 
        $data['shipping_address'] = $request->shipping_address; 
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;
        
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function payment(){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function logout_checkout(){
        session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request){
    $email = $request->email_account;
    $password = md5($request->password_account);
    $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
    if ($result) {
            session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
    }else{
            return Redirect::to('/login_checkout');
    }
    }
    public function order_place(Request $request){
        //insert payment
        $data = array();
        $data['payment_method'] = $request->payment_option; 
        $data['payment_status'] = 'Dang cho xu ly'; 
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        //insert order
        $order_data = array();
        $order_data['customer_id'] = session::get('customer_id'); 
        $order_data['shipping_id'] = session::get('customer_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = 5;
        // thay the
        // $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Dang cho xu ly';
        $order_id = DB::table('tbl_order')->insertGetId($data);
        //insert order detail
        $data = array();
        $data['payment_method'] = $request->payment_option; 
        $data['payment_status'] = 'Dang cho xu ly'; 
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        return Redirect::to('/payment');
    }
}
