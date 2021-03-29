@extends('back.layout.app')
@section('title', 'News | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa icon-gradient bg-arielle-smile"></i>
            </div>
            <div>News
                <div class="page-title-subheading">You can manage the news in this page.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('admin.news.create')}}" type="button" class="btn-shadow btn btn-info" style="font-weight: bold;">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Add News
                </a>
            </div>
        </div>
    </div>
</div>

<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item">
        <a role="tab" class="nav-link {{!isset($_GET['ps']) && !isset($_GET['fa']) ? 'active' : ''}}" id="tab-0" data-toggle="tab" href="#en" aria-selected="true">
            <span>English News</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link af {{isset($_GET['ps']) ? 'active' : ''}}" id="tab-1" data-toggle="tab" href="#ps" aria-selected="false">
            <span>پښتو خبرونه</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link af {{isset($_GET['fa']) ? 'active' : ''}}" id="tab-2" data-toggle="tab" href="#da" aria-selected="false">
            <span>خبرهای دری</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade {{!isset($_GET['ps']) && !isset($_GET['fa']) ? 'active show' : ''}}" id="en" role="tabpanel">
        <div class="row">
            @forelse($news_en as $news)
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{$news->title}}</h5>
                        <img class="card-img-bottom" src="{{asset('storage/images/news/' . $news->image)}}"
                            alt="news image">
                    </div>
                    <div class="d-block text-right card-footer">
                        <form class="d-inline" action="{{route('admin.news.destroy', $news)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button data-type="question" type="submit"
                                class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Delete"
                                onclick="return confirm('Are you sure you want to delete this news?');">
                                <i class="fa fa-trash btn-icon-wrapper"> </i>
                            </button>
                        </form>

                        <a href="{{route('admin.news.edit', $news)}}" type="button"
                            class="btn btn-icon btn-icon-only btn-outline-success" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Edit">
                            <i class="fa fa-edit btn-icon-wrapper"> </i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <h5 class="ml-3">No news Added Yet</h5>
            @endforelse
        </div>
            <div class="row">
              <div class="col-12" style="display: flex; justify-content:center;">
                {{ $news_en->links() }}
              </div>
            </div>
    </div>
    <div class="tab-pane tabs-animation fade af {{isset($_GET['ps']) ? 'active show' : ''}}" id="ps" role="tabpanel">
        <div class="row">
            @forelse($news_pa as $news)
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{$news->title}}</h5>
                        <img class="card-img-bottom" src="{{asset('storage/images/news/' . $news->image)}}"
                            alt="news image">
                    </div>
                    <div class="d-block text-right card-footer">
                        <form class="d-inline" action="{{route('admin.news.destroy', $news)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button data-type="question" type="submit"
                                class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Delete"
                                onclick="return confirm('Are you sure you want to delete this news?');">
                                <i class="fa fa-trash btn-icon-wrapper"> </i>
                            </button>
                        </form>

                        <a href="{{route('admin.news.edit', $news)}}" type="button"
                            class="btn btn-icon btn-icon-only btn-outline-success" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Edit">
                            <i class="fa fa-edit btn-icon-wrapper"> </i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <h5 class="ml-3">No news Added Yet</h5>
            @endforelse
        </div>
        <div class="row">
          <div class="col-12" style="display: flex; justify-content:center;">
            {{ $news_pa->links() }}
          </div>
        </div>
    </div>
    <div class="tab-pane tabs-animation fade af {{isset($_GET['fa']) ? 'active show' : ''}}" id="da" role="tabpanel">
        <div class="row">
            @forelse($news_fa as $news)
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{$news->title}}</h5>
                        <img class="card-img-bottom" src="{{asset('storage/images/news/' . $news->image)}}"
                            alt="news image">
                    </div>
                    <div class="d-block text-right card-footer">
                        <form class="d-inline" action="{{route('admin.news.destroy', $news)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button data-type="question" type="submit"
                                class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Delete"
                                onclick="return confirm('Are you sure you want to delete this news?');">
                                <i class="fa fa-trash btn-icon-wrapper"> </i>
                            </button>
                        </form>

                        <a href="{{route('admin.news.edit', $news)}}" type="button"
                            class="btn btn-icon btn-icon-only btn-outline-success" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Edit">
                            <i class="fa fa-edit btn-icon-wrapper"> </i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <h5 class="ml-3">No news Added Yet</h5>
            @endforelse
        </div>
        <div class="row">
          <div class="col-12" style="display: flex; justify-content:center;">
            {{ $news_fa->links() }}
          </div>
        </div>
    </div>
</div>
@endsection
