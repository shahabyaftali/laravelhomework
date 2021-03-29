@extends('back.layout.app')
@section('title', 'Company Info | Binary Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-building icon-gradient bg-malibu-beach"></i>
            </div>
            <div>Edit Company Info
                <div class="page-title-subheading">Fill the following form to edit the Company Info.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Info Form</h5>
        <form id="signupForm" method="post" action="{{route('admin.info.update', $info)}}" novalidate="novalidate">
            @csrf
            @method('PATCH')
            <div class="position-relative row form-group">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-4">
                    <input name="phone" id="phone" type="text" class="form-control-file form-control" value="{{$info->phone}}" maxlength="16" minlength="9">
                    <span class="text-danger text-italic">{{$errors->first('phone')}}</span>
                </div>
                <label for="phoneAlt" class="col-sm-2 col-form-label text-right">Phone Alt</label>
                <div class="col-sm-4">
                    <input name="phoneAlt" id="phoneAlt" type="text" class="form-control-file form-control" value="{{$info->phoneAlt}}" maxlength="16" minlength="9">
                    <span class="text-danger text-italic">{{$errors->first('phoneAlt')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" id="email" type="email" class="form-control " value="{{$info->email}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('email')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="facebook" class="col-sm-2 col-form-label">Facebook Page Link</label>
                <div class="col-sm-10">
                    <input name="facebook" id="facebook" type="url" class="form-control" value="{{$info->facebook}}" required
                        maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('facebook')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="twitter" class="col-sm-2 col-form-label">Twitter Link</label>
                <div class="col-sm-10">
                    <input name="twitter" id="twitter" type="url" class="form-control" value="{{$info->twitter}}" required
                        maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('twitter')}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="position-relative row form-group">
                <label for="address_en" class="col-sm-2 col-form-label">Address in English</label>
                <div class="col-sm-10">
                    <input name="address_en" id="address_en" type="text" class="form-control" value="{{$info->address_en}}" required
                        maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('address_en')}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="position-relative row form-group">
                <label for="address_pa" class="col-sm-2 col-form-label">Address in Pashto</label>
                <div class="col-sm-10">
                    <input name="address_pa" id="address_pa" type="text" class="form-control" value="{{$info->address_pa}}" required
                        maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('address_pa')}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="position-relative row form-group">
                <label for="address_fa" class="col-sm-2 col-form-label">Address in Dari</label>
                <div class="col-sm-10">
                    <input name="address_fa" id="address_fa" type="text" class="form-control" value="{{$info->address_fa}}" required
                        maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('address_fa')}}</span>
                </div>
            </div>
            <div class="position-relative row form-check">
                <div class="col-sm-4 offset-sm-2 pl-0">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
