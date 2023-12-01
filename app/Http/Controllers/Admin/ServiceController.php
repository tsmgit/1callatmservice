<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceCategory;
use App\Models\PriceList;
use App\Models\Relation;
use App\Models\Service;
use App\Models\ServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    //LOAD SERVICE 
    public function service_list()
    {
        $get_service = Service::latest()->get();
        return view('admin.servicepage.index', compact('get_service'));
    }

    //LOAD ADD SERVICE
    public function add_service()
    {
        return view('admin.servicepage.add');
    }

    //ADD SERVICE
    public function add_service_action(Request $req)
    {

        $add_service = new Service();
        if ($image = $req->file('logo')) {
            $destinationPath = 'public/admin/assets/service/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add_service['logo'] = "$profileImage";
        }
        
        if ($image = $req->file('map')) {
            $destinationPath = 'public/admin/assets/service/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add_service['map'] = "$profileImage";
        }

        $add_service->slug = Str::slug($req->title);
        $add_service->title = $req->title;
        $add_service->short_desc = $req->short_desc;
        $add_service->description = $req->description;
        $add_service->meta_title = $req->meta_title;
        $add_service->meta_desc = $req->meta_desc;
        $add_service->meta_keyword = $req->meta_keyword;
        $add_service->status = 1;
        $add_service->show_home_page = 0;

        if ($add_service->save()) {
            $req->session()->flash('success', 'Services added successfully.');
            return redirect()->route('service_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT SERVICE
    public function edit_service($id)
    {
        $edit_service = Service::find($id);
        return view('admin.servicepage.edit', compact('edit_service'));
    }

    //UPDATE SERVICE
    public function edit_service_action(Request $req)
    {
        $update_service = Service::find($req->id);
        $update_service->slug = Str::slug($req->title);
        $update_service->title = $req->title;
        $update_service->short_desc = $req->short_desc;
        $update_service->description = $req->description;
        $update_service->meta_title = $req->meta_title;
        $update_service->meta_desc = $req->meta_desc;
        $update_service->meta_keyword = $req->meta_keyword;
        $update_service->status = 1;
        $update_service->show_home_page = 0;

        if ($image = $req->file('logo')) {
            $destinationPath = 'public/admin/assets/service/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_service['logo'] = "$profileImage";
        }else{
            $update_service['logo'] = $req->update_service_image;
        }
        
        if ($image = $req->file('map')) {
            $destinationPath = 'public/admin/assets/service/';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_service['map'] = "$profileImage";
        }else{
            $update_service['map'] = $req->update_map_image;
        }

        if ($update_service->save()) {
            $req->session()->flash('success', 'Services updated successfully.');
            return redirect()->route('service_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE SERVICE
    public function delete_service(Request $req, $id)
    {
        Service::destroy($id);
        $req->session()->flash('success', 'Services Deleted Successfully.');
        return redirect()->route('service_list');
    }

    //DELETE SERVICE IMAGE
    public function delect_service_image(Request $req, $id)
    {
        $image = Service::find($id);
        if ($image) {
            $image->logo = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

    //DELETE SERVICE MAP
    public function delect_service_map(Request $req, $id)
    {
        $image = Service::find($id);
        if ($image) {
            $image->map = '';
            $image->save();
            $req->session()->flash('success', 'Image deleted successfully.');
            return redirect()->back();
        }
    }

    //SERVICE STATUS UPDATE
    public function service_status(Request $req, $id)
    {
        //get post status with the help of post id

        $data = DB::table('services')->select('status')->where('id', '=', $id)->first();

        //check post status

        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update post status

        $data = array('status' => $status);
        DB::table('services')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Status has been updated successfully.');
        return redirect()->route('service_list');
    }

    //SHOW HOME PAGE
    public function show_home_page(Request $req,$id){
        //get post status with the help of post id

        $data = DB::table('services')->select('show_home_page')->where('id', '=', $id)->first();

        //check post status

        if ($data->show_home_page == '1') {
            $show_home_page = '0';
        } else {
            $show_home_page = '1';
        }

        //update post status

        $data = array('show_home_page' => $show_home_page);
        DB::table('services')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Updated successfully.');
        return redirect()->route('service_list');
    }

    //LOAD PRICE CATEGORY 
    public function price_category_list()
    {
        $get_price_category = PriceCategory::latest()->get();
        return view('admin.servicepage.categories.index', compact('get_price_category'));
    }

    //LOAD ADD PRICE CATEGORY
    public function add_price_category()
    {
        $service_type = Service::latest()->get();
        return view('admin.servicepage.categories.add',compact('service_type'));
    }

    //ADD PRICE CATEGORY
    public function add_price_category_action(Request $req)
    {

        $add_price_category = new PriceCategory();
        $add_price_category->name = $req->name;
        $add_price_category->service_id = $req->service_id;

        if ($add_price_category->save()) {
            $req->session()->flash('success', 'Category added successfully.');
            return redirect()->route('price_category_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT PRICE CATEGORY
    public function edit_price_category($id)
    {
        $edit_price_category = PriceCategory::find($id);
        $service_type = Service::latest()->get();
        return view('admin.servicepage.categories.edit', compact('edit_price_category', 'service_type'));
    }

    //UPDATE PRICE CATEGORY
    public function edit_price_category_action(Request $req)
    {
        $update_price_category = PriceCategory::find($req->id);
        $update_price_category->name = $req->name;
        $update_price_category->service_id = $req->service_id;

        if ($update_price_category->save()) {
            $req->session()->flash('success', 'Category updated successfully.');
            return redirect()->route('price_category_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE PRICE CATEGORY
    public function delete_price_category(Request $req, $id)
    {
        PriceCategory::destroy($id);
        $req->session()->flash('success', 'Category Deleted Successfully.');
        return redirect()->route('price_category_list');
    }

    //LOAD PRICE  
    public function price_list()
    {
        $get_price = PriceList::latest()->get();
        return view('admin.servicepage.price.index', compact('get_price'));
    }

    //LOAD ADD PRICE 
    public function add_price()
    {
        $get_price_category = PriceCategory::latest()->get();
        return view('admin.servicepage.price.add',compact('get_price_category'));
    }

    //ADD PRICE 
    public function add_price_action(Request $req)
    {

        $add_price = new PriceList();
        $add_price->category_id = $req->category_id;
        $add_price->repair_item = $req->repair_item;
        $add_price->description = $req->description;
        $add_price->price = $req->price;

        if ($add_price->save()) {
            $req->session()->flash('success', 'Category added successfully.');
            return redirect()->route('price_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT PRICE
    public function edit_price($id)
    {
        $edit_price = PriceList::find($id);
        $get_price_category = PriceCategory::latest()->get();
        return view('admin.servicepage.price.edit', compact('edit_price', 'get_price_category'));
    }

    //UPDATE PRICE
    public function edit_price_action(Request $req)
    {
        $updater_price = PriceList::find($req->id);
        $updater_price->category_id = $req->category_id;
        $updater_price->repair_item = $req->repair_item;
        $updater_price->description = $req->description;
        $updater_price->price = $req->price;

        if ($updater_price->save()) {
            $req->session()->flash('success', 'Category updated successfully.');
            return redirect()->route('price_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE PRICE
    public function delete_price(Request $req, $id)
    {
        PriceList::destroy($id);
        $req->session()->flash('success', 'Category Deleted Successfully.');
        return redirect()->route('price_list');
    }

    //LOAD PRICE  
    public function relation_list()
    {
        $get_relation = Relation::rightjoin('services','services.id','=','relations.service_id')->get();
        // dd($get_relation);
        return view('admin.servicepage.relation.index', compact('get_relation'));
    }

    //LOAD ADD PRICE 
    public function add_relation()
    {
        $service = Service::latest()->get();
        $price_cat = PriceCategory::latest()->get();
        $price_list = PriceList::latest()->get();
        return view('admin.servicepage.relation.add',compact('service', 'price_cat', 'price_list'));
    }

    //ADD PRICE 
    public function add_relation_action(Request $req)
    {

        $add_relation = new Relation();
        $add_relation->service_id = $req->service_id;
        $add_relation->cat_id = $req->cat_id;
        $add_relation->price_id = json_encode($req->price_id);

        if ($add_relation->save()) {
            $req->session()->flash('success', 'Data added successfully.');
            return redirect()->route('relation_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT PRICE
    public function edit_relation($id)
    {
        $edit_relation = Relation::find($id);
        $service = Service::latest()->get();
        $price_cat = PriceCategory::latest()->get();
        $price_list = PriceList::latest()->get();
        return view('admin.servicepage.relation.edit', compact('edit_relation','service', 'price_cat', 'price_list'));
    }

    //UPDATE PRICE
    public function edit_relation_action(Request $req)
    {
        $update_relation = Relation::find($req->id);
        $update_relation->service_id = $req->service_id;
        $update_relation->cat_id = $req->cat_id;
        $update_relation->price_id = json_encode($req->price_id);

        if ($update_relation->save()) {
            $req->session()->flash('success', 'Data updated successfully.');
            return redirect()->route('relation_list');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE PRICE
    public function delete_relation(Request $req, $id)
    {
        Relation::destroy($id);
        $req->session()->flash('success', 'Data Deleted Successfully.');
        return redirect()->route('relation_list');
    }
}
