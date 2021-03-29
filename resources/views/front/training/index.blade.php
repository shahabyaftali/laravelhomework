@extends('front.layout.app')
@section('title', __('text.training_h'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous page-heading page-heading--center page-heading--has-background">
  <div class="container">
    <h2 class="page-heading__title">{{__('text.training_h')}}</h2>
    <div class="page-heading__subtitle">{{__('text.training_t')}}</div>
  </div>
</div>
<div class="mnmd-block mnmd-block--fullwidth">
  <div class="container">
    <div class="posts-listing">
      <div class="row af-rtl row--space-between">
        @foreach($trainings as $tutorial)
        <div class="col-sm-6 col-md-4">
            <article class="post post--vertical cat-2">
                <div class="post__thumb"><a href="{{route('training.show', $tutorial)}}"><img src="{{asset('storage/images/training/' . $tutorial->image)}}">
                        <div class="overlay-item--center-xy post-type-icon"><i
                                class="mdicon mdicon-play_circle_outline"></i></div>
                    </a></div>
                <div class="post__text text-center">
                    <h3 class="post__title typescale-1"><a href="{{route('training.show', $tutorial)}}">{{$tutorial->title}}</a></h3>
                    <p>{{Str::limit($tutorial->excerpt, 100)}}</p>
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
        {{$trainings->links()}}
      </div>
    </nav>
  </div><!-- .container -->
</div>
@endsection