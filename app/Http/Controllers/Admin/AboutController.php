<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
  public function index() {
    $about = About::where('id', 1)->first();
    return view('back.about.index', compact('about'));
  }

  public function update(AboutRequest $request, About $about){
    $about_data = $request->validated();
    if ($request->hasFile('image')){
      $preImage = About::find($about['id'])['image'];
      Storage::delete('public/images/about/' . $preImage);
      $imagePath = $request->file('image')->store('public/images/about');
      $image = basename($imagePath);
      $about_data['image'] = $image;
    }
    About::where('id', 1)->update($about_data);
    return redirect(route('admin.about.index'));
  }
}
