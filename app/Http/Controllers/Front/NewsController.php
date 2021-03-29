<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\News;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
  public function index(){
    $locale = Session::get('locale');
    $news = News::where('language', $locale)->orderBy('created_at', 'DESC')->paginate(6);
    $events = Event::where('language', $locale)->orderBy('created_at', 'DESC')->paginate(6);
    return view('front.news.index', compact(['events', 'news']));
  }
  public function show(News $news){
    $locale = Session::get('locale');
    if($locale != $news->language){
      return redirect(route('news.index'));
    }
    $others = News::where('language', $locale)->where('id', '!=', $news->id)->orderBy('created_at', 'DESC')->get()->take(4);
    return view('front.news.show', compact(['news', 'others']));
  }
}
