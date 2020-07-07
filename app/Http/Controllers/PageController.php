<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Carbon\Carbon;
use Hash;
use App\FlashSale;
use App\ProductFlashSale;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $now = Carbon::now();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product= Product::where('promotion_price','<>',0)->take(4)->get();
        $flash_sale = FlashSale::where('end','>=',$now)->orderBy('start','asc')->with('productFlashSales')->first();
        if($flash_sale){
            $product_flash_sales = $flash_sale->productFlashSales()->with('product')->paginate(4);
        }
        else {
            $product_flash_sales = NULL;
        }
        // dd($flash_sale);
        $end_flash_sale = NULL;
        if ($flash_sale) {
            $end_flash_sale = Carbon::parse($flash_sale->end)->format('Y/m/d H:i:s');
        }
        // dd($end_flash_sale);
        return view('page.index',compact('end_flash_sale','product_flash_sales','product','flash_sale','slide','new_product','sale_product'));
    }
    //21/04 dang lam sp voi sp tuong tu
    public function getAbout(){
        return view('page.about');
    }
    
    public function getProductType($type){
        // $product_type=ProductType::where('id',$type)->first();
        
        if($type == 0){
            $products = Product::where('new',1)->get();
        } 
        else {
            $products=Product::where('id_type',$type)->get();
        }
        $product_type=ProductType::select('name','id')->get();
        $product_type_name = ProductType::select('name')->where('id',$type)->first();
        // lấy sản phẩm được mua nhiều nhất theo thứ tự giảm dần
        $product_best_selling = Product::orderByDesc('solded')->take(3)->get();
        // dd($product_best_selling);
        return view('page.product_type',compact('products','product_type','product_type_name','product_best_selling'));
    }

    public function getContacts(){
        return view('page.Contacts');
    }
    
    public function getProduct(Request $req){
        // dd(intval($productflashsales[0]->discount_percent));
        $product_detail=Product::where('id',$req->id)->first();
        $productflashsales = ProductFlashSale::select()->with('flashSale','product')->where('product_id','=',$product_detail->id)->first();
        if(!is_null($productflashsales) && $productflashsales->flashSale->end>Carbon::now()){
            $product_detail['sale']=$product_detail->unit_price*(100-intval($productflashsales->discount_percent))/100;
        }
        else 
            $product_detail['sale']=0;
        // dd($product_detail);
        $product_related=Product::where('id_type',$product_detail->id_type)->paginate(3);
        $new_product = Product::where('new',1)->take(6)->get();
        $product_best_selling = Product::orderByDesc('solded')->take(6)->get();
        return view('page.product',compact('product_detail','product_related','product_best_selling','new_product'));
    }

    public function getAddToCart(Request $req,$id){
        $product = Product::find($id);
        // dd($product);
        $productflashsales = ProductFlashSale::select()->with('flashSale','product')->where('product_id','=',$product->id)->first();
        // kiem tra co phai la sp flash sale khong 
        // dd($productflashsales);
        if(!is_null($productflashsales) && $productflashsales->flashSale->end>Carbon::now()){
            $product['sale']=$product->unit_price*(100-intval($productflashsales->discount_percent))/100;
        }
        else 
            $product['sale']=0;
        // dd($product);
        //neu co thi luu cai gia sale vao session neu khong out
        //khi het sale 
        $qty = intval($req->qty);
        if (!$qty) {$qty = 1;}
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        for($i=0; $i<$qty; $i++) {
            $cart->add($product,$id);
            $req->session()->put('cart',$cart);
        }
        return redirect()->back();
    }

    public function getDeleteCart($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        $cart = Session::has('cart')? Session::get('cart') : null;
        if(Auth::check()){
            $user = Auth::user();
            return view('page.checkout',compact('cart','user'));
        }
        else 
            return view('page.checkout',compact('cart'));
    }
    
    public function postCheckout(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|',
            'name'=>'required|max:30',
            'phone' => 'required',
            'notes'=>'required',
        ],
        [
            'email.required'=>'Hãy nhập lại email',
            'email.email'=>'Email chưa đúng định dạng',
            'name.required'=>'Hãy nhập lại tên',
            'phone.required'=>'Hãy nhập lại số điện thoại',
            'note.required'=>'Hãy nhập thêm ghi chú',

        ]);
        $cart =Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->email = $req->email;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer =$customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->payment =$req->payment_method;
        $bill->total =$cart->totalPrice;
        $bill->note =$req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $product = Product::find($key);
            $product->solded = ($product->solded + $value['qty']);
            $product->save();

            $bill_detail=new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->route('trangchu')->with('thongbao','Đặt hàng thành công');
    }
    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search',compact('product'));
    }

    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('trangchu')->with('thongbao','Bạn đã đăng nhập');
        }
        else   
            return view('page.login');
    }
    
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:25'
        ],
        [
            'email.required'=>'Hãy nhập lại email',
            'email.email'=>'Email chưa đúng định dạng',
            'password.required'=>'Hãy nhập lại password',
            'password.max'=>'Mật khẩu ngắn hơn 25 kí tự',
            'password.min'=>'Mật khẩu dài hơn 6 kí tự',
        ]);
        $user = $req->only('email','password');
        if(Auth::attempt($user,$req->has('remember'))){
            if (Auth::user()->quyen) {
                return redirect()->route('category.index');
            }
            else 
                return redirect()->route('trangchu')->with('thongbao','Đăng nhập thành công');
        }
        else {
            return redirect()->route('login')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getSignup(){
        if(Auth::check()){
            return redirect()->route('login')->with('thongbao','Bạn đã đăng nhập vui lòng đăng xuất rồi đăng ký');
        }
        else    
            return view('page.signup');
    }
    
    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:6|max:25',
                'name'=>'required|max:30',
                'reset_password'=>'required|same:password',
                'phone' => 'required'
            ],
            [
                'email.required'=>'Hãy nhập lại email',
                'email.email'=>'Email chưa đúng định dạng',
                'email.unique'=>'email đã tồn tại',
                'password.required'=>'Hãy nhập lại password',
                'password.max'=>'Mật khẩu ngắn hơn 25 kí tự',
                'password.min'=>'Mật khẩu dài hơn 6 kí tự',
                'name.required'=>'Hãy nhập lại tên',
                'phone.required'=>'Hãy nhập lại số điện thoại',
                'name.max'=>'Tên ngắn hơn 30 kí tự',
                'reset_password.required'=>'Hãy Nhập lại mật khẩu',
                'reset_password.same'=>'Mật khẩu nhập lại không đúng',
            ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->route('login')->with('thongbao','Đăng kí thành công');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function getUserInformation(){
        if(Auth::check()){
            $user = Auth::user();
            return view('page.user_information',compact('user'));
        }
        else
            return redirect('dangnhap')->with('thongbao','Bạn chưa Đăng Nhập!');
    }
    public function postUserInformation(Request $req,$id){
        $user = User::find($id);
        $this->validate($req,
        [
            'name'=>'required|max:30',
            'phone' => 'required'
        ],
        [
            'name.required'=>'Hãy nhập lại tên',
            'phone.required'=>'Hãy nhập lại số điện thoại',
            'name.max'=>'Tên ngắn hơn 30 kí tự',
        ]);
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->update(['updated_at' => now()]);

        if($req->checkPassword == "on") 
        {
            $this->validate($req,
            [
                'password'=>'min:6|max:25',
                'reset_password'=>'same:password',
            ],
            [
                'password.required'=>'Hãy nhập lại password',
                'password.max'=>'Mật khẩu ngắn hơn 25 kí tự',
                'password.min'=>'Mật khẩu dài hơn 6 kí tự',
                'reset_password.required'=>'Hãy Nhập lại mật khẩu',
                'reset_password.same'=>'Mật khẩu nhập lại không đúng',
            ]);
            $user->password=bcrypt($req->password);
        }
        $user->save();
        return redirect()->back()->with('thongbao','Đã sửa thông tin thành công');
    }

}

