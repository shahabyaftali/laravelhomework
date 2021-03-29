@extends('front.layout.app')
@section('title', $event->title . ' | ' . __('text.awju'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous single-billboard js-overlay-bg">
    <div class="background-img hidden-xs hidden-sm"
        style="background-image: url('<?php

use Illuminate\Support\Facades\URL;

echo asset("storage/images/event/" . $event->image)?>')"></div>
    <div class="background-img background-img--darkened hidden-md hidden-lg"
        style="background-image: url('<?php echo asset("storage/images/event/" . $event->image)?>')"></div>
    <div class="single-billboard__inner">
        <header class="single-header single-header--center">
            <div class="container">
                <div class="single-header__inner inverse-text js-overlay-bg-sub-area">
                    <div class="background-img background-img--dimmed blurred-more hidden-xs hidden-sm js-overlay-bg-sub"
                        style="background-image: url('<?php echo asset("storage/images/event/" . $event->image)?>')">
                    </div>
                    <div class="single-header__content">
                        <h1 class="entry-title entry-title--lg">{{$event->title}}</h1>
                        <div class="entry-meta af-rtl af-fs"><time class="entry-date published"
                                datetime="{{$event->created_at}}" itemprop="datePublished"
                                title="{{$event->created_at}}"><i
                                    class="mdicon mdicon-schedule"></i>{{$event->created_at->diffForhumans()}}</time>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>



<div class="mnmd-block mnmd-block--fullwidth single-entry-wrap" style="transform: none;">
    <div class="container" style="transform: none;">
        <div class="row af-rtl" style="transform: none;">
            @if(\Session::get('locale') != 'en')
            <div class="mnmd-sub-col mnmd-sub-col--right sidebar js-sticky-sidebar" role="complementary"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; top: 80px; left: 943.5px;">
                    <div class="mnmd-widget-indexed-posts-c mnmd-widget widget">
                        <div class="widget__title">
                            <h4 class="widget__title-text af-fs">
                              <span class="first-word">
                              {{__('text.other_events')}}
                              </span>
                            </h4>
                            <div class="widget__title-seperator"></div>
                        </div>
                        <ol class="posts-list list-space-md list-seperated-exclude-first list-unstyled">
                          @foreach($others as $other)
                            @if($loop->iteration == 1)
                            <li>
                                <article class="post post--overlay post--overlay-bottom cat-4">
                                    <div class="background-img background-img--darkened"
                                        style="background-image: url('<?php echo asset('storage/images/event/' . $other->image);?>')"></div>
                                    <div class="post__text inverse-text">
                                        <div class="post__text-inner">
                                            <div class="media">
                                                <div class="media-left media-middle"><span class="list-index">1</span>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <h3 class="post__title typescale-1">{{$other->title}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div><a href="{{route('event.show', $other)}}" class="link-overlay"></a>
                                </article>
                            </li>
                            @elseif($loop->iteration > 1)
                            <li>
                                <article class="post cat-5">
                                    <div class="media">
                                        <div class="media-left media-middle"><span class="list-index">{{$loop->iteration}}</span></div>
                                        <div class="media-body media-middle">
                                            <h3 class="post__title typescale-0"><a href="{{route('event.show', $other)}}">{{$other->title}}</a></h3>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            @endif
                          @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            @endif
            <div class="mnmd-main-col" role="main">
                <article
                    class="mnmd-block post post--single post-10 type-post status-publish format-standard has-post-thumbnail hentry category-abroad tag-landscape cat-5"
                    itemscope="" itemtype="http://schema.org/Article">
                    <!-- Schema meta -->
                    <div class="page-schema-meta">
                        <link itemprop="mainEntityOfPage" href="#single-url">
                        <meta itemprop="headline"
                            content="Nintendo is reportedly bringing Zelda to your phone this year">
                        <meta itemprop="datePublished" content="2017-02-10">
                        <meta itemprop="dateModified" content="2017-02-10">
                        <meta itemprop="commentCount" content="24">
                        <div itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
                            <meta itemprop="url" content="#image-url">
                            <meta itemprop="width" content="1000">
                            <meta itemprop="height" content="563">
                        </div>
                        <div itemscope="" itemprop="author" itemtype="http://schema.org/Person">
                            <meta itemprop="name" content="Ryan Reynold">
                        </div>
                        <div itemprop="publisher" itemscope="" itemtype="http://schema.org/Organization">
                            <meta itemprop="name" content="The Next Mag">
                            <div class="hidden" itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                                <meta itemprop="url" content="#logo-url">
                                <meta itemprop="width" content="200">
                                <meta itemprop="height" content="70">
                            </div>
                        </div>
                    </div><!-- Schema meta -->
                    <div class="single-content">
                        <div class="entry-interaction entry-interaction--horizontal">
                            <div class="entry-interaction__left">
                            <?php
                                $url = URL::current();
                                $link = "https://www.facebook.com/plugins/share_button.php?href=" .$url .  "&layout=button_count&size=small&width=77&height=20&appId"
                                ?>
                                <iframe src="{{$link}}" width="77" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                        </div>
                        <div class="single-body entry-content typography-copy" itemprop="articleBody">
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div><!-- .single-content -->
                </article><!-- .post--single -->
            </div>
            @if(\Session::get('locale') == 'en')
            <div class="mnmd-sub-col mnmd-sub-col--right sidebar js-sticky-sidebar" role="complementary"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; top: 80px; left: 943.5px;">
                    <div class="mnmd-widget-indexed-posts-c mnmd-widget widget">
                        <div class="widget__title">
                            <h4 class="widget__title-text">
                              <span class="first-word">
                                {{__('text.other_events')}}
                              </span>
                            </h4>
                            <div class="widget__title-seperator"></div>
                        </div>
                        <ol class="posts-list list-space-md list-seperated-exclude-first list-unstyled">
                          @foreach($others as $other)
                            @if($loop->iteration == 1)
                            <li>
                                <article class="post post--overlay post--overlay-bottom cat-4">
                                    <div class="background-img background-img--darkened"
                                        style="background-image: url('<?php echo asset('storage/images/event/' . $other->image);?>')"></div>
                                    <div class="post__text inverse-text">
                                        <div class="post__text-inner">
                                            <div class="media">
                                                <div class="media-left media-middle"><span class="list-index">1</span>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <h3 class="post__title typescale-1">{{$other->title}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div><a href="{{route('event.show', $other)}}" class="link-overlay"></a>
                                </article>
                            </li>
                            @elseif($loop->iteration > 1)
                            <li>
                                <article class="post cat-5">
                                    <div class="media">
                                        <div class="media-left media-middle"><span class="list-index">{{$loop->iteration}}</span></div>
                                        <div class="media-body media-middle">
                                            <h3 class="post__title typescale-0"><a href="{{route('event.show', $other)}}">{{$other->title}}</a></h3>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            @endif
                          @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            @endif
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .mnmd-block -->
@endsection
