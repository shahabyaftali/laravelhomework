<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
      $blogs_en = Blog::orderBy('created_at', 'desc')->where('language', 'en')->paginate(6, ['*'], 'en');
      $blogs_pa = Blog::orderBy('created_at', 'desc')->where('language', 'ps')->paginate(6, ['*'], 'ps');
      $blogs_fa = Blog::orderBy('created_at', 'desc')->where('language', 'fa')->paginate(6, ['*'], 'fa');
      return view('back.blog.index', compact(['blogs_en', 'blogs_pa', 'blogs_fa']));
    }

    public function create()
    {
      return view('back.blog.create');
    }

    public function store(BlogRequest $request)
    {
      $blog_data = $request->validated();
      $imagePath = $request->file('image')->store('public/images/blog');
      $image = basename($imagePath);
      $blog_data['image'] = $image;
      Blog::create($blog_data);
      return redirect(route('admin.blog.index'));
    }

    public function edit(Blog $blog)
    {
      return view('back.blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
      $blog_data = $request->validated();
      if ($request->hasFile('image')){
        $preImage = Blog::find($blog['id'])['image'];
        Storage::delete('public/images/blog/' . $preImage);
        $imagePath = $request->file('image')->store('public/images/blog');
        $image = basename($imagePath);
        $blog_data['image'] = $image;
      }
      Blog::where('id', $blog['id'])->update($blog_data);
      return redirect(route('admin.blog.index'));
    }

    public function destroy(Blog $blog)
    {
      $preImage = Blog::find($blog['id'])['image'];
      Storage::delete('public/images/blog/' . $preImage);
      $blog->delete();
      return back();
    }
}
