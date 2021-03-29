<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    $contacts = Contact::all();
    return view('back.contact.index', compact('contacts'));
  }

  public function subscribers(){
    $subscribers = Subscriber::all();
    return view('back.contact.subscriber', compact('subscribers'));
  }

  public function destroySubscriber(Subscriber $subscriber){
    $subscriber->delete();
    return back()->with('deleted', 'true');
  }

  public function destroy(Contact $contact){
    $contact->delete();
    return back()->with('deleted', 'true');
  }
}
