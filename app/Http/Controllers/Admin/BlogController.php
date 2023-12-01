<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //LOAD BLOG 
    public function blog_list()
    {
        $get_blog = Blog::latest()->get();
        return view('admin.homepage.blog.index', compact('get_blog'));
    }

    //LOAD ADD SERVICE
    public function add_blog()
    {
        return view('admin.homepage.blog.add');
    }

    //ADD SERVICE
    public function add_blog_action(Request $req)
    {
        $add_blog = new Blog();
        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/blog/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add_blog['image'] = "$profileImage";
        }

        $add_blog->slug = Str::slug($req->title);
        $add_blog->title = $req->title;
        $add_blog->short_desc = $req->short_desc;
        $add_blog->description = $req->description;
        $add_blog->meta_title = $req->meta_title;
        $add_blog->meta_desc = $req->meta_desc;
        $add_blog->meta_keyword = $req->meta_keyword;
        $add_blog->status = 1;

        if ($add_blog->save()) {
            $req->session()->flash('success', 'Blog added successfully.');
            return redirect()->route('blog_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT SERVICE
    public function edit_blog($id)
    {
        $edit_blog = Blog::find($id);
        return view('admin.homepage.blog.edit', compact('edit_blog'));
    }

    //UPDATE SERVICE
    public function edit_blog_action(Request $req)
    {
        $update_blog = Blog::find($req->id);
        $update_blog->slug = Str::slug($req->title);
        $update_blog->title = $req->title;
        $update_blog->short_desc = $req->short_desc;
        $update_blog->description = $req->description;
        $update_blog->meta_title = $req->meta_title;
        $update_blog->meta_desc = $req->meta_desc;
        $update_blog->meta_keyword = $req->meta_keyword;
        $update_blog->status = 1;

        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/blog/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_blog['image'] = "$profileImage";
        }

        if ($update_blog->save()) {
            $req->session()->flash('success', 'Blog updated successfully.');
            return redirect()->route('blog_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE SERVICE
    public function delete_blog_action(Request $req, $id)
    {
        Blog::destroy($id);
        $req->session()->flash('success', 'Blog Deleted Successfully.');
        return redirect()->route('blog_list');
    }

    //SERVICE STATUS UPDATE
    public function update_blog_status(Request $req, $id)
    {
        //get post status with the help of post id

        $data = DB::table('blogs')->select('status')->where('id', '=', $id)->first();

        //check post status

        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update post status

        $data = array('status' => $status);
        DB::table('blogs')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Status has been updated successfully.');
        return redirect()->route('blog_list');
    }

    //EDIT BLOG SEO
    public function edit_blog_seo()
    {
        $edit_blog_seo  = BlogPage::where('id', 1)->first();
        return view('admin.homepage.blog.blog', compact('edit_blog_seo'));
    }

    //UPDATE BLOG SEO
    public function edit_blog_seo_action(Request $req)
    {
        $update_blog_seo = BlogPage::where('id', 1)->first();
        $update_blog_seo->meta_title = $req->meta_title;
        $update_blog_seo->meta_desc = $req->meta_desc;
        $update_blog_seo->meta_keyword = $req->meta_keyword;

        if ($update_blog_seo->save()) {
            $req->session()->flash('success', 'Data updated successfully.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }
}
