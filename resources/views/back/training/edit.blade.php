@extends('back.layout.app')
@section('title', 'Edit Training | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-edit icon-gradient bg-arielle-smile"></i>
            </div>
            <div>Edit Training
                <div class="page-title-subheading">Fill the following form to edit the training</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('admin.training.index')}}" type="button" class="btn-shadow btn btn-info" style="font-weight: bold;">
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
        <h5 class="card-title">Training Form</h5>
        <form id="signupForm" method="post" action="{{route('admin.training.update', $training)}}"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PATCH')
            <div class="position-relative row form-group">
                <label for="language" class="col-sm-2 col-form-label">Language</label>
                <div class="col-sm-10">
                    <select name="language" id="language" class="form-control">
                      <option value="en" {{$training->language == 'en' ? 'selected' : ''}}>English</option>
                      <option value="ps" {{$training->language == 'ps' ? 'selected' : ''}}>پښتو</option>
                      <option value="fa" {{$training->language == 'fa' ? 'selected' : ''}}>دری</option>
                    </select>
                    <span class="text-danger text-italic">{{$errors->first('language')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" id="title" placeholder="Women's day celebration" type="text" class="form-control" value="{{$training->title}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('title')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" id="description" class="form-control tiny" required>{{$training->description}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('description')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="excerpt" class="col-sm-2 col-form-label">Excerpt</label>
                <div class="col-sm-10">
                    <textarea name="excerpt" id="excerpt" class="form-control" required>{{$training->excerpt}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('excerpt')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="video" class="col-sm-2 col-form-label">Video Link</label>
                <div class="col-sm-10">
                    <input name="video" id="video" placeholder="Women's day celebration" type="text" class="form-control" value="{{$training->video}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('video')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="image" class="col-sm-2 col-form-label">image</label>
                <div class="col-sm-4">
                    <input name="image" id="image" type="file" class="form-control-file form-control">
                    <span class="text-danger text-italic">{{$errors->first('image')}}</span>
                    <small class="form-text text-muted">The width and height of the image must be taken into account.
                    </small>
                </div>
                <div class="col-sm-2 text-right">
                    <span class="d-inline-block mt-2 text-right">Current Image:</span>
                </div>
                <div class="col-sm-4">
                    <img src="{{asset('storage/images/training/' . $training->image)}}" alt="Gallery image"
                        class="mw-100 border" style="border-radius: 10px;">
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
