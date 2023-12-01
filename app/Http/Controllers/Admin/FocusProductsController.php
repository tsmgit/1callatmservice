<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FocusProductsController extends Controller
{
    //GET ALL CATEGORY
    public function category_list()
    {
        $category_list = ProductCategory::latest()->get();
        return view('admin.focus-products.category.index', compact('category_list'));
    }

    //LOAD ADD FORM
    public function add_category()
    {
        $category_list = ProductCategory::latest()->where('status', 1)->get();
        return view('admin.focus-products.category.add', compact('category_list'));
    }

    //ADD CATEGORY
    public function add_category_action(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);

        $add_category = new ProductCategory();
        $add_category->parent_id = $req->parent_id;
        $add_category->name = $req->name;
        $add_category->status = 1;

        if ($add_category->save()) {
            $req->session()->flash('success', 'Category Added Successfully.');
            return redirect()->route('category_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT CATEGORY
    public function edit_category($id)
    {
        $edit_category = ProductCategory::find($id);
        $category_list = ProductCategory::latest()->where('status', 1)->get();
        return view('admin.focus-products.category.edit', compact('edit_category', 'category_list'));
    }

    //UPDATE CATEGORY
    public function edit_category_action(Request $req)
    {
        $update_category = ProductCategory::find($req->id);
        $update_category->parent_id = $req->parent_id;
        $update_category->name = $req->name;
        $update_category->status = 1;

        if ($update_category->save()) {
            $req->session()->flash('success', 'Category Updated Successfully.');
            return redirect()->route('category_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE CATEGORY
    public function delete_category_action(Request $req, $id)
    {
        ProductCategory::destroy($id);
        $req->session()->flash('success', 'Category Deleted Successfully.');
        return redirect()->route('category_list');
    }

    //CATEGORY STATUS UPDATE
    public function update_category_status(Request $req, $id)
    {

        //get post status with the help of post id
        $data = DB::table('product_categories')->select('status')->where('id', '=', $id)->first();

        //check post status

        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update post status

        $data = array('status' => $status);
        DB::table('product_categories')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Status has been updated successfully.');
        return redirect()->route('category_list');
    }

    //LOAD PRODUCTS
    public function product_list(){
        $get_product = Product::latest()->get();
        return view('admin.focus-products.products.index',compact('get_product'));
    }

    //LOAD ADD PRODUCTS FORM
    public function add_product(){
        $cat_list = ProductCategory::where('status',1)->get();
        return view('admin.focus-products.products.add',compact('cat_list'));
    }

    //ADD PRODUCTS
    public function add_product_action(Request $req){
        //dd($req->all());

        $add_product = new Product();
        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/product/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add_product['image'] = "$profileImage";
        }else{
            $add_product['image'] = '';
        }
        
        $add_product->title = $req->title;
        $add_product->cat_id = $req->cat_id;
        $add_product->slug = Str::slug($req->title);
        $add_product->short_desc = $req->short_desc;
        $add_product->description = $req->description;
        $add_product->meta_title = $req->meta_title;
        $add_product->meta_desc = $req->meta_desc;
        $add_product->meta_keyword = $req->meta_keyword;
        $add_product->status = 1;

        if($add_product->save()){
            $req->session()->flash('success', 'Product added successfully.');
            return redirect()->route('product_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT PRODUCTS
    public function edit_product($id){
        $edit_product = Product::find($id);
        $cat_list = ProductCategory::where('status', 1)->get();
        return view('admin.focus-products.products.edit',compact('edit_product', 'cat_list'));
    }

    //UPDATE PRODUCTS
    public function edit_product_action(Request $req){
        $update_products = Product::find($req->id);
        
        $update_products->title = $req->title;
        $update_products->cat_id = $req->cat_id;
        $update_products->slug = Str::slug($req->title);
        $update_products->short_desc = $req->short_desc;
        $update_products->description = $req->description;
        $update_products->meta_title = $req->meta_title;
        $update_products->meta_desc = $req->meta_desc;
        $update_products->meta_keyword = $req->meta_keyword;
        $update_products->status = 1;

        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/product/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_products['image'] = "$profileImage";
        } else {
            $update_products['image'] = $req->update_product_image;
        }

        if ($update_products->save()) {
            $req->session()->flash('success', 'Product updated successfully.');
            return redirect()->route('product_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE PRODUCTS
    public function delete_product(Request $req,$id){
        Product::destroy($id);
        $req->session()->flash('success', 'Product deleted successfully.');
        return redirect()->route('product_list');
    }

    //DELETE PRODUCT IMAGE
    public function delect_product_image(Request $req, $id)
    {
        $image = Product::find($id);
        if ($image) {
            $image->image = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

    //PRODUCT STATUS UPDATE
    public function product_status(Request $req, $id)
    {
        //get post status with the help of post id

        $data = DB::table('products')->select('status')->where('id', '=', $id)->first();

        //check post status

        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update post status

        $data = array('status' => $status);
        DB::table('products')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Status has been updated successfully.');
        return redirect()->route('product_list');
    }

    //EDIT PRODUCT SEO
    public function edit_product_seo()
    {
        $edit_product_seo  = ProductPage::where('id', 1)->first();
        return view('admin.focus-products.products.product', compact('edit_product_seo'));
    }

    //UPDATE PRODUCT SEO
    public function edit_product_seo_action(Request $req)
    {
        $update_product_seo = ProductPage::where('id', 1)->first();
        $update_product_seo->meta_title = $req->meta_title;
        $update_product_seo->meta_desc = $req->meta_desc;
        $update_product_seo->meta_keyword = $req->meta_keyword;

        if ($update_product_seo->save()) {
            $req->session()->flash('success', 'Data updated successfully.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }
    
}
