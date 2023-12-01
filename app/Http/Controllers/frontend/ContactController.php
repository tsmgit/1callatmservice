<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactPage;
use App\Models\HeaderAndFooter;
use App\Models\ProductRequestQuote;
use App\Models\RequestQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //LOAD CONTACT US PAGE
    public function contact_us(){
        $contact = ContactPage::where('id',1)->first();
        return view('frontend.contact-us',compact('contact'));
    }

    //SUBMIT CONTACT FORM
    public function contact_form_action(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|digits:10|numeric',
            'address' => 'required'
        ]);

        $add_form = new Contact();
        $input = $req->all();
        $add_form->name = $req->name;
        $add_form->email = $req->email;
        $add_form->phone = $req->phone;
        $add_form->address = $req->address;
        $add_form->message = $req->message;
        $email = $input['email'];
        $name = $req->name;
        $phone = $req->phone;
        $address = $req->address;
        $msg = $req->message;

        Mail::send('frontend.mail', ['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'msg' => $msg], function ($message) use ($input) {
            $to_email = HeaderAndFooter::where('id', 1)->first();
            $bulk_mail = explode(',',$to_email->bulk_mail);
            // dd($bulk_mail);
            $message->from('abhishekmukherjee.tsm@gmail.com', '1 Call ATM Service LLC Contact Form');
            $message->to($bulk_mail);
            $message->subject('1 Call ATM Service LLC Contact Form');
        });

        if($add_form->save()){
            $req->session()->flash('success', 'Your message has been sent successfully.');
            return redirect()->back();
        }else{
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    public function service_enquiry_form_action(Request $req){
        $req->validate([
            'company' => 'required',
            'email' => 'required|email',
        ]);

        $add_request_quote_form = new RequestQuote();
        $input = $req->all();
        $add_request_quote_form->service_name = $req->service_name;
        $add_request_quote_form->company = $req->company;
        $add_request_quote_form->email = $req->email;
        $add_request_quote_form->phone = $req->phone;
        $add_request_quote_form->address = $req->address;
        $add_request_quote_form->message = $req->message;
        $add_request_quote_form->rma_no = $req->rma_no;
        $email = $input['email'];
        $service_name = $req->service_name;
        $company = $req->company;
        $phone = $req->phone;
        $address = $req->address;
        $rma_no = $req->rma_no;
        $msg = $req->message;

        Mail::send('frontend.service-enquiry-mail', ['service_name' => $service_name, 'company' => $company, 'email' => $email, 'phone' => $phone, 'rma_no' => $rma_no, 'address' => $address, 'msg' => $msg], function ($message) use ($input) {
            $to_email = HeaderAndFooter::where('id', 1)->first();
            $bulk_mail = explode(',',$to_email->bulk_mail);
            $message->from('abhishekmukherjee.tsm@gmail.com', '1 Call ATM Service LLC Service Enquiry Form');
            $message->to($bulk_mail);
            $message->subject('1 Call ATM Service LLC Service Enquiry Form');
        });

        if ($add_request_quote_form->save()) {
            $req->session()->flash('success', 'Your message has been sent successfully.');
            return redirect()->back();
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    public function product_enquiry_form_action(Request $req){
        $req->validate([
            'company' => 'required',
            'email' => 'required|email',
        ]);

        $add_product_request_quote_form = new ProductRequestQuote();
        $input = $req->all();
        $add_product_request_quote_form->product_name = $req->product_name;
        $add_product_request_quote_form->company = $req->company;
        $add_product_request_quote_form->email = $req->email;
        $add_product_request_quote_form->phone = $req->phone;
        $add_product_request_quote_form->address = $req->address;
        $add_product_request_quote_form->message = $req->message;
        $add_product_request_quote_form->rma_no = $req->rma_no;

        $email = $input['email'];
        $product_name = $req->product_name;
        $company = $req->company;
        $phone = $req->phone;
        $address = $req->address;
        $rma_no = $req->rma_no;
        $msg = $req->message;
        Mail::send('frontend.product-enquiry-mail',['product_name' => $product_name, 'email' => $email, 'company' => $company, 'phone' => $phone, 'address' => $address, 'rma_no' => $rma_no, 'msg' => $msg], function($message) use ($input){
            $to_email = HeaderAndFooter::where('id', 1)->first();
            $bulk_mail = explode(',',$to_email->bulk_mail);
            $message->from('abhishekmukherjee.tsm@gmail.com', '1 Call ATM Service LLC Product Enquiry Form');
            $message->to($bulk_mail);
            $message->subject('1 Call ATM Service LLC Product Enquiry Form');
        });

        if($add_product_request_quote_form->save()){
            $req->session()->flash('success', 'Your message has been sent successfully.');
            return redirect()->back();
        }else{
            $req->session()->flash('error', 'Something went wrong, please try again.');
            return redirect()->back();
        }
    }

    public function get_map(){
        $map = ContactPage::where('id',1)->first();
        // return $map;
        return response()->json($map);
    }
}
