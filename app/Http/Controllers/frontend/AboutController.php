<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Company;
use App\Models\OurMission;
use App\Models\Testimonial;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //LOAD COMPANY PAGE
    public function about_us(){
        $company = Company::where('id',1)->first();
        $testimonials = Testimonial::where('status', 1)->latest()->get();
        $blogs = Blog::where('status', 1)->get();
        return view('frontend.about-us',compact('testimonials', 'company', 'blogs'));
    }
}
