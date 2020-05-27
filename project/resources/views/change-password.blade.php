@extends('layout')

@section('content')


            
          <div class="row">
                <!-- Progress Table start -->
               <div class="col-lg-12 col-md-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <h2 style="margin-bottom: 25px;">Change Password</h2>
                            <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="curr_password" type="text" class="form-control @error('curr_password') is-invalid @enderror" name="curr_password" value="{{ old('curr_password') }}"  autocomplete="curr_password" autofocus>

                                @error('curr_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
       

@endsection