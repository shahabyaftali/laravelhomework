@extends('front.layout.app')
@section('title', __('text.contact_us') . ' | ' . __('text.awju'))
@section('content')
<div class="mnmd-block mnmd-block--fullwidth mnmd-block--contiguous page-heading page-heading--has-background">
  <div class="container">
    <h1 class="page-heading__title">{{__('text.contact')}}</h1>
    <div class="page-heading__subtitle af-fs">{{__('text.contact_t')}}</div>
  </div>
</div>

<div class="mnmd-block mnmd-block--fullwidth">
  <div class="container">
    <div class="row">
    @if(\Session::get('locale') != 'en')
    <div class="mnmd-sub-col">
      <div class="typography-copy">
        <h3>{{__('text.contact_us')}}</h3>
        <dl>
          <dt><i class="fa fa-home"></i><span> {{__('text.address')}}</span></dt>
          <dd class="af-mr0">@if(Session::get('locale') == 'en') {{$info->address_en}} @elseif(Session::get('locale') == 'fa') {{$info->address_fa}} @else {{$info->address_pa}} @endif</dd>
          <dt><i class="fa fa-envelope"></i> <span>{{__('text.email')}}</span></dt>
          <dd class="af-mr0"><a href="mailto:{{$info->email}}" style="color:black;">{{$info->email}}</a></dd>
          <dt><i class="fa fa-phone"></i> <span>{{__('text.phone_numbers')}}</span></dt>
          <dd style="direction: initial; float:right;"><a href="tel:{{$info->phone}}" style="color:black;">{{$info->phone}}</a></dd> <br>
          <dd style="direction: initial; float:right;"><a href="tel:{{$info->phoneAlt}}" style="color:black;">{{$info->phoneAlt}}</a></dd>
        </dl>
      </div>
    </div>
    @endif
      <div class="mnmd-main-col">
        <div class="single-content">
          <div class="typography-copy">
            <h3>{{__('text.suam')}}</h3>
            @if(Session::get('message') == 'sent')
            <h5 style="color:darkgreen;">Your Email Has Been Successfully recieved.</h5>
            @endif
            <form action="{{route('contact.submit')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-sm-4 form-group">
                  <label for="contactform-name">{{__('text.name')}}<small>*</small></label>
                  <input type="text" id="contactform-name" name="name" class="form-control required" required aria-required="true" value="{{old('name')}}">
                  <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="col-sm-4 form-group">
                  <label for="contactform-email">{{__('text.email')}} <small>*</small></label>
                  <input required type="email" id="contactform-email" name="email" class="required email form-control" aria-required="true" value="{{old('email')}}">
                  <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="col-sm-4 form-group">
                  <label for="contactform-phone">{{__('text.phone')}} <small>*</small></label>
                  <input required type="text" id="phone" name="phone" value="{{old('phone')}}"
                    class="form-control">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
              </div>
              <div class="form-group"><label for="contactform-message">{{__('text.message')}}
                  <small>*</small></label><textarea required class="required form-control"
                  id="message" name="message" rows="6" cols="30"
                  aria-required="true">{{old('message')}}</textarea>
                  <span class="text-danger">{{$errors->first('name')}}</span></div>
              <div class="form-group"><input class="btn btn-primary" type="submit"
                  id="contactform-submit" name="contactform-submit" value="{{__('text.send_message')}}"></div>
            </form>
          </div>
        </div><!-- .single-content -->
      </div><!-- .mnmd-main-col -->
      @if(\Session::get('locale') == 'en')
      <div class="mnmd-sub-col">
        <div class="typography-copy">
          <h3>{{__('text.contact_us')}}</h3>
          <dl>
            <dt><i class="fa fa-home"></i><span> Address</span></dt>
            <dd>@if(Session::get('locale') == 'en') {{$info->address_en}} @elseif(Session::get('locale') == 'fa') {{$info->address_fa}} @else {{$info->address_pa}} @endif</dd>
            <dt><i class="fa fa-envelope"></i> <span>{{__('text.email')}}</span></dt>
            <dd><a href="mailto:{{$info->email}}" style="color:black;">{{$info->email}}</a></dd>
            <dt><i class="fa fa-phone"></i> <span>Phone Numbers</span></dt>
            <dd ><a style="color: black !important;" href="tel:{{$info->phone}}">{{$info->phone}}</a></dd>
            <dd><a style="color: black;" href="tel:{{$info->phoneAlt}}">{{$info->phoneAlt}}</a></dd>
          </dl>
        </div>
      </div><!-- .mnmd-sub-col -->
      @endif
    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- .mnmd-block -->
@endsection