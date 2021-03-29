@extends('front.layout.app')
@section('title', __('text.blog_h'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous page-heading page-heading--center page-heading--has-background">
  <div class="container">
    <h2 class="page-heading__title">{{__('text.blog_h')}}</h2>
    <div class="page-heading__subtitle">{{__('text.blog_t')}}</div>
  </div>
</div>
<div class="mnmd-block mnmd-block--fullwidth">
  <div class="container">
    <div class="posts-listing">
      <div class="row af-rtl row--space-between d-flex flex-wrap">
        @foreach($blogs as $blog)
        <div class="col-xs-12 col-md-4 af-tr-rtl">
            <a href="{{route('blog.show', $blog)}}">
                <article
                    class="post post--overlay post--overlay-xs post--overlay-floorfade post--overlay-bottom cat-1">
                    <div class="background-img"
                        style="background-image: url('<?php echo asset('storage/images/blog/' . $blog->image)?>')"></div>
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
    </div>
    <nav class="mnmd-pagination">
      <h4 class="mnmd-pagination__title sr-only">Posts navigation</h4>
      <div style="display: flex; justify-content:center;">
        {{$blogs->links()}}
      </div>
    </nav>
  </div><!-- .container -->
</div>
@endsection