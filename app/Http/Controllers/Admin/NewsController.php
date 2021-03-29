<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
      $news_en = News::orderBy('created_at', 'desc')->where('language', 'en')->paginate(6, ['*'], 'en');
      $news_pa = News::orderBy('created_at', 'desc')->where('language', 'ps')->paginate(6, ['*'], 'ps');
      $news_fa = News::orderBy('created_at', 'desc')->where('language', 'fa')->paginate(6, ['*'], 'fa');
      return view('back.news.index', compact(['news_en', 'news_pa', 'news_fa']));
    }

    public function create()
    {
      return view('back.news.create');
    }

    public function store(NewsRequest $request)
    {
      $news_data = $request->validated();
      $imagePath = $request->file('image')->store('public/images/news');
      $image = basename($imagePath);
      $news_data['image'] = $image;
      News::create($news_data);
      return redirect(route('admin.news.index'));
    }

    public function edit(News $news)
    {
      return view('back.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
      $news_data = $request->validated();
      if ($request->hasFile('image')){
        $preImage = News::find($news['id'])['image'];
        Storage::delete('public/images/news/' . $preImage);
        $imagePath = $request->file('image')->store('public/images/news');
        $image = basename($imagePath);
        $news_data['image'] = $image;
      }
      News::where('id', $news['id'])->update($news_data);
      return redirect(route('admin.news.index'));
    } 

    public function destroy(News $news)
    {
      $preImage = News::find($news['id'])['image'];
      Storage::delete('public/images/news/' . $preImage);
      $news->delete();
      return back();
    }
}
