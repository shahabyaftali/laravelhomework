@extends('back.layout.app')
@section('title', 'Contacts | AWJU Admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-inbox icon-gradient bg-premium-dark"></i>
            </div>
            <div>Manage Contacts
                <div class="page-title-subheading">You can manage recieved messages here and contacts here.</div>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->message}}</td>
                            <td>{{$contact->created_at}}</td>
                            <td>
                              <a href="mailto:{{$contact->email}}" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary">Reply</a>

                              <form action="{{route('admin.contact.destroy', $contact)}}" method="post" class="d-inline">
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
