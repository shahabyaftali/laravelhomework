<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
  public function index(){
    $locale = Session::get('locale');
    $events = Event::where('language', $locale)->orderBy('created_at', 'DESC')->paginate(6);
    return view('front.event.index', compact('events'));
  }
  public function show(Event $event){
    $locale = Session::get('locale');
    if($locale != $event->language){
      return redirect(route('event.index'));
    }
    $others = Event::where('language', $locale)->where('id', '!=', $event->id)->orderBy('created_at', 'DESC')->get()->take(4);
    return view('front.event.show', compact(['event', 'others']));
  }
}
