@extends('front.layout.app')
@section('title', $blog->title . ' | ' . __('text.awju'))
@section('content')
<?php
use Illuminate\Support\Facades\URL;
?>
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous single-header-with-bg">
  <div class="container af-tr-rtl">
    <header class="single-header inverse-text">
      <div class="single-header__inner">
        <h1 class="entry-title entry-title--lg">{{$blog->title}}</h1>
        <div class="entry-meta"><time
            class="entry-date published" datetime="{{$blog->created_at}}" itemprop="datePublished"
            title="{{$blog->created_at}}"><i class="mdicon mdicon-schedule"></i>{{$blog->created_at->diffForhumans()}}</time>
        </div>
      </div>
    </header>
  </div>
</div>

<div class="mnmd-block mnmd-block--fullwidth single-entry-wrap">
  <div class="container">
    <div class="row">
    @if(\Session::get('locale') != 'en')
    <div class="mnmd-sub-col mnmd-sub-col--right sidebar js-sticky-sidebar" role="complementary">
        <!-- Widget Indexed posts C -->
        <div class="mnmd-widget-indexed-posts-c mnmd-widget widget">
          <div class="widget__title">
            <h4 class="widget__title-text af-fs"><span class="first-word">{{__('text.other_blogs')}}</span></h4>
            <div class="widget__title-seperator"></div>
          </div>
          <ol class="posts-list list-space-md list-seperated-exclude-first list-unstyled">
          @foreach($others as $other)
            @if($loop->iteration == 1)
            <li>
                <article class="post post--overlay post--overlay-bottom cat-4">
                    <div class="background-img background-img--darkened"
                        style="background-image: url('<?php
echo asset('storage/images/blog/' . $other->image);?>')"></div>
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
                    </div><a href="{{route('blog.show', $other)}}" class="link-overlay"></a>
                </article>
            </li>
            @elseif($loop->iteration > 1)
            <li>
                <article class="post cat-5">
                    <div class="media">
                        <div class="media-left media-middle"><span class="list-index">{{$loop->iteration}}</span></div>
                        <div class="media-body media-middle">
                            <h3 class="post__title typescale-0"><a href="{{route('blog.show', $other)}}">{{$other->title}}</a></h3>
                        </div>
                    </div>
                </article>
            </li>
            @endif
          @endforeach
          </ol>
        </div><!-- Widget Indexed posts C -->
        <!-- Widget posts list -->
      </div><!-- .mnmd-sub-col -->
    @endif
      <div class="mnmd-main-col" role="main">
        <article
          class="mnmd-block post post--single post-10 type-post status-publish format-standard has-post-thumbnail hentry category-abroad tag-landscape cat-5"
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
            <div class="entry-thumb single-entry-thumb"><img src="{{asset('storage/images/blog/' . $blog->image )}}"></div>
            <div class="entry-interaction entry-interaction--horizontal">
              <div class="entry-interaction__left">
              <?php
              $url = URL::current();
              $link = "https://www.facebook.com/plugins/share_button.php?href=" .$url .  "&layout=button_count&size=small&width=77&height=20&appId";
              ?>
              <iframe src="{{$link}}" width="77" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
              </div>
            </div>
            <div class="single-body entry-content typography-copy" itemprop="articleBody">
              <p>{!! $blog->description !!}</p>
            </div>
          </div><!-- .single-content -->
        </article><!-- .post--single -->
      </div><!-- .mnmd-main-col -->
    @if(\Session::get('locale') == 'en')
      <div class="mnmd-sub-col mnmd-sub-col--right sidebar js-sticky-sidebar" role="complementary">
        <!-- Widget Indexed posts C -->
        <div class="mnmd-widget-indexed-posts-c mnmd-widget widget">
          <div class="widget__title">
            <h4 class="widget__title-text">
              <span class="first-word">{{__('text.other_blogs')}}</span>
            </h4>
            <div class="widget__title-seperator"></div>
          </div>
          <ol class="posts-list list-space-md list-seperated-exclude-first list-unstyled">
          @foreach($others as $other)
            @if($loop->iteration == 1)
            <li>
                <article class="post post--overlay post--overlay-bottom cat-4">
                    <div class="background-img background-img--darkened"
                        style="background-image: url('<?php echo asset('storage/images/blog/' . $other->image);?>')"></div>
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
                    </div><a href="{{route('blog.show', $other)}}" class="link-overlay"></a>
                </article>
            </li>
            @elseif($loop->iteration > 1)
            <li>
                <article class="post cat-5">
                    <div class="media">
                        <div class="media-left media-middle"><span class="list-index">{{$loop->iteration}}</span></div>
                        <div class="media-body media-middle">
                            <h3 class="post__title typescale-0"><a href="{{route('blog.show', $other)}}">{{$other->title}}</a></h3>
                        </div>
                    </div>
                </article>
            </li>
            @endif
          @endforeach
          </ol>
        </div><!-- Widget Indexed posts C -->
        <!-- Widget posts list -->
      </div><!-- .mnmd-sub-col -->
    @endif
    </div><!-- .row -->
  </div><!-- .container -->
</div>
@endsection
