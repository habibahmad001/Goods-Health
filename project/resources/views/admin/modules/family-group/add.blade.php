@extends('layout')

@section('content')


            
          <div class="row">
            </div>
           
            <div class="wrap_con">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav_heading cf">
                                <a href="#"class="active">CREATE FAMILY GROUP </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <a href="{{ route('admin.users.show')}}" class="btn btn-success">Users List</a> -->
            @if(Session::has('success'))
            <div class="wrap_con">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav_heading cf">
                                <a href="#"class="active" style="color: green">{{ Session::get('success') }}  </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endif
            @if(Session::has('error'))
            <div class="wrap_con">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav_heading cf">
                                <a href="#"class="active" style="color: red">{{ Session::get('error') }}  </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="wrap_con">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="box_heading cf">
                                <h3>Add Individual Family Group</h3>
                                <!-- <h6><a href="#" class="update">Save</a></h6> -->
                            </div>
                        </div>
                    </div>
                        
                    <form method="POST" action="{{ route('customer.register.family_group') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info_con" id="pages">
                                <div class="in_field page" data-page="basic">
                                    <h3>Basic Info</h3>
                                        <div class="basic_info form-group row">
                                            <label for="spouse" class="col-sm col-form-label">* First Name</label>
                                            <div class=" input_f">
                                                <input type="text" class="in form-control-plaintext" id="spouse" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>
                                                @error('first_name')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <label for="suffix" class="col-sm col-form-label">Middle Initial</label>
                                            <div class=" input_f">
                                                <input type="text" class="in form-control-plaintext" id="suffix" name="middle_name" value="{{ old('middle_name') }}">
                                            </div>
                                            <label for="last_name" class="col-sm col-form-label">* Last Name</label>
                                            <div class=" input_f">
                                                <input type="text" class="in form-control-plaintext" id="last_name" name="last_name" value="{{ old('last_name') }}">
                                                @error('last_name')
                                                <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="basic_info form-group row">
                                            <label for="spouse" class=" col-form-label">Suffix</label>
                                            <div class="input_f">
                                                <input type="text" class="in form-control-plaintext" id="spouse" name="suffix" value="{{ old('suffix') }}">
                                            </div>
                                            <label for="suffix" class="sec-label col-form-label">Preferred Name </label>
                                            <div class="input_f">
                                                <input type="text" class="in form-control-plaintext" id="suffix" name="preferred_name" value="{{ old('preferred_name') }}">
                                            </div>

                                        </div>
                                    <div class="basic_info form-group row">
                                        <label for="spouse" class=" col-form-label">Gender</label>
                                        <div class=" input_f">
                                            <select id="inputState" class="in form-control " name="gender">
                                                <option value="">Select Gender</option>
                                                    <option value="0">MALE</option>
                                                    <option value="1">FEMALE</option>
                                                    <option value="2">OTHER</option>
                                            </select>
                                        </div>
                                        <label for="suffix" class="sec-label col-form-label">Birthdate </label>
                                        <div class="input_f">
                                            <input type="text" class="in form-control-plaintext" id="suffix" name="dob" value="{{ old('dob') }}">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 yo_photo">
                                            <label>Your Photo</label>
                                            <div class="upload_image">
                                                
                                                <div class="file_upload_wrap">
                                                    <label class="custom-file-upload">
                                                        Upload Photo
                                                        <input type="file" class="file_upload" name="image">
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="in_field page">
                                    <h3>Family Info</h3>
                                    <div class="basic_info form-group row">
                                        <label for="spouse" class="width-11 col-form-label">Spouse Name</label>
                                        <div class=" input_f">
                                            <input type="text" class="in form-control-plaintext" id="spouse" name="spouse_name" value="{{ old('spouse_name') }}">
                                        </div>
                                        <label for="suffix" class="col-form-label">Suffix </label>
                                        <div class=" input_f">
                                            <input type="text" class="in form-control-plaintext" id="suffix" name="spouse_suffix" value="{{ old('spouse_suffix') }}">
                                        </div>
                                        <label for="last_name" class="col-form-label">* Last Name</label>
                                        <div class="input_f">
                                            <input type="text" class="in form-control-plaintext" id="last_name" name="spouse_last_name" value="{{ old('spouse_last_name') }}" >
                                        </div>
                                    </div>
                                    <div class="basic_info form-group row">
                                        <label for="spouse" class="width-11 col-form-label">Birthdate</label>
                                        <div class="input_f">
                                            <input type="text" class="in form-control-plaintext" id="spouse" name="spouse_dob" value="{{ old('spouse_dob') }}">
                                        </div>
                                        <label for="suffix" class="width-19 col-form-label">Number of Children if any </label>
                                        <div class=" input_f">
                                            <select id="inputState" class="in form-control " name="number_of_children" >
                                                <option selected value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="in_field page">
                                    <h3>Benefit Info</h3>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input_f">
                                                <input type="text" class="in" name="benefit_info" value="{{ old('benefit_info') }}">
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="in_field page " data-page="contact">
                                    <h3>Contact Info</h3>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm col-form-label">Address</label>
                                        <div class="col-sm-11 input_f">
                                            <input type="text" class="in form-control-plaintext" id="address" name="address" value="{{ old('address') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm col-form-label">City</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" id="city" name="city" value="{{ old('city') }}">
                                        </div>
                                        <label for="state" class="col-sm col-form-label">State</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" id="state" name="state" value="{{ old('state') }}">
                                        </div>
                                        <label for="zipcode" class="col-sm col-form-label">Zip Code</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" id="zipcode" name="zipcode" value="{{ old('zipcode') }}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-sm idth-13 col-form-label">Country</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" name="country" value="{{ old('country') }}">
                                        </div>
                                        <label for="phone" class="col-sm col-form-label">Phone Number</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" name="contact_number" value="{{ old('contact_number') }}">
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="in_field page" data-page="security">
                                    <h3>Security Info</h3>
                                        <div class="form-group row">
                                            <label for="ssn" class="col-md-2 col-form-label">Social Security Number</label>
                                            <div class="col-md-4 input_f">
                                                <input type="text" class="in form-control-plaintext" id="ssn" name="social_security_number" value="{{ old('social_security_number') }}" >
                                            </div>
                                        </div>

                                </div>
                                <div class="in_field page" data-page="emergency">
                                    <h3>Emergency Contact</h3>
                                    <div class="basic_info form-group row">
                                        <label for="ssn" class="width-13 col-form-label">Phone Number</label>
                                        <div class=" input_f">
                                            <input type="text" class="in form-control-plaintext" id="ssn" name="emergency_contact_number" value="{{ old('emergency_contact_number') }}">
                                        </div>
                                        <label for="ssn" class="width-22 col-form-label">Family/Friend Phone Number</label>
                                        <div class="input_f">
                                            <input type="text" class="in form-control-plaintext" id="ssn" name="relative_emergency_number" value="{{ old('relative_emergency_number') }}">
                                        </div>
                                    </div>
                                    <div class="basic_info form-group row">
                                        <label for="suffix" class="width-13 col-form-label"> Relation: </label>
                                        <div class=" input_f">
                                            <select id="inputState" class="in form-control " name="relation" >
                                                <option selected value="0">Friends</option>
                                                <option value="1">Family</option>
                                            </select>
                                        </div>
                                        <label for="spouse" class="text-right width-22 col-form-label">Email</label>
                                        <div class=" input_f">
                                            <input type="text" class="in form-control-plaintext" id="spouse" name="emergency_relative_email" value="{{old('emergency_relative_email') }}">
                                        </div>

                                    </div>

                                </div>
                                <div class="in_field page" data-page="employment">
                                    <h3>Employment Info</h3>
                                    <div class="emp_info form-group row">
                                        <label for="city" class="width-15 col-form-label">Employment Status</label>
                                        <div class="width-19 input_f">
                                            <input type="text" class="in form-control-plaintext" id="city" vname="employment_status" value="{{ old('employment_status') }}" >
                                        </div>
                                        <label for="state" class="text-center width-13 col-form-label"> Occupation </label>
                                        <div class="width-19 input_f">
                                            <input type="text" class="in form-control-plaintext" id="state" name="occupation" value="{{ old('occupation') }}" >
                                        </div>
                                        <label for="zipcode" class="text-right width-11 col-form-label">Type </label>
                                        <div class="width-19 input_f" name="employment_type">
                                            <select id="inputState" class="in form-control ">
                                                <option selected value="0">Private</option>
                                                <option value="1">Government</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="emp_info form-group row">
                                        <label for="city" class="col-form-label">Company Name / Business Name</label>
                                        <div class="company input_f">
                                            <input type="text" class="in form-control-plaintext" id="city" name="company_name" value="{{ old('company_name') }}">
                                        </div>
                                        <label for="state" class=" col-form-label"> Employment ID </label>
                                        <div class="input_f">
                                            <input type="text" class="in form-control-plaintext" id="state" name="employment_id" value="{{ old('employment_id') }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="in_field page" data-page="location">
                                    <h3>Documents </h3>
                                    <div class="form-group row">
                                        <label for="city" class="col-md-1 col-form-label">Document</label>
                                        <div class="col-sm-3 input_f">
                                            <select id="inputState" class="text-center in form-control " name="document_type" >
                                                <option selected value="Passport">Passport</option>
                                                <option value="Driving License">Driving License</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3 yo_photo document">
                                            <div class="upload_image">
                                                <div class="file_upload_wrap">
                                                    <label class="custom-file-upload">
                                                        Upload Document
                                                        <input type="file" class="file_upload" name="document_name">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label ">
                                           

                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="city" class="col-md-1 col-form-label">Document</label>
                                        <div class="col-sm-3 input_f">
                                            <select id="inputState" class="text-center in form-control ">
                                                <option selected>Driving License</option>
                                                <option >Passport</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3 yo_photo document">
                                            <div class="upload_image">
                                                <div class="file_upload_wrap">
                                                    <label class="custom-file-upload">
                                                        Upload Document
                                                        <input type="file" class="file_upload">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label ">
                                            <a href="#">Remove</a> </label>

                                    </div> -->
                                </div>
                                <div class="in_field page" data-page="assigned">
                                    <h3>Assigned Benefits Vendor</h3>
                                    <div class="form-group row">
                                        <label for="city" class="col-form-label">---</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" id="city" name="assigned_benefit_vendors" value="{{ old('assigned_benefit_vendors') }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="in_field page benefit_vendors" data-page="benefit_vendors">
                                    <h3>Benefits Vendor</h3>
                                    <div class="form-group row">
                                        <label for="city" class=" col-form-label">-----</label>
                                        <div class="col-sm-3 input_f">
                                            <input type="text" class="in form-control-plaintext" id="city" name="benfits_vendor" value="{{ old('benfits_vendor') }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            {{ __('Reset') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- Textual inputs -->
            </div>
       

@endsection