<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogPage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //LOAD BLOG PAGE
    public function blogs(){
        $blogs = Blog::where('status', 1)->get();
        $blog_page = BlogPage::where('id',1)->first();
        return view('frontend.blog',compact('blogs', 'blog_page'));
    }

    // LOAD BLOG DETAILS
    public function blog_details(Request $req)
    {
        $slug = $req->slug;
        $blogs = Blog::where('status', 1)->where('slug', $slug)->first();
        $blog = Blog::where('status', 1)->get();
        return view('frontend.blog-details', compact('blogs', 'blog'));
    }
}
