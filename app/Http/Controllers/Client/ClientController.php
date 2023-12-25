<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transactions;
use Validator;
use Illuminate\Support\Facades\DB;
use Str;

class ClientController extends Controller
{
    public function index(Request $request){

        if(!Shop::exists()){
            return redirect()->route('register');
        }
        $q = $request->get('q') ? $request->get('q') : '';
        
               
        $category = Category::selectRaw('categories.*')
                ->leftJoin('products', 'categories.id', '=', 'products.category_id')
                ->when(!empty($q), function ($query) use ($q) {
                    $query->where('categories.name', 'like', "%{$q}%");
                    $query->orWhere('products.title', 'like', "%{$q}%");
                })
//                ->where('parent_category_id', null)
                ->when(empty($q), function ($query) use ($q) {
                    $query->where('is_home', 1) ; 
                })
                ->orderBy('orderno', 'asc')
                ->groupBy('categories.id')        
                ->get();
        
        $data = [
            'shop' => Shop::first(),
            'product' => Product::all()->sortByDesc('id')->take(8),
            'category' => $category,
            'title' => 'Home',
            'q'=>$q
        ];

        return view('client.index', $data);
    }
    
    protected function is_mobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    public function products(){
        $data = [
            'shop' => Shop::first(),
            'product' => Product::orderBy('id', 'DESC')->paginate(16),
            'category' => Category::all()->sortByDesc('id'),
            'title' => 'Products'
        ];

        return view('client.products', $data);
    }

    public function searchProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'product' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('clientHome')->withErrors($validator)->withInput();
        }else{
            
            $search = str_replace(' ', '-', strtolower($request->product));

            $data = [
                'title' => 'Result',
                'shop' => Shop::first(),
                'product' => Product::where('title', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(20),
                'search' => $request->product
            ];

            return view('client.productSearch', $data);

        }
    }

    public function category(){
        $data = [
            'shop' => Shop::first(),
            'category' => Category::orderBy('orderno', 'asc')->paginate(12),
            'title' => 'Products'
        ];

        return view('client.category', $data);
    }

    public function categoryProducts(Request $request, $country, $category){
        $q = $request->get('q') ? $request->get('q') : '';
        $sort = $request->get('sort') ? $request->get('sort') : '';
        $category = Category::where('slug', $category)->where('country', strtoupper($country))->first();
        
        $products = Product::where('category_id', $category->id)
                    ->when(!empty($q), function ($query) use ($q) {
                            $query->where('title', 'like', "%{$q}%");
                            $query->orWhere('desc', 'like', "%{$q}%");
                        })
                    ->when(!empty($sort), function ($query) use ($sort) {
                            if($sort == 'asc') {
                                $query->orderBy('title', 'asc');
                            }else {
                                $query->orderBy('orderno', 'asc');
                            }
                        })
                    ->when(empty($sort), function ($query) use ($sort) {  
                        $query->orderBy('orderno', 'asc');
                    })
                    
                    ->paginate(12);    
        $main_cats = Category::where('parent_category_id', null)->where('is_header', 1)->where('is_show_menu', 1)->get();
        $ids = [];
        if($main_cats) {
            foreach ($main_cats as $c) {
                $ids[] = $c->id;
            }
        }
        $data = [
            'shop' => Shop::first(),
            'category' => $category,
            'categories'=>Category::where('is_header', 1)->where('is_show_menu', 1)->whereNotIn('id',$ids)->orderBy('orderno', 'asc')->get(),
            'title' => 'Category - '.str_replace('-', ' ', ucwords($category)),
            'slug'=>$category,
            'products'=> $products,
            'q'=>$q,
            'sort'=>$sort
        ];


        return view('client.categoryProducts', $data);
    }

    public function productDetail(Request $request, $country, $category, $product){
        
        $category = Category::where('slug', $category)->where('country', $country)->first();

        $product = Product::where('slug', $product)->where('country', $country)->first();
        
        $country_detail = \App\Models\Countries::where('iso', strtoupper($country))->first();

        if($product->category->product->count() > 1){
            $recomendationProducts = $product->category->product->take(8);
        }else{
            $recomendationProducts = Product::all()->sortByDesc('id')->take(8);
        }

        $data = [
            'shop' => Shop::first(),
            'product' => $product,
            'recomendationProducts' => $recomendationProducts,
            'title' => str_replace('-', ' ', ucwords($product->title)),
            'category'=>$category,
            'country_detail'=>$country_detail
        ];

        return view('client.productDetail', $data);
    }

    public function checkout(){
        $data = [
            'shop' => Shop::first(),
            'title' => 'Checkout',
            'cart'=>session()->get('cart'),
            'total'=> $this->cartTotal(),
            'countries'=> \App\Models\Countries::all()
        ];

        return view('client.checkout', $data);
    }

    public function checkoutSave(Request $request){
        if($request->method() == 'POST') {
            $model = new Transactions();
            $model->firstname = $request->input('firstname')?$request->input('firstname'):null;
            $model->lastname = $request->input('lastname')?$request->input('lastname'):null;
            $model->email = $request->input('email')?$request->input('email'):null;
            $model->password = $request->input('password')?$request->input('password'):null;
            $model->phone = $request->input('phone')?$request->input('phone'):null;
            $model->address = $request->input('address')?$request->input('address'):null;
            $model->city = $request->input('city')?$request->input('city'):null;
            $model->state = $request->input('state')?$request->input('state'):null;
            $model->zip = $request->input('zip')?$request->input('zip'):null;
            $model->country = $request->input('country')?$request->input('country'):null;
            $model->card_number = $request->input('card_number')?$request->input('card_number'):null;
            $model->card_holders_name = $request->input('card_holders_name')?$request->input('card_holders_name'):null;
            $model->expiry_month = $request->input('expiry_month')?$request->input('expiry_month'):null;
            $model->expiry_year = $request->input('expiry_year')?$request->input('expiry_year'):null;
            $model->cvc = $request->input('cvc')?$request->input('cvc'):null;
            $model->ip_address = $request->ip();
            
            if($model->save()) {
                return response()->json(['success' => true]);
            }
        }
        return response()->json(['success' => 'false']);
    }
    
    public function checkout_message(){
        $data = [
            'title'=>'Card Declined'
        ];
        return view('client.message', $data);
    }

    public function successOrder($order_code){
        $data = [
            'shop' => Shop::first(),
            'order_code' => $order_code,
            'title' => 'Checkout'
        ];

        return view('client.success-order', $data);
    }
    

    public function checkOrder(){
        $data = [
            'shop' => Shop::first(),
            'title' => 'Check Order'
        ];

        return view('client.check-order', $data);
    }

    public function checkOrderStatus(Request $request){

        $order = Order::where('order_code', $request->order_code)->first();


        if($order){
            $data = [
                'shop' => Shop::first(),
                'order' => $order,
                'orderDetail' => OrderDetail::where('order_code', $request->order_code)->get(),
                'title' => 'Check Order'
            ];
            return view('client.check-order', $data);

        }

        $data = [
            'shop' => Shop::first(),
            'title' => 'Check Order'
        ];

        return view('client.check-order', $data);
    }

    public function about(){
        $data = [
            'shop' => Shop::first(),
            'title' => 'About'
        ];

        return view('client.about', $data);
    }
    
    public function privacy(){
        $data = [
            'shop' => Shop::first(),
            'title' => 'Privacy Policy'
        ];

        return view('client.privacy', $data);
    }
    
    public function terms(){
        $data = [
            'shop' => Shop::first(),
            'title' => 'Terms & Conditions'
        ];

        return view('client.terms', $data);
    }
    
    public function contact(){
        $data = [
            'shop' => Shop::first(),
            'title' => 'Contact Us'
        ];

        return view('client.contact', $data);
    }
    
    
    protected function cartTotal() {
        $total = 0;
        foreach((array) session('cart') as $id => $details){
            $total += $details['price'] * $details['quantity'];
        }
        return $total;
    }
    
    public function reset_password() {
        return redirect('/reset-message');
    }
    public function reset_message() {
        return view('auth.passwords.message');
    }
}
