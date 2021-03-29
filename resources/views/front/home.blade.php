@extends('front.layout.app')
@section('title', __('text.home_title'))
@section('content')
<!-- Slider Start -->
<div
    class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous mnmd-carousel mnmd-carousel-overlap has-overlap-background">
    <div class="overlap-background background-svg-pattern background-svg-pattern--solid-color hidden-xs"
        style="background-image:none;">
        <div class="background-overlay gradient-5-alt"></div>
    </div>
    <div class="mnmd-carousel__inner js-mnmd-carousel-overlap">
        @foreach($sliders as $slider)
        <div class="slide-content">
            <article class="post--overlay post--overlay-bottom post--overlay-floorfade cat-4">
                <div class="background-img"
                    style="background-image: url('<?php echo asset('storage/images/slider/' . $slider->image) ?>')">
                </div>
                <div class="post__text inverse-text">
                    <div class="post__text-wrap">
                        <div class="post__text-inner text-center max-width-sm">
                            <h3 class="post__title typescale-5">
                                @if(\Session::get('locale') == 'fa')
                                {{$slider->title_fa}}
                                @elseif(\Session::get('locale') == 'ps')
                                {{$slider->title_pa}}
                                @else
                                {{$slider->title_en}}
                                @endif
                            </h3>
                            <div class="post__meta"><span>
                                    @if(\Session::get('locale') == 'fa')
                                    {{$slider->subtitle_fa}}
                                    @elseif(\Session::get('locale') == 'ps')
                                    {{$slider->subtitle_pa}}
                                    @else
                                    {{$slider->subtitle_en}}
                                    @endif
                                </span></div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div><!-- .container -->
</div>
<!-- Slider End -->

<!-- News Start -->
<div class="mnmd-layout-split mnmd-block mnmd-block--fullwidth">
    <div class="container">
        <div class="row">
            <div class="mnmd-main-col" style="width: 100% !important;">
                <div class="mnmd-block">
                    <div class="block-heading block-heading--line af-tr-rtl af-fs-h">
                      <h4 class="block-heading__title">
                        @if(\Session::get('locale') == 'en')
                        <span class="first-word">Latest</span> News
                        @else
                        {{__('text.latest_news')}}
                        @endif
                      </h4>
                    </div>
                    <div class="posts-listing">
                        <div class="row row--space-between">
                            @foreach($news as $item)
                            <div class="col-xs-12 col-sm-4">
                                <article class="post post--vertical cat-1">
                                    <div class="post__thumb"><a href="{{route('news.show', $item)}}"><img
                                                src="{{asset('storage/images/news/' . $item->image)}}">
                                        </a>
                                    </div>
                                    <div class="post__text">
                                        <h3 class="post__title typescale-2 af-tr-rtl af-fs"><a
                                                href="{{route('news.show', $item)}}">{{$item->title}}</a></h3>
                                        <div class="post__excerpt af-tr-rtl">{{$item->excerpt}}</div>
                                        <div class="post__meta af-tr-rtl"><time class="time published af-tr-rtl"
                                                datetime="{{$item->created_at}}"><i
                                                    class="mdicon mdicon-schedule"></i>&nbsp;
                                                {{ $item->created_at->diffForHumans()}}</time></div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- .mnmd-block -->
            </div><!-- .mnmd-main-col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!-- News End -->

<!-- Events Start -->
<div class="mnmd-block mnmd-block--fullwidth has-background">
    <div class="background-svg-pattern background-svg-pattern--solid-color"></div>
    <div class="container">
        <div class="block-heading block-heading--center block-heading--lg block-heading--inverse">
            <div class="block-heading block-heading--line af-tr-rtl af-fs-h">
              <h4 class="block-heading__title">
                @if(\Session::get('locale') == 'en')
                <span class="first-word">Latest</span> Events
                @else
                {{__('text.latest_events')}}
                @endif
              </h4>
            </div>
        </div>
        <div class="row row--space-between">
            @foreach($events as $event)
            <div class="col-xs-12 col-sm-6 col-md-3">
                <article class="post post--card post--card-sm cat-2 text-center shadow-hover-4">
                    <div class="post__thumb"><a href="{{route('event.show', $event)}}">
                            <div class="background-img"
                                style="background-image: url('<?php echo asset('storage/images/event/' . $event->image); ?>')">
                            </div>
                        </a>
                    </div>
                    <div class="post__text">
                        <h3 class="post__title typescale-1 af-fs"><a href="{{route('event.show', $event)}}">{{$event->title}}</a></h3>
                        <p>{{$event->excerpt}}</p>
                    </div>
                    <div class="post__footer">
                        <div class="post__meta"><time class="time published" datetime="2016-08-20T08:53+00:00"
                                title="August 20, 2016 at 08:53 am"><i
                                    class="mdicon mdicon-home"></i>{{$event->address}}</time></div>
                        <div class="post__meta"><time class="time published" datetime="2016-08-20T08:53+00:00"
                                title="August 20, 2016 at 08:53 am"><i
                                    class="mdicon mdicon-schedule"></i>{{$event->date}}</time></div>
                    </div>
                </article>
            </div>
            @if($loop->iteration == 2)
            <div class="clearfix visible-sm"></div>
            @endif
            @endforeach
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!-- Events End -->

<!-- Blog Start -->
<div class="mnmd-block mnmd-block--fullwidth">
    <div class="container">
      <div class="block-heading block-heading--line af-tr-rtl af-fs-h">
        <h4 class="block-heading__title">
            @if(\Session::get('locale') == 'en')
            <span class="first-word">Latest</span> Blogs
            @else
            {{__('text.latest_blogs')}}
            @endif
        </h4>
        </div>
        <div class="row row--space-between">
            @foreach($blogs as $blog)
            <div class="col-xs-12 col-md-4">
                <a href="{{route('blog.show', $blog)}}">
                    <article
                        class="post post--overlay post--overlay-xs post--overlay-floorfade post--overlay-bottom cat-1">
                        <div class="background-img"
                            style="background-image: url('<?php echo asset('storage/images/blog/' . $blog->image)?>')">
                        </div>
                        <div class="post__text inverse-text">
                            <div class="post__text-wrap">
                                <div class="post__text-inner af-tr-rtl">
                                    <h3 class="post__title typescale-2">{{$blog->title}}</h3>
                                    <p>{{$blog->excerpt}}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
            @endforeach
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!-- Blog End -->

<!-- Trainings Start -->
<div class="mnmd-block mnmd-block--fullwidth">
    <div class="container">
      <div class="block-heading block-heading--line af-tr-rtl af-fs-h">
        <h4 class="block-heading__title">
            @if(\Session::get('locale') == 'en')
            <span class="first-word">Latest</span> Trainings
            @else
            {{__('text.latest_tuts')}}
            @endif
        </h4>
        </div>
    </div>
    <div class="row row--space-between">
        @php($i = 1)
        @foreach($tutorials as $tutorial)
        @if($i == 1)
        <div class="col-xs-12">
            <article class="post--overlay post--overlay-bottom post--overlay-floorfade post--overlay-md cat-4">
                <div class="background-img"
                    style="background-image: url('<?php echo asset('storage/images/training/' . $tutorial->image )?>')">
                </div>
                <div class="post__text inverse-text">
                    <div class="post__text-wrap">
                        <div class="post__text-inner text-center max-width-md">
                            <div class="post-type-icon post-type-icon--lg"><i
                                    class="mdicon mdicon-play_circle_outline"></i></div>
                            <h3 class="post__title typescale-5">{{$tutorial->title}}</h3>
                            <p>{{$tutorial->excerpt}}</p>
                        </div>
                    </div>
                </div><a href="{{route('training.show', $tutorial)}}" class="link-overlay"></a>
            </article>
        </div>
        @endif
        @php($i++)
        @endforeach
    </div>
    <div class="row row--space-between">
        @php($x = 1)
        @foreach($tutorials as $tutorial)
        @if($x > 1)
        <div class="col-sm-6 col-md-3">
            <article class="post post--vertical cat-2">
                <div class="post__thumb"><a href="{{route('training.show', $tutorial)}}"><img src="{{asset('storage/images/training/' . $tutorial->image)}}">
                        <div class="overlay-item--center-xy post-type-icon"><i
                                class="mdicon mdicon-play_circle_outline"></i></div>
                    </a></div>
                <div class="post__text text-center">
                    <h3 class="post__title typescale-1"><a href="{{route('training.show', $tutorial)}}">{{$tutorial->title}}</a></h3>
                    <p>{{$tutorial->excerpt}}</p>
                </div>
            </article>
        </div>
        @endif
        @if($x == 3)
        <div class="clearfix visible-sm"></div>
        @endif
        @php($x++)
        @endforeach
    </div>
</div><!-- .container -->
</div>
<!-- Trainings End -->
@endsection
