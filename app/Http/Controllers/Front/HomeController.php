<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Event;
use App\Models\News;
use App\Models\Slider;
use App\Models\Training;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
  public function index(){
    $locale = Session::get('locale');
    
    $sliders = Slider::all();
    $news = News::where('language', $locale)->orderBy('created_at', 'DESC')->take(3)->get();
    $events = Event::where('language', $locale)->orderBy('created_at', 'DESC')->take(4)->get();
    $blogs = Blog::where('language', $locale)->orderBy('created_at', 'DESC')->take(3)->get();
    $tutorials = Training::where('language', $locale)->orderBy('created_at', 'DESC')->take(5)->get();
    
    return view('front.home', compact(['sliders', 'news', 'events', 'blogs', 'tutorials']));
  }
}
