<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    //CONTACT PAGE
    public function contact_page(){
        $edit_contact_seo  = ContactPage::where('id', 1)->first();
        return view('admin.contact.contact-page.edit', compact('edit_contact_seo'));
    }

    //UPDATE CONTACT PAGE SEO
    public function edit_contact_page_action (Request $req){
        $update_contact_seo = ContactPage::where('id', 1)->first();
        $update_contact_seo->map = $req->map;
        $update_contact_seo->meta_title = $req->meta_title;
        $update_contact_seo->meta_desc = $req->meta_desc;
        $update_contact_seo->meta_keyword = $req->meta_keyword;

        if ($update_contact_seo->save()) {
            $req->session()->flash('success', 'Data updated successfully.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //NEWSLETTER PAGE 
    public function newsletter_list(){
        $data = Newsletter::latest()->get();
        return view('admin.contact.newsletter.index',compact('data'));
    }

    //ADD NEWSETTER FORM
    public function add_newsletter(){
        return view('admin.contact.newslletter.add');
    }

    //SUBMIT NEWSETTER
    public function submit_newsletter(Request $req){
        $req->validate([
            'email' => 'required',
        ]);
        $add_newsletter = new Newsletter();
        $add_newsletter->email = $req->email;
        $add_newsletter->date = Carbon::now()->format('Y-m-d');

        if ($add_newsletter->save()) {
            $req->session()->flash('success', 'You have successfully subscribed.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //SEARCH NEWSLETTER DATE
    public function filter_attendance(Request $req){
        $fromDate = $req->from_date;
        $toDate = $req->to_date;
        $data = Newsletter::whereBetween('date', [$fromDate, $toDate])->get();
        //dd($data);
       // return Excel::download(new NewsletterExport, 'newsletter-list.xlsx');
        // if($data->date > Carbon::now()->format('Y-m-d')){
        // }
        return view('admin.contact.newsletter.index', compact('data'));
    }
    
}
