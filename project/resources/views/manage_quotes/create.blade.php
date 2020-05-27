@extends('layout.layout')

@section('content')
    <h1>Add New Quote</h1>
    <hr>
     <form action="store" method="post">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Quote Title</label>
        <input type="text" class="form-control" id="taskTitle"  name="title">
      </div>
      <div class="form-group">
        <label for="description">Quote Description</label>
        <input type="text" class="form-control" id="taskDescription" name="description">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection