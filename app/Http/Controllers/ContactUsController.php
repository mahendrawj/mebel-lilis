<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contacts;
use Mail;
//use App\User;
class ContactUsController extends Controller
{
    public function index() {
        return view('contactus.index');
    }
    public function contactUSPost(Request $request) {
        $contacts = Contacts::all();
        $this->validate($request,[
            $nama = 'nama' => 'required|unique:contacts',
            $email ='email' => 'required|email|max:255|unique:contacts',
            $comment = 'comment' => 'required|max:255']);
            $contacts = $request->only($nama,$email,$comment);
            $contacts = Contacts::create($contacts);           
           Mail::send('contactus.email', ['contacts' => $contacts], function($m) use ($contacts) {
           $m->from($contacts->email, $contacts->nama)->subject($contacts->nama);
           $m->to('mahendrawj239@gmail.com');
            });
           
           \Flash::success('Pesan Terkirim');
            return redirect()->route('contactus.index', $contacts);
    }
}
