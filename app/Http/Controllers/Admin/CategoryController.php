<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Countries;
use Validator;
use Str;
use Auth;
class CategoryController extends Controller
{
    public function index(){

        $data = [
            'title' => 'Home Category',
            'category' => Category::where('is_home', 1)->orderBy('orderno', 'asc')->get()
        ];

        return view('admin.category.index', $data);
    }

    public function create(){

        $data = [
            'title' => 'Create home category',
            'countries'=> Countries::all(),
            'main_categories'=> Category::where('is_home', 1)->where('parent_category_id', null)->get()
        ];

        return view('admin.category.create', $data);
    }

    public function check(Request $request){
        $name = Category::where('name', $request->name)->exists();
        if($name){
            return response()->json(['status' => 'success', 'messages' => 'not available'], 200);
        }else{
            return response()->json(['status' => 'success', 'messages' => 'available'], 201);
        }
    }

    public function save(Request $request){
        $validators = Validator($request->all(), [
//            'path' => 'required',
            'name' => 'required|unique:categories',
            'country'=>'required'
        ]);

        if($validators->fails()){
            return redirect()->route('categoryCreate')->withErrors($validators)->withInput();
        }else{
//            $path = $request->file('path');
//            $extension_path = $path->getClientOriginalExtension();
//            $full_name_path = Str::random(20).".".$extension_path;
//            $path->move(public_path('shop/products/'), $full_name_path);

            $cat = Category::create([
                'shop_id' => Auth::user()->shop->id,
                'name' => $request->name,
                'slug'=>$request->name,
//                'path' => $full_name_path,
                'country'=>$request->country,
                'parent_category_id'=>$request->parent_category_id?$request->parent_category_id:null,
                'is_header'=>0,
                'is_home'=>1,
                'is_show_menu'=>0
            ]);
            if($cat) {
                $cat->orderno = $cat->id;
                $cat->save();
            }

            return redirect()->route('category');

        }
    }
    
    public function edit($category){
        $categoryData = Category::where('slug', $category)->first();
        $countries = Countries::all();
        $data = [
            'category' => $categoryData,
            'title' => 'Edit home category '. str_replace('-', ' ', $category),
            'countries'=>$countries,
            'main_categories'=> Category::where('is_home', 1)->where('parent_category_id', null)->get()
        ];

        
        return view('admin.category.edit', $data);
    }
    
    public function editSave(Request $request, $category, $id){

        $validatorCheck = '';
//        if($category != $request->name){
//            $validatorCheck = 'unique:categories';
//        }
        
        $validators = Validator($request->all(), [
//            'path' => 'required',
            'name' => 'required',
            'country'=>'required'
        ]);


        if($validators->fails()){
            return redirect()->route('categoryEdit', ['category' => $category, 'id' => $id])->withErrors($validators)->withInput();
        }else{
            
            $cat = Category::where('id', $id)->update([
                'name' => $request->name,
//                'path' => $full_name_path,
                'country'=>$request->country,
                'parent_category_id'=>$request->parent_category_id?$request->parent_category_id:null,
                'is_header'=>0,
                'is_home'=>1,
                'is_show_menu'=>0
            ]);
            

            return redirect()->route('categoryEdit', $category)->with('success', 'Data updated');
        }
    }
    
    public function move_up($id) {
        $categoryData = Category::where('id', $id)->first();
        if($categoryData) {
            $aboveCategory = Category::where('is_home', 1)->where('orderno', '<', $categoryData->orderno)->orderBy('orderno', 'desc')->first();
            if($aboveCategory) {
                $orderno = $categoryData->orderno;
                $categoryData->orderno = $aboveCategory->orderno;
                $categoryData->save();
                $aboveCategory->orderno = $orderno;
                $aboveCategory->save();
                return redirect()->route('category')->with('success', 'Order is changed');
            }
        }
        return redirect()->route('category');
    }
    
    public function move_down($id) {
        $categoryData = Category::where('id', $id)->first();
        if($categoryData) {
            $aboveCategory = Category::where('is_home', 1)->where('orderno', '>', $categoryData->orderno)->orderBy('orderno', 'asc')->first();
            if($aboveCategory) {
                $orderno = $categoryData->orderno;
                $categoryData->orderno = $aboveCategory->orderno;
                $categoryData->save();
                $aboveCategory->orderno = $orderno;
                $aboveCategory->save();
                return redirect()->route('category')->with('success', 'Order is changed');
            }
        }
        return redirect()->route('category');
    }

    public function delete($id){
//        $paths = public_path().'/shop/products/'. $path;
//        if(file_exists($paths)){
//            unlink($paths);
//        }

        Category::destroy($id);

        return redirect()->route('category')->with('success', 'Category deleted');
    }
    
    public function delete_all(Request $request){
        $ids = $request->input('ids');
        if($ids) {
            foreach ($ids as $id) {
                Category::destroy($id);
            }
        }

        return response()->json(['success'=>true]);
    }
}
