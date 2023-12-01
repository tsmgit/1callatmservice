<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductPage;
use Illuminate\Http\Request;

class FocusProductsController extends Controller
{
    //LOAD FOCUS PRODUCT PAGE
    public function products(){
        $product = Product::where('status', 1)->paginate(6);
        $product_cat = [];
        
        $cats = ProductCategory::where(['parent_id' => 0, 'status' => 1])->get();
        
        foreach($cats as $cat) {
            $cat->subcats = ProductCategory::where(['parent_id' => $cat->id, 'status' => 1])->get();
            $product_cat[] = $cat;
        }
        
        $product_page = ProductPage::where('id', 1)->first();
        $selecdCatId = 0;
        return view('frontend.products',compact('product', 'product_cat', 'product_page', 'selecdCatId'));
    }

    // LOAD PRODUCT DETAILS
    public function product_details(Request $req)
    {
        $slug = $req->slug;
        $product = Product::where('status', 1)->where('slug', $slug)->first();
        $more_product = Product::where('status', 1)->get();
        $related_products = Product::where('status', 1)->take(4)->inRandomOrder()->get();
        return view('frontend.product-details', compact('product', 'more_product', 'related_products'));
    }

    public function product_cat($id)
    {
        $product = Product::leftjoin('product_categories', 'product_categories.id', '=', 'products.cat_id')->where('cat_id', $id)->paginate(6);
        $product_cat = [];
        
        $cats = ProductCategory::where(['parent_id' => 0, 'status' => 1])->get();
        
        foreach($cats as $cat) {
            $cat->subcats = ProductCategory::where(['parent_id' => $cat->id, 'status' => 1])->get();
            $product_cat[] = $cat;
        }
        
        $product_page = ProductPage::where('id', 1)->first();

        $selecdCatId = 0;
        if($id) {
            $selecdCatId = $id;
        }
        else {
            $selecdCatId = 0;
        }

        // dd($selecdCatId);
        return view('frontend.products', compact('product', 'product_cat', 'product_page', 'selecdCatId'));
    }
}
