@extends('front.layout.app')
@section('title', __('text.about') . ' | ' . __('text.awju'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous single-billboard">
    <div class="background-img hidden-xs hidden-sm"
        style="background-image: url('<?php echo asset("storage/images/about/" .$about->image); ?>')"></div>
    <div class="background-img hidden-md hidden-lg"
        style="background-image: url('<?php echo asset("storage/images/about/" . $about->image); ?>')"></div>
    <div class="single-billboard__inner">
        <header class="single-header single-header--center">
            <div class="container">
                <div class="single-header__inner inverse-text">
                    <h1 class="entry-title entry-title--lg">
                        @if(\Session::get('locale') == 'fa')
                        {{$about->title_fa}}
                        @elseif(\Session::get('locale') == 'ps')
                        {{$about->title_pa}}
                        @else
                        {{$about->title_en}}
                        @endif
                    </h1>
                    </div>
                </div>
        </header>
    </div>
</div>
<div class="mnmd-block mnmd-block--fullwidth single-entry-wrap">
        <article
          class="post post--single post-10 type-post status-publish format-standard has-post-thumbnail hentry category-abroad tag-landscape cat-5"
          itemscope itemtype="http://schema.org/Article">
          <div class="single-content">
            <div class="container container--narrow">
              <div class="single-body single-body--wide entry-content typography-copy" itemprop="articleBody">
                <div class="af-tr-rtl">
                  @if(\Session::get('locale') == 'fa')
                    {!! $about->description_fa !!}
                  @elseif(\Session::get('locale') == 'ps')
                    {!! $about->description_pa !!}
                  @else
                    {!! $about->description_en !!}
                  @endif
</div>
              </div>
            </div><!-- .container container--narrow -->
          </div><!-- .single-content -->
        </article><!-- .post--single -->
      </div><!-- .mnmd-block -->
@endsection
