<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
use DB;
use Html;
use File;
use Input;
use Validator;
use Redirect;
use View;
use Storage;
use Auth;
use Session;


class ContactsController extends Controller {

    public function __construct() {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contacts = Contacts::where('status',1)->where('user_id',Auth::user()->id)->get()->toArray(); 
        return view('adminlte::layouts.contacts.list',['data'=>$contacts]);
    }

    public function create() {
         return view('adminlte::layouts.contacts.add',[]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if($id > 0){
            $contact = Contacts::where('user_id',Auth::user()->id)->find($id);
            if(!empty($contact)){
                return View::make('adminlte::layouts.contacts.edit')->with('contact', $contact);
            }
        }
        return redirect('contacts')->with('error', trans('message.recordNotfound'));
    }

    public function store(Request $request) {

        $rules = [
            'name'          => 'required',
            'email'         => 'required',
            'dob'           => 'required|date',
        ];
        $message = [
            'name.required'         => 'Please enter Name',
            'email.required'        => 'Please enter E-mail Address',
            'dob.required'          => 'Please enter Birth Date',
            'dob.date'              => 'Please enter valid Birth Date',
        ];
        $validator = Validator::make(Input::all(), $rules,$message);
        if ($validator->fails()) {
             return Redirect::to('contacts/create')
                ->withErrors($validator);
        } else {
            if(Input::get('id') != null && Input::get('id') > 0){
                $contact_id = Input::get('id');
                $contactDetails['user_id']  = Auth::user()->id;
                $contactDetails['name']     = (Input::get('name'));
                $contactDetails['email']    = (Input::get('email'));
                $contactDetails['company']  = (Input::get('company'));
                $contactDetails['phone']    = (Input::get('phone'));
                $contactDetails['mobile']   = (Input::get('mobile'));
                $contactDetails['linkedin'] = (Input::get('linkedin'));
                $contactDetails['twitter']  = (Input::get('twitter'));
                $contactDetails['facebook'] = (Input::get('facebook'));
                $contactDetails['website']  = (Input::get('website'));
                $contactDetails['address']  = (Input::get('address'));
                $contactDetails['dob']      = (Input::get('dob'));
                DB::table('contacts')->where('id', $contact_id)->update($contactDetails);
            }

            if(Input::get('id') != null && Input::get('id') > 0){
                return redirect('contacts')->with('success', trans('message.recordEdit'));
            } else {
                $contact = new Contacts();
                $contact->user_id   =  Auth::user()->id;;
                $contact->name      = (Input::get('name'));
                $contact->email     = (Input::get('email'));
                $contact->company   = (Input::get('company'));
                $contact->phone     = (Input::get('phone'));
                $contact->mobile    = (Input::get('mobile'));
                $contact->linkedin  = (Input::get('linkedin'));
                $contact->twitter   = (Input::get('twitter'));
                $contact->facebook  = (Input::get('facebook'));
                $contact->website   = (Input::get('website'));
                $contact->address   = (Input::get('address'));
                $contact->dob = (Input::get('dob'));
                $contact->save();
                return redirect('contacts')->with('success', trans('message.recordEdit'));
            }
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $contact = Contacts::where('user_id',Auth::user()->id)->find($id);
        if(!empty($contact)){
            $contact->status=0;
            $contact->save();
            return redirect('contacts')->with('success', trans('message.recordDelete'));
        }
        return redirect('contacts')->with('error', trans('message.recordNotfound'));
    }
}
