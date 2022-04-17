@extends('layouts.backendmaster');

@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Contact Message List</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('contact/us/message') }}">Contact Message</a></li>
                  <li>Contact Message List</li>
              </ol>
          </div>
      </div>

      <div class="col-md-12">
        <div class="panel pannel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View All Message</h2>
            @if(session('delete_message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Good! </strong> {{ session('delete_message') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
            @endif
          </div>
          <div class="panel-body">
            <table class="table table-bordered" id="example3">
             <thead>
               <tr>
                 {{-- <th scope="col">SL.</th> --}}
                 <th scope="col">First Name</th>
                 <th scope="col">Last Name </th>
                 <th scope="col">Email</th>
                 <th scope="col"> Phone </th>
                 <th scope="col"> Subject </th>
                 <th scope="col"> Message </th>
                 <th scope="col">Created_at</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($contact_msg as $key => $contact)
                 <tr>
                   {{-- <td> {{ $contact_msg->firstItem()+$key }}</td> --}}
                    <td>{{ $contact->fname }}</td>

                   <td>{{ $contact->lname }}</td>
                   <td>{{ $contact->email }}</td>
                   <td>{{ $contact->phone }}</td>
                   <td>{{ $contact->subject }}</td>
                   <td>
                     <textarea name="name" rows="4" cols="20">
                       {{ $contact->message }}
                     </textarea>
                   </td>

                   <td>{{ $contact->created_at->diffForHumans() }}</td>
                   <td>
                     <a href="{{ url('contact/msg/delete') }}/{{ $contact->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this message')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="10">No Message Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $contact_msg->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
