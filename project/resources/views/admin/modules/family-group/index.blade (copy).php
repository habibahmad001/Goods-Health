@extends('layout')

@section('content')

    <div class="alert alert-success alert-shadow gi-alert-success">
        <strong>Success!</strong>
    </div>
    <div class="alert alert-danger alert-shadow gi-alert-error">
        <strong>Success!</strong>
    </div>
    
    @if(Session::has('success'))
        @include('admin.common.notification.success')          
    @endif

    @if(Session::has('error'))
        @include('admin.common.notification.error')
    @endif

    @include('admin.modules.family-group.list')

@endsection

@section('extra-js')
    @include('admin.common.js.user-center')
@endsection


@extends('layout')

@section('content')


            
          <div class="row">
            <div class="wrap_con">
                    <div class="full_wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="box_heading cf">
                                    <h3>Search</h3>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="info_con" id="pages">
                                        <div class="in_field page" data-page="basic">
                                            <div class="basic_info form-group row">
                                                <label for="spouse" class="col-sm col-form-label">Customer Name</label>
                                                <div class="col-sm-4 input_f">
                                                    <input type="text" class="in form-control-plaintext" id="spouse" value="">
                                                </div>
                                                <label for="suffix" class="col-sm col-form-label">Insured Number</label>
                                                <div class="col-sm-4 input_f">
                                                    <input type="text" class="in form-control-plaintext" id="suffix" value="">
                                                </div>
                                            </div>
                                            <div class="label-padding-left-15 form-group row">
                                                <label for="spouse" class="width-13 col-form-label">Policy Number</label>
                                                <div class="width-20 input_f">
                                                    <input type="text" class="in form-control-plaintext" id="spouse" value="">
                                                </div>
                                                <label for="suffix" class="width-13 sec-label col-form-label">Effective From </label>
                                                <div class="width-20 input_f">
                                                    <div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input type="text" id="startDate" class="datepicker in form-control-plaintext form-control" value="" data-type="datepicker" data-guid="ab651575-e330-5573-3c73-889d454d6421" data-datepicker="true" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button></span></div>
                                                </div>
                                                <label for="suffix" class="width-13 sec-label col-form-label">Effective To </label>
                                                <div class="width-20 input_f">
                                                    <div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input type="text" id="endDate" class="datepicker in form-control-plaintext form-control" value="" data-type="datepicker" data-guid="50d13d8f-2c57-18e9-2eac-dc1ee28acd86" data-datepicker="true" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button></span></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Progress Table start -->
               <div class="col-lg-12 col-md-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Manage Family/Group</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <form>

                                          
                                            <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business"> <i class="fa fa-arrow-up"></i>Upload</button>
                                            <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business"> <i class="fa fa-arrow-down"></i>EXPORT</button>
                                            <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business"> <i class="fa fa-plus-circle"></i> <a href="{{ route('customer.register.family_group')}}">Add</a> </button>
                                            <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business"> <i class="fa fa-pencil"></i> <a href="" id="editUser">Edit</a></button>
                                            <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business"> <i class="fa fa-minus-circle"></i> <a href="" id="deleteUser" onclick="event.preventDefault();
                                                     document.getElementById('delete-user').submit();">Delete</a></button>
                                                <form id="delete-user" action="" method="POST" >
                                                    @csrf
                                                </form>
                                            
                                            <button type="button" class="btn btn-list btn-primary btn-md mb-3 tabcomplete cus_book_business"> <i class="fa fa-list"></i> </button>
                                            <button type="button" class="btn-white btn-th btn btn-md mb-3 tabcomplete"> <i class="fa fa-th-large"></i></button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-10">
                                <table class="table table-hover table-center">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>UserName</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Job</th>
                                        <th>Employment Type</th>
                                        <th>Department</th>
                                        
                                        
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($users as $user)
                                    <tr>
                                        <td><input type="radio" name="selectedradio" value="{{ $user->id }}"></td>
                                        <td>{{ $user->id}}</td>
                                        <td>{{ $user->username}}</td>
                                        <td>{{  $user->first_name }}</td>
                                        <td>{{  $user->last_name }}</td>
                                        <td>{{  $user->designation }}</td>
                                        <td>{{  $user->employment_type }}</td>
                                        <td>{{  $user->department }}</td>
                                       
                                        
                                        <td>{{  $user->state }}</td>
                                       
                                        <td>{{  $user->email }}</td>
                                        <td>{{  $user->phone_number }}</td>
                                        
                                        
                                       
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
       

@endsection