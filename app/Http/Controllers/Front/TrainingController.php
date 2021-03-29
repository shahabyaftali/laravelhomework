<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Support\Facades\Session;

class TrainingController extends Controller
{
  public function index(){
    $locale = Session::get('locale');
    $trainings = Training::where('language', $locale)->orderBy('created_at', 'DESC')->paginate(6);
    return view('front.training.index', compact('trainings'));
  }
  public static function get_youtube_id_from_url($url)
  {
    if (stristr($url,'youtu.be/'))
    {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
    else
    {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
  }
  public function show(Training $training){
    $locale = Session::get('locale');
    if($locale != $training->language){
      return redirect(route('training.index'));
    }
    $others = Training::where('language', $locale)->where('id', '!=', $training->id)->orderBy('created_at', 'DESC')->get()->take(4);
    $video = 'https://www.youtube.com/embed/' . TrainingController::get_youtube_id_from_url($training['video']);
    return view('front.training.show', compact(['training', 'video', 'others']));
  }
}
