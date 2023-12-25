<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Countries;
use App\Models\Category;
use Validator;
use Str;
use File;

class ProductController extends Controller
{
    public function index(){
        $data = [
//            'products' => Product::orderBy('orderno', 'asc')->get(),
            'products' => Category::orderBy('orderno', 'asc')->get(),
            'title' => 'Products'
        ];

        return view('admin.product.index', $data);
    }
    
    public function product_view($id){
        $data = [
//            'products' => Product::orderBy('orderno', 'asc')->get(),
            'products' => Product::where('category_id', $id)->orderBy('orderno', 'asc')->get(),
            'title' => 'Products',
            'category'=> Category::where('id', $id)->first()
        ];

        return view('admin.product.product-category-index', $data);
    }

    public function create(Request $request){
        $countries = Countries::all();
        $incat = $request->get('cat')?$request->get('cat'):'';
        return view('admin.product.create', ['title' => 'Add Product', 'countries'=>$countries, 'incat'=>$incat]);
    }

    public function check(Request $request){
        $name = Product::where('title', $request->title)->exists();
        if($name){
            return response()->json(['status' => 'success', 'messages' => 'not available', 'code' => 200], 200);
        }else{
            return response()->json(['status' => 'success', 'messages' => 'available', 'code' => 201], 201);
        }
    }

    public function save(Request $request){

        $validator = Validator($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'desc2' => 'required',
            'redeem_desc' => 'required',
            'terms' => 'required',
            'country' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('productCreate')->withErrors($validator)->withInput();
        }else{
            $ids = [];
            $categories = $request->input('categories');
            if($categories) {
                foreach ($categories as $category) {
                    $product = Product::create([
                        'category_id' => $category,
                        'title' => $request->title,
                        'slug'=>$request->title,
                        'price' => $request->price,
                        'desc' => $request->desc,
                        'desc2' => $request->desc2,
                        'redeem_desc' => $request->redeem_desc,
                        'terms' => $request->terms,
                        'country' => $request->country,
                        'is_dropdown' => $request->is_dropdown?$request->is_dropdown:null,
                        'is_homepage' => $request->is_homepage?$request->is_homepage:0,
                        'faqs'=>$request->faq?json_encode($request->faq):null
                    ]);
                    if($product) {
                        $product->orderno = $product->id;
                        $product->save();
                        $ids[] = $product->id;
                    }
                }
            }
            
            

            return redirect('/admin/product/images/'.$product->slug.'?ids='. implode(',', $ids));
        }
    }

    public function addImages(Request $request, $product){

        $productData = Product::where('slug', $product)->first();

        $data = [
            'title' => 'Add Images - '. str_replace('-', ' ', $product),
            'product' => $productData,
            'ids'=>$request->get('ids')?$request->get('ids'):''
        ];

        return view('admin.product.addImages', $data);
    }


    public function getImages(Request $request){
        $data = ProductImage::where('product_id', $request->id_products)->orderByDesc('id')->get();
        return response()->json($data);
    }

    public function addImagesSave(Request $request){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('shop/products'), $imageName);

        $ids = $request->input('ids')?$request->input('ids'):'';
        if($ids) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                ProductImage::create([
                    'product_id' => $id,
                    'path' => $imageName
                ]);
            }
        }else {
           ProductImage::create([
                'product_id' => $request->id_product,
                'path' => $imageName
            ]); 
        }
        
        

        return response()->json(['status' => 'success', 'code' => 200], 200);
    }

    public function deleteImages(Request $request){
        $filename = $request->get('filename');
        ProductImage::where('path', $filename)->delete();
        $paths = public_path().'/shop/products/'. $filename;
        if(file_exists($paths)){
            unlink($paths);
        }
        return response()->json(['status' => 'success', 'code' => 200], 200);
    }

    public function edit($product){
        $productData = Product::where('slug', $product)->first();
        $countries = Countries::all();
        $data = [
            'product' => $productData,
            'title' => 'Edit product '. str_replace('-', ' ', $product),
            'countries'=>$countries
        ];

        
        return view('admin.product.edit', $data);
    }

    public function editSave(Request $request, $product, $id){

        $validatorCheck = '';
//        if($product != $request->title){
//            $validatorCheck = 'unique:products';
//        }
        
        $validator = Validator($request->all(), [
            'category' => 'required',
            'title' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'desc2' => 'required',
            'redeem_desc' => 'required',
            'terms' => 'required',
            'country' => 'required',
        ]);


        if($validator->fails()){
            return redirect()->route('productEdit', ['product' => $product, 'id' => $id])->withErrors($validator)->withInput();
        }else{
            $prod = Product::where('id', $id)->first();
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'price' => $request->price,
                'desc' => $request->desc,
                'desc2' => $request->desc2,
                'redeem_desc' => $request->redeem_desc,
                'terms' => $request->terms,
                'country' => $request->country,
                'is_dropdown' => $request->is_dropdown?$request->is_dropdown:null,
                'is_homepage' => $request->is_homepage?$request->is_homepage:0,
                'faqs'=>$request->faq?json_encode($request->faq):null
            ]);

            return redirect()->route('productEdit', $prod->slug)->with('success', 'Data updated');
        }
    }
    
    public function copy($product){
        $productData = Product::where('slug', $product)->first();
        $countries = Countries::all();
        $data = [
            'product' => $productData,
            'title' => 'Copy product '. str_replace('-', ' ', $product),
            'countries'=>$countries
        ];

        
        return view('admin.product.copy', $data);
    }
    
    public function copySave(Request $request, $product, $id){


        $product_ = Product::where('id', $id)->first();
        $categories = $request->input('categories');
        if($categories && $product) {
            foreach ($categories as $category) {
                
                $copy_product = Product::create([
                    'category_id' => $category,
                    'title' => $product_->title,
                    'slug'=>$product_->title,
                    'price' => $product_->price,
                    'desc' => $product_->desc,
                    'desc2' => $product_->desc2,
                    'redeem_desc' => $product_->redeem_desc,
                    'terms' => $product_->terms,
                    'country' => $product_->country,
                    'is_dropdown' => $product_->is_dropdown?$product_->is_dropdown:null,
                    'is_homepage' => $product_->is_homepage?$product_->is_homepage:0,
                    'faqs'=>$product_->faqs?$product_->faqs:null
                ]);
                if($copy_product) {
                    $copy_product->orderno = $copy_product->id;
                    $copy_product->save();
                    $images = ProductImage::where('product_id', $product_->id)->get();
                    if($images) {
                        foreach ($images as $image) {
                            ProductImage::create([
                                'product_id' => $copy_product->id,
                                'path' => $image->path
                            ]); 
                        }
                    }
                }
            }
            
            return redirect()->route('productViewCategory', $product_->category_id)->with('success', 'Data updated');
        }

    }
    
    public function edit_multiple(Request $request){
        $ids = $request->input('ids');
        if($ids) {
            $ids = explode(',', $ids);
            $products = Product::whereIn('id', $ids)->get();
            $countries = Countries::all();
            $data = [
                'products' => $products,
                'title' => 'Edit products ',
                'countries'=>$countries,
                'cat'=>$request->get('cat')
            ];
            return view('admin.product.edit-multiple', $data);
        }
        return abort(404);
    }
    
    public function save_mulitple(Request $request, $category){
        $post = $request->input('products');
        
        if($post) {
            foreach ($post as $id=>$product) {
                Product::where('id', $id)->update([
                    'category_id' => $product['category'],
                    'title' => $product['title'],
                    'price' => $product['price'],
                    'desc' => $product['desc'],
                    'desc2' => $product['desc2'],
                    'redeem_desc' => $product['redeem_desc'],
                    'terms' => $product['terms'],
                    'country' => $product['country'],
                    'is_dropdown' => isset($product['is_dropdown']) && $product['is_dropdown']?$product['is_dropdown']:null,
                    'is_homepage' => isset($product['is_homepage']) && $product['is_homepage']?$product['is_homepage']:0,
                    'faqs'=>$product['faq']?json_encode($product['faq']):null
                ]);
            }
            
            return redirect()->route('productViewCategory', $category)->with('success', 'Products are updated');
            
        }
    }
    
    
    public function move_up(Request $request, $id) {
        $productData = Product::where('id', $id)->first();
        if($productData) {
            $aboveProduct = Product::where('orderno', '<', $productData->orderno)->where('category_id', $productData->category_id)->orderBy('orderno', 'desc')->first();
            if($aboveProduct) {
                $orderno = $productData->orderno;
                $productData->orderno = $aboveProduct->orderno;
                $productData->save();
                $aboveProduct->orderno = $orderno;
                $aboveProduct->save();
                return redirect()->route('productViewCategory', $request->get('cat'))->with('success', 'Order is changed');
            }
        }
        return redirect()->route('products');
    }
    
    public function move_down(Request $request, $id) {
        $productData = Product::where('id', $id)->first();
        if($productData) {
            $aboveProduct = Product::where('orderno', '>', $productData->orderno)->where('category_id', $productData->category_id)->orderBy('orderno', 'asc')->first();
            if($aboveProduct) {
                $orderno = $productData->orderno;
                $productData->orderno = $aboveProduct->orderno;
                $productData->save();
                $aboveProduct->orderno = $orderno;
                $aboveProduct->save();
                return redirect()->route('productViewCategory', $request->get('cat'))->with('success', 'Order is changed');
            }
        }
        return redirect()->route('products');
    }

    public function delete($id){
        $product = Product::where('id', $id)->first();

        $dataImage = [];

        foreach($product->productImage as $i => $item){
            array_push($dataImage, public_path().'/shop/products/'.$item->path);
        }

        File::delete($dataImage);

        Product::destroy($id);
        return redirect()->route('products')->with('success', 'Data product deleted');
    }
    
    public function delete_all(Request $request){
        $ids = $request->input('ids');
        if($ids) {
            foreach ($ids as $id) {
                $product = Product::where('id', $id)->first();

                $dataImage = [];

                foreach($product->productImage as $i => $item){
                    array_push($dataImage, public_path().'/shop/products/'.$item->path);
                }

                File::delete($dataImage);

                Product::destroy($id);
            }
        }

        return response()->json(['success'=>true]);
    }
    
}