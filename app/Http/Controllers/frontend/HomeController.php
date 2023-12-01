<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Home;
use App\Models\PriceCategory;
use App\Models\PriceList;
use App\Models\Product;
use App\Models\Relation;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //LOAD HOME PAGE
    public function index(){
        // dump($_SERVER);
        $home = Home::where('id',1)->first();
        $servicess = Service::where(['status' => 1, 'show_home_page' => 1])->take(2)->get();
        $testimonials = Testimonial::where('status', 1)->latest()->get();
        $products = Product::where('status', 1)->latest()->take(4)->get();
        $blogs = Blog::where('status', 1)->get();
        return view('frontend.index',compact('home', 'servicess', 'testimonials', 'products', 'blogs'));
    }

    // LOAD SERVICE DETAILS
    public function service_details(Request $req)
    {
        $slug = $req->slug;

        $service = Service::where('status', 1)->where('slug', $slug)->first();
        $related_products = Product::where('status', 1)->take(4)->inRandomOrder()->get();
        //$price_list = Relation::leftjoin('services', 'services.id','=','relations.service_id')->leftjoin('price_categories', 'price_categories.id', '=', 'relations.cat_id')->where('slug', $slug)->get();

        $price_list = PriceCategory::where('service_id',$service->id)->get();
        $arr['category'] = array();

        foreach ($price_list as $category) {
            $arr1['item'] = array();
            $id = $category->id;
            $arr1['category_name'] = $category->name;

            $items = PriceList::where('category_id', $id)->where('price_lists.category_id', '!=', '')->get();

            foreach ($items as $list) {
                $arr2 = [];
                $arr2['repair_item'] = $list->repair_item;
                $arr2['description'] = $list->description;
                $arr2['price'] = $list->price;

                array_push($arr1['item'], $arr2);
            }
            array_push($arr['category'], $arr1);
        }
        //dd($arr['category']);
        //return response()->json($arr);
        
        return view('frontend.service-details', compact('service', 'related_products', 'arr'));
    } 
}

