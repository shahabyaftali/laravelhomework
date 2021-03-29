<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
      $gallery = Gallery::all();
      return view('back.gallery.index', compact('gallery'));
    }

    public function create()
    {
      return view('back.gallery.create');
    }
    
    public function store(GalleryRequest $request)
    {
      $gallery_data = $request->validated();
      $imagePath = $request->file('image')->store('public/images/gallery');
      $image = basename($imagePath);
      $gallery_data['image'] = $image;
      Gallery::create($gallery_data);
      return redirect(route('admin.gallery.index'));
    }

    public function edit(Gallery $gallery)
    {
      return view('back.gallery.edit', compact('gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
      $gallery_data = $request->validated();
      if ($request->hasFile('image')){
        $preImage = Gallery::find($gallery['id'])['image'];
        Storage::delete('public/images/gallery/' . $preImage);
        $imagePath = $request->file('image')->store('public/images/gallery');
        $image = basename($imagePath);
        $gallery_data['image'] = $image;
      }
      Gallery::where('id', $gallery['id'])->update($gallery_data);
      return redirect(route('admin.gallery.index'));
    }

    public function destroy(Gallery $gallery)
    {
      $preImage = Gallery::find($gallery['id'])['image'];
      Storage::delete('public/images/gallery/' . $preImage);
      $gallery->delete();
      return back();
    }
}
