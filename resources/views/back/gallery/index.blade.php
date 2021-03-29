@extends('back.layout.app')
@section('title', 'Gallery | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa icon-gradient bg-arielle-smile"></i>
            </div>
            <div>Gallery
                <div class="page-title-subheading">You can manage the gallery in this page.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('admin.gallery.create')}}" type="button" class="btn-shadow btn btn-info" style="font-weight: bold;">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Add Image
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
  @forelse($gallery as $image)
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{$image->title_en}}</h5>
                <img class="card-img-bottom" src="{{asset('storage/images/gallery/' . $image->image)}}" alt="Gallery image">
            </div>
            <div class="d-block text-right card-footer">
                <form class="d-inline" action="{{route('admin.gallery.destroy', $image)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button data-type="question" type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this image?');">
                    <i class="fa fa-trash btn-icon-wrapper"> </i>
                </button>
                </form>

                <a href="{{route('admin.gallery.edit', $image)}}" type="button" class="btn btn-icon btn-icon-only btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                    <i class="fa fa-edit btn-icon-wrapper"> </i>
                </a>
            </div>
        </div>
    </div>
  @empty
    <h5 class="ml-3">No Image Added Yet</h5>
  @endforelse
</div>
@endsection
