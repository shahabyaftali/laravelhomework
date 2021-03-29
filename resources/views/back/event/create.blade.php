@extends('back.layout.app')
@section('title', 'Add Event | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-plus icon-gradient bg-arielle-smile"></i>
            </div>
            <div>Add Event
                <div class="page-title-subheading">Fill the following form to add an event</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('admin.event.index')}}" type="button" class="btn-shadow btn btn-info"
                    style="font-weight: bold;">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Go Back
                </a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Event Form</h5>
        <form id="signupForm" method="post" action="{{route('admin.event.store')}}" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
            <div class="position-relative row form-group">
                <label for="language" class="col-sm-2 col-form-label">Language</label>
                <div class="col-sm-10">
                    <select name="language" id="language" class="form-control">
                      <option value="en">English</option>
                      <option value="ps">پښتو</option>
                      <option value="fa">دری</option>
                    </select>
                    <span class="text-danger text-italic">{{$errors->first('language')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" id="title" placeholder="Women's day celebration" type="text" class="form-control" value="{{old('title')}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('title')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input name="date" id="date" type="date" class="form-control" value="{{old('date')}}" required>
                    <span class="text-danger text-italic">{{$errors->first('date')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input name="address" id="address" placeholder="US Embassy" type="text" class="form-control" value="{{old('address')}}">
                    <span class="text-danger text-italic">{{$errors->first('address')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" id="description" class="form-control tiny" required>{{old('description')}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('description')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="excerpt" class="col-sm-2 col-form-label">Excerpt</label>
                <div class="col-sm-10">
                    <textarea name="excerpt" id="excerpt" class="form-control" required>{{old('excerpt')}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('excerpt')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input name="image" id="image" type="file" class="form-control-file form-control" required>
                    <span class="text-danger text-italic">{{$errors->first('image')}}</span>
                    <small class="form-text text-muted">The width and height of the image must be taken into account.
                    </small>
                </div>
            </div>
            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2 pl-0">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
