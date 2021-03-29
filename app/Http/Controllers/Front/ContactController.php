<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index(){
    return view('front.contact.index');
  }
  public function submit(ContactRequest $request){
    $contact_data = $request->validated();
    Contact::create($contact_data);
    return back()->with('message', 'sent');
  }
}
