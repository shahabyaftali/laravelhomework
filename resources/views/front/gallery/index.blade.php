@extends('front.layout.app')
@section('title', __('text.gallery_h'))
@section('content')
<div
    class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous page-heading page-heading--center page-heading--has-background">
    <div class="container">
        <h2 class="page-heading__title">{{__('text.gallery_h')}}</h2>
        <div class="page-heading__subtitle">{{__('text.gallery_t')}}</div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="fotorama mnmd-gallery-slider mnmd-post-media-wide" itemscope
            itemtype="http://schema.org/ImageGallery" data-width="100%" data-nav="thumbs" data-allowfullscreen="true"
            data-click="false">
            @foreach($pictures as $picture)
            <a href="{{asset('storage/images/gallery/' . $picture->image)}}" itemprop="contentUrl" data-size="1200x675"
                data-caption="{{\Session::get('locale') == 'ps' ? $picture->title_ps : ''}} {{\Session::get('locale') == 'fa' ? $picture->title_fa : ''}} {{\Session::get('locale') == 'en' ? $picture->title_en : ''}}">
                <img src="{{asset('storage/images/gallery/' . $picture->image)}}" itemprop="thumbnail" alt="Image alt" width="180" height="135"> 
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
