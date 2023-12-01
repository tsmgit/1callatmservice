<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //EDIT HOME
    public function home()
    {
        $edit_home = Home::where('id',1)->first();
        return view('admin.homepage.home.edit', compact('edit_home'));
    }

    //UPDATE BANNER
    public function update_home(Request $req)
    {
        $req->validate([
            'image' => 'mimes:png,jpg,jpeg',
            'about_image' => 'mimes:png,jpg,jpeg'
        ]);
        $update_home = Home::where('id',1)->first();
        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/banner/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_home['image'] = "$profileImage";
        }else{
            $update_home['image'] = $req->update_banner_image;
        }

        if ($image = $req->file('about_image')) {
            $destinationPath = 'public/admin/assets/about/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_home['about_image'] = "$profileImage";
        }else{
            $update_home['about_image'] = $req->update_about_image;
        }
        
        $update_home->heading = $req->heading;
        $update_home->title = $req->title;
        $update_home->description = $req->description;
        $update_home->button_url = $req->button_url;
        $update_home->about_heading = $req->about_heading;
        $update_home->about_title = $req->about_title;
        $update_home->about_desc = $req->about_desc;
        $update_home->about_button_url = $req->about_button_url;
        $update_home->service_heading = $req->service_heading;
        $update_home->service_desc = $req->service_desc;
        $update_home->meta_title = $req->meta_title;
        $update_home->meta_desc = $req->meta_desc;
        $update_home->meta_keyword = $req->meta_keyword;

        if ($update_home->save()) {
            $req->session()->flash('success', 'Home updated successfully.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE BANNER IMAGE
    public function delect_banner_image(Request $req, $id)
    {
        $image = Home::find($id);
        if ($image) {
            $image->image = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

    //DELETE ABOUT IMAGE
    public function delect_about_image(Request $req, $id)
    {
        $image = Home::find($id);
        if ($image) {
            $image->about_image = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

}
