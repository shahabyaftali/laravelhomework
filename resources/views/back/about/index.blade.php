@extends('back.layout.app')
@section('title', 'About Page | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-file icon-gradient bg-happy-itmeo"></i>
            </div>
            <div>Edit About Page Content
                <div class="page-title-subheading">Fill the following form to edit the about page content.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">About Form</h5>
        <form id="signupForm" method="post" action="{{route('admin.about.update', $about)}}" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
        @method('PATCH')
            <div class="position-relative row form-group">
                <label for="title_en" class="col-sm-2 col-form-label">English Title</label>
                <div class="col-sm-10">
                    <input name="title_en" id="title_en" placeholder="About AWJU" type="text" class="form-control" value="{{$about->title_en}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('title_en')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="description_en" class="col-sm-2 col-form-label">English Description</label>
                <div class="col-sm-10">
                    <textarea name="description_en" id="description_en" class="form-control tiny" required>{{$about->description_en}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('description_en')}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="position-relative row form-group">
                <label for="title_pa" class="col-sm-2 col-form-label">Pashto Title</label>
                <div class="col-sm-10">
                    <input name="title_pa" id="title_pa" placeholder="زموږ په اړه" type="text" class="form-control" value="{{$about->title_pa}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('title_pa')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="description_pa" class="col-sm-2 col-form-label">Pashto Description</label>
                <div class="col-sm-10">
                    <textarea name="description_pa" id="description_pa" class="form-control tiny" required>{{$about->description_pa}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('description_pa')}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="position-relative row form-group">
                <label for="title_fa" class="col-sm-2 col-form-label">Dari Title</label>
                <div class="col-sm-10">
                    <input name="title_fa" id="title_fa" placeholder="در باره ما" type="text" class="form-control" value="{{$about->title_fa}}" required maxlength="191">
                    <span class="text-danger text-italic">{{$errors->first('title_fa')}}</span>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="description_fa" class="col-sm-2 col-form-label">Dari Description</label>
                <div class="col-sm-10">
                    <textarea name="description_fa" id="description_fa" class="form-control tiny" required>{{$about->description_fa}}</textarea>
                    <span class="text-danger text-italic">{{$errors->first('description_fa')}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="position-relative row form-group">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
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
                  <img src="{{asset('storage/images/about/' . $about->image)}}" alt="About Image" class="mw-100" style="border-radius: 10px;">
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