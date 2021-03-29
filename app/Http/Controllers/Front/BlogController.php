<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
  public function index(){
    $locale = Session::get('locale');
    $blogs = Blog::where('language', $locale)->orderBy('created_at', 'DESC')->paginate(6);
    return view('front.blog.index', compact(['blogs']));
  }
  public function show(Blog $blog){
    $locale = Session::get('locale');
    if($locale != $blog->language){
      return redirect(route('blog.index'));
    }
    $others = Blog::where('language', $locale)->where('id', '!=', $blog->id)->orderBy('created_at', 'DESC')->get()->take(4);
    return view('front.blog.show', compact(['blog', 'others']));
  }
}
