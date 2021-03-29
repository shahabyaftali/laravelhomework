@extends('front.layout.app')
@section('title', __('text.event_h'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous page-heading page-heading--center page-heading--has-background">
  <div class="container">
    <h2 class="page-heading__title">{{__('text.event_h')}}</h2>
    <div class="page-heading__subtitle">{{__('text.event_t')}}</div>
  </div>
</div>
<div class="mnmd-block mnmd-block--fullwidth">
  <div class="container">
    <div class="posts-listing">
      <div class="row af-rtl row--space-between">
        @foreach($events as $item)
        <div class="col-xs-12 col-sm-6 col-md-4 af-tr-rtl">
          <article class="post post--vertical cat-1">
            <div class="post__thumb"><a href="{{route('event.show', $item)}}"><img src="{{asset('storage/images/event/' . $item->image)}}"></a></div>
            <div class="post__text">
              <h3 class="post__title typescale-2"><a href="{{route('event.show', $item)}}">{{$item->title}}</a></h3>
              <div class="post__excerpt">{{$item->excerpt}}</div>
              <div class="post__meta">
                <time class="time published" datetime="{{$item->created_at}}" title="{{$item->created_at}}"><i class="mdicon mdicon-schedule"></i>{{$item->created_at->diffForhumans()}}</time>
                <time class="time published"><i class="mdicon mdicon-home"></i>{{$item->address}}</time>
            </div>
            </div>
          </article>
        </div>
        <div class="clearfix visible-sm"></div>
        @endforeach
      </div><!-- .row -->
    </div>
    <nav class="mnmd-pagination">
      <h4 class="mnmd-pagination__title sr-only">Posts navigation</h4>
      <div style="display: flex; justify-content:center;">
        {{$events->links()}}
      </div>
    </nav>
  </div><!-- .container -->
</div>
@endsection