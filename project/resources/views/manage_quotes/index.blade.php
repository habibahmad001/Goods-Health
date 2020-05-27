@extends('layout.layout')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Manage Quote Title</th>
              <th scope="col">Manage Quote Description</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ManageQuote as $ManageQuoteDetail)
            <tr>
              <th scope="row">{{$ManageQuoteDetail->id}}</th>
              <td><a href="tasks/{{$ManageQuoteDetail->id}}">{{$ManageQuoteDetail->title}}</a></td>
              <td>{{$ManageQuoteDetail->description}}</td>
              <td>{{$ManageQuoteDetail->created_at->toFormattedDateString()}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('tasks/' . $ManageQuoteDetail->id . '/edit') }}">
                  	<button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;
                  <form action="{{url('tasks', [$ManageQuoteDetail->id])}}" method="POST">
    					<input type="hidden" name="_method" value="DELETE">
   						<input type="hidden" name="_token" value="{{ csrf_token() }}">
   						<input type="submit" class="btn btn-danger" value="Delete"/>
   				  </form>
              </div>
			</td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection