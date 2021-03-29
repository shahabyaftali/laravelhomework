@extends('front.layout.app')
@section('title', $training->title . ' | ' . __('text.awju'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous single-entry-wrap">
  <article
    class="post post--single post-10 type-post status-publish format-standard has-post-thumbnail hentry category-abroad tag-landscape cat-5"
    itemscope itemtype="http://schema.org/Article">
    <!-- Schema meta -->
    <div class="page-schema-meta">
      <link itemprop="mainEntityOfPage" href="#single-url">
      <meta itemprop="headline" content="Nintendo is reportedly bringing Zelda to your phone this year">
      <meta itemprop="datePublished" content="2017-02-10">
      <meta itemprop="dateModified" content="2017-02-10">
      <meta itemprop="commentCount" content="24">
      <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
        <meta itemprop="url" content="#image-url">
        <meta itemprop="width" content="1000">
        <meta itemprop="height" content="563">
      </div>
      <div itemscope itemprop="author" itemtype="http://schema.org/Person">
        <meta itemprop="name" content="Ryan Reynold">
      </div>
      <div itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
        <meta itemprop="name" content="The Next Mag">
        <div class="hidden" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
          <meta itemprop="url" content="#logo-url">
          <meta itemprop="width" content="200">
          <meta itemprop="height" content="70">
        </div>
      </div>
    </div><!-- Schema meta -->
    <div class="single-content">
      <div class="single-entry-featured-media-wrap">
        <div class="container">
          <div class="single-entry-featured-media">
            <div class="mnmd-responsive-video" style="margin-top: 25px;"><iframe
                src="{{$video}}"
                frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
          </div>
        </div><!-- .container -->
      </div>
      <div class="container container--narrow">
        <header class="single-header single-header--center">
          <div class="single-header__inner">
            <h1 class="entry-title entry-title--lg">{{$training->title}}</h1>
            <div class="entry-teaser hidden-xs">{{$training->excerpt}}</div>
            <div class="entry-meta"><time
                class="entry-date published" datetime="{{$training->created_at}}" itemprop="datePublished"
                title="{{$training->created_at}}"><i class="mdicon mdicon-schedule"></i>{{$training->created_at->diffForhumans()}}</time> 
          </div>
        </header>
        <div class="entry-interaction entry-interaction--horizontal">
          <div class="entry-interaction__left">
          <?php
          $url = URL::current();
          $link = "https://www.facebook.com/plugins/share_button.php?href=" .$url .  "&layout=button_count&size=small&width=77&height=20&appId"
          ?>
          <iframe src="{{$link}}" width="77" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
        <div class="single-body single-body--wide entry-content typography-copy" itemprop="articleBody">
          <p>{!! $training->description !!}</p>
          
        </div>
      </div><!-- .container container--narrow -->
    </div><!-- .single-content -->
  </article><!-- .post--single -->
</div><!-- .mnmd-block -->
@endsection
