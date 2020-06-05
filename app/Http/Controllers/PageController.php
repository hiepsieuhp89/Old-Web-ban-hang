<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHomePage(){
        $slide = Slide::all();
    	//return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::WHERE('new',1)->paginate(8);
        $sale_product = Product::WHERE('promotion_price','<>',0)->paginate(8);
        return view('page.HomePage',compact('slide','new_product','sale_product'));
    }

    public function getProductType($type){
        $product = Product::WHERE('id_type',$type)->get();
        $other_product = Product::WHERE('id_type','<>',$type)->paginate(3);
        $all_type = ProductType::all();
        $type_product = ProductType::WHERE('id',$type)->first();
    	return view('page.ProductType',compact('product','other_product','all_type','type_product'));
    }

    public function getProductDetail(Request $req){
        $product = Product::WHERE('name',$req->name)->first();
        $new_product = Product::WHERE('new',1)->paginate(4);
        $other_product = Product::WHERE('id_type',$req->type)->WHERE('name','<>',$req->name)->paginate(6);
        $top_product = Product::ORDERBY('unit_price','DESC')->WHERE('name','<>',$req->name)->paginate(4);//Lấy 4 sản phẩm có giá cao nhất giảm dần
        return view('page.Product_detail',compact('product','new_product','other_product','top_product'));
    }

    public function getContact(){
    	return view('page.Contact');
    }

    public function getAbout(){
    	return view('page.About');
    }

    public function getAddToCart(Request $req, $id, $qty){
        $product = Product::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null; // toan tu 3 ngoi
        $cart = new Cart($oldcart);
        $cart -> add($product,$id,$qty);
        $req -> Session() -> put('cart',$cart);
        return redirect()->back();
        //return view('header');
    }
    public function postAddMultiToCart(Request $req, $id){
        $product = Product::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null; // toan tu 3 ngoi
        $cart = new Cart($oldcart);
        $qty = $req->quantity;
        $cart -> add($product,$id,$qty);
        $req -> Session() -> put('cart',$cart);
        return redirect()->back();
        //return view('header');
    }

    public function getRemoveItem($id){
        $oldcart = Session('cart') ? Session::get('cart') : null; // toan tu 3 ngoi
        $cart = new Cart($oldcart);
        $cart -> removeItem($id);
        Session::put('cart',$cart);
        
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getBill(){
        return view('page.DetailBill');
    }
    public function postCheckOut(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone_number;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id = $customer->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach($cart->items as $key => $value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/ $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
           // return redirect()->route('HomePage')
        return redirect()->route('HomePage')->with('thong bao','Đặt hàng thành công!');
    }
    public function getLoginPage(){
        return view('page.LoginPage');
    }
    /*
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|',
            'password'=>'required|min:6|max:30', 

        ],
        [
            'email.required'=>'Nhập email đi cháu', 
            'email.email'=>'Thứ m nhập đéo phải email', 
            'password.required'=>'Không có mật khẩu sau đăng nhập đây',
            'password.min'=>'Mật khẩu phải ít nhất 6 kí tự anh ơi', 
            'password.max'=>'Mật khẩu gì mà dài thế', 
        ]);
        $credentials = array('email' => email ,'p' );
        
    }
    */
    public function postLogin(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->back()->with('dang nhap', 'Đăng nhập thành công!');
        } else {
            return redirect()->back()->with('dang nhap', 'Đăng nhập không thành công!');
        }
    }
    public function getSignup(){
        return view('page.Signup');
    }
    public function postSignup(Request $req){
        $validatedate = $req->validate(
            [
                'email'=>'bail|required|email|unique:users,email',
                'password'=>'bail|required|min:6|max:30', 
                'username'=>'bail|required',
                'password_confirmation'=>'bail|required|same:password'
            ],
            [
                'username.required'=>'Không có tên à em',
                'email.required'=>'Nhập email đi cháu', 
                'email.email'=>'Thứ m nhập đéo phải email', 
                'email.unique'=>'Dùng lại email ko đc nha cháu', 
                'password.required'=>'Không có mật khẩu sau đăng nhập đây',
                'password_confirmation.required'=>'Nhập lại mật khẩu cho đỡ nhầm nhé', 
                'password_confirmation.same'=>'Mật khẩu ko trùng nhé cháu', 
                'password.min'=>'Mật khẩu phải ít nhất 6 kí tự anh ơi', 
                'password.max'=>'Mật khẩu gì mà dài thế', 
            ]);
        $user = new User();
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->save();
        /*if($validatedate->$errors->any()){
            return redirect()->back()->with('dang ky', 'Đăng ký thành công');
        }
        else{
            return redirect()->route('LoginPage')->with('dang ky', 'Đăng ký thành công');
        }
        */
        return redirect()->back()->with('dang ky', 'Đăng ký thành công');

    }
    public function Seed() {
      $data2 = Product::all();
      $data = $data2;
        $utf8 = array(

            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'd'=>'đ|Đ',

            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );
        foreach($data as $item){
            echo "[<br>
                'name'=>'".$item->name."',<br>";
            foreach($utf8 as $ascii=>$uni) $item->name = preg_replace("/($uni)/i",$ascii,$item->name);
            echo "
                'name2'=>'".strtolower($item->name)."',<br>";
            echo "
                'description'=>'".$item->description."',<br>";
            echo "
                'id_type'=>'".$item->id_type."',<br>";
            echo "
                'unit_price'=>'".$item->unit_price."',<br>";
            echo "
                'promotion_price'=>'".$item->promotion_price."',<br>";
            echo "
                'image'=>'".$item->image."',<br>";
            echo "
                'unit'=>'".$item->unit."',<br>";
            echo "
                'new'=>'".$item->new."'<br>";
            echo "],<br>";
        }
    }
    public function getSearch(Request $req){
        $key_name = strtolower($req->key);
        $utf8 = array(

            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'd'=>'đ|Đ',

            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
            foreach($utf8 as $ascii=>$uni) $key_name = preg_replace("/($uni)/i",$ascii,$key_name);
            
        $namep = $req->key;
        $slide = Slide::all();
        $product = Product::WHERE('name2','LIKE','%' .$key_name. '%')->paginate(16);
        return view('page.Search',compact('slide','product','namep'));
    }
    public function check(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            //true
        } else {
            //false
        }
    }
}
