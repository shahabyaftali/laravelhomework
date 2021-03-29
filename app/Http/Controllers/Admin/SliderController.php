<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\Admin\SliderRequest;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
  public function __construct(){
    // $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $sliders = Slider::all();
    return view('back.slider.index', compact('sliders'));
  }

  public function create()
  {
    return view('back.slider.create');
  }

  public function store(SliderRequest $request)
  {
    $slider_data = $request->validated();
    $imagePath = $request->file('image')->store('public/images/slider');
    $image = basename($imagePath);
    $slider_data['image'] = $image;
    Slider::create($slider_data);
    return redirect(route('admin.slider.index'));
  }

  public function edit(Slider $slider)
  {
    return view('back.slider.edit', compact('slider'));
  }

  public function update(SliderRequest $request, Slider $slider)
  {
    $slider_data = $request->validated();
    if ($request->hasFile('image')){
      $preImage = Slider::find($slider['id'])['image'];
      Storage::delete('public/images/slider/' . $preImage);
      $imagePath = $request->file('image')->store('public/images/slider');
      $image = basename($imagePath);
      $slider_data['image'] = $image;
    }
    Slider::where('id', $slider['id'])->update($slider_data);
    return redirect(route('admin.slider.index'));
  }

  public function destroy(Slider $slider)
  {
    $preImage = Slider::find($slider['id'])['image'];
    Storage::delete('public/images/slider/' . $preImage);
    $slider->delete();
    return back();
  }
}
