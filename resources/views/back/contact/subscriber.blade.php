@extends('back.layout.app')
@section('title', 'subscribers | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-inbox icon-gradient bg-premium-dark"></i>
            </div>
            <div>Manage subscribers
                <div class="page-title-subheading">You can manage recieved messages here and subscribers here.</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Inbox</h5>
                <table class="mb-0 table table-hover">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{$subscriber->email}}</td>
                            <td>{{$subscriber->created_at}}</td>
                            <td>
                              <a href="mailto:{{$subscriber->email}}" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary">Reply</a>

                              <form action="{{route('admin.subscriber.destroy', $subscriber)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-danger" onclick="return confirm('Are You Sure')">
                              </form> 
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
