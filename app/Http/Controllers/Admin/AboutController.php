<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\OurMission;
use App\Models\Testimonial;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    //LOAD TESTIMONIAL
    public function testimonial_list()
    {
        $get_testimonial = Testimonial::latest()->get();
        return view('admin.about-us.testimonial.index', compact('get_testimonial'));
    }

    //LOAD ADD TESTIMONIAL FORM
    public function add_testimonial()
    {
        return view('admin.about-us.testimonial.add');
    }

    //ADD TESTIMONIAL
    public function add_testimonial_action(Request $req)
    {
        //dd($req->all());

        $add_testimonial = new Testimonial();
        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/testimonial/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add_testimonial['image'] = "$profileImage";
        }else{
            $add_testimonial['image'] = '';
        }
        $add_testimonial->description = $req->description;
        $add_testimonial->rating = $req->rating;
        $add_testimonial->status = 1;

        if ($add_testimonial->save()) {
            $req->session()->flash('success', 'Testimonial added successfully.');
            return redirect()->route('testimonial_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT TESTIMONIAL
    public function edit_testimonial($id)
    {
        $edit_testimonial = Testimonial::find($id);
        return view('admin.about-us.testimonial.edit', compact('edit_testimonial'));
    }

    //UPDATE TESTIMONIAL
    public function edit_testimonial_action(Request $req)
    {
        $update_testimonial = Testimonial::find($req->id);

        $update_testimonial->description = $req->description;
        $update_testimonial->rating = $req->rating;
        $update_testimonial->status = 1;
        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/testimonial/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_testimonial['image'] = "$profileImage";
        } else {
            $update_testimonial['image'] = $req->update_image;
        }
        if ($update_testimonial->save()) {
            $req->session()->flash('success', 'Testimonial updated successfully.');
            return redirect()->route('testimonial_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE TESTIMONIAL
    public function delete_testimonial(Request $req, $id)
    {
        Testimonial::destroy($id);
        $req->session()->flash('success', 'Testimonial deleted successfully.');
        return redirect()->route('testimonial_list');
    }

    //DELETE TESTIMONIAL IMAGE
    public function delect_testimonial_image(Request $req,$id){
        $image = Testimonial::find($id);
        if($image){
            $image->image = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

    //TESTIMONIAL STATUS UPDATE
    public function testimonial_status(Request $req, $id)
    {
        //get post status with the help of post id

        $data = DB::table('testimonials')->select('status')->where('id', '=', $id)->first();

        //check post status

        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update post status

        $data = array('status' => $status);
        DB::table('testimonials')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Status has been updated successfully.');
        return redirect()->route('testimonial_list');
    }

    //EDIT COMPANY
    public function company(){
        $get_company = Company::where('id',1)->first();
        return view('admin.about-us.company.edit',compact('get_company'));
    }

    //UPDATE COMPANY
    public function update_company(Request $req){
        $update_company = Company::where('id',1)->first();

        if ($image = $req->file('image')) {
            $destinationPath = 'public/admin/assets/company/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_company['image'] = "$profileImage";
        }else{
            $update_company['image'] = $req->update_company_image;
        }
        if ($image = $req->file('mission_img')) {
            $destinationPath = 'public/admin/assets/company/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_company['mission_img'] = "$profileImage";
        }else{
            $update_company['mission_img'] = '';
        }
        if ($image = $req->file('story_img')) {
            $destinationPath = 'public/admin/assets/company/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_company['story_img'] = "$profileImage";
        }else{
             $update_company['story_img'] = '';
        }
        $update_company->title = $req->title;
        $update_company->description = $req->description;
        $update_company->mission_heading = $req->mission_heading;
        $update_company->mission_desc = $req->mission_desc;
        $update_company->story_heading = $req->story_heading;
        $update_company->story_description = $req->story_description;
        $update_company->meta_title = $req->meta_title;
        $update_company->meta_desc = $req->meta_desc;
        $update_company->meta_keyword = $req->meta_keyword;

        if ($update_company->save()) {
            $req->session()->flash('success', 'Data updated successfully.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE FOOTER IMAGE
    public function delect_footer_image(Request $req, $id)
    {
        $image = Company::find($id);
        if ($image) {
            $image->image = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

}
