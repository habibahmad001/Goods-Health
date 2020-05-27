@extends('layout')

@section('content')

<div class="row">
                 <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                        <h3 class="">FAST ACCESS</h3>
                        <br>
                        <div class="">
                            <h4 class="card_title">ACCOUNTS</h4>
                                <div class="col-md-12 col-lg-12 mt-mob-4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card-icon text-center">
                                                <div class="card-body">
                                                   <img src="{{ asset('images/Goodinsured.png') }}">
                                                    <p>Goodinsured.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-mob-4">
                                            <div class=" card-icon text-center">
                                                <div class="card-body">
                                                    <img src="{{ asset('images/Healthshop.png') }}">
                                                    <p>Healthshop.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-mob-4">
                                            <div class=" card-icon text-center">
                                                <div class="card-body">
                                                    <img src="{{ asset('images/Business-Account.png') }}">
                                                    <p>Business Account</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-mob-4">
                                            <div class="card-icon text-center">
                                                <div class="card-body">
                                                    <img src="{{ asset('images/Broker-Account.png') }}">
                                                    <p>Broker Account</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>
                        <hr>
                            <h4 class="card_title">MY POLICIES</h4>
                                <div class="col-md-12 col-lg-12 mt-mob-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card-icon text-center">
                                                <div class="card-body">
                                                   <img src="{{ asset('images/auto.png') }}">
                                                    <p>Auto</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-mob-4">
                                            <div class=" card-icon text-center">
                                                <div class="card-body">
                                                    <img src="{{ asset('images/mobile_home.png') }}">
                                                    <p>Mobile Home</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-mob-4">
                                            <div class=" card-icon text-center">
                                                <div class="card-body">
                                                    <img src="{{ asset('images/boat.png') }}">
                                                    <p>Boat</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         <hr>
                            <h4 class="card_title">BOOKMARKS</h4>
                               <div class="col-lg-12 stretched_card">
                                <div class="card_bookmark">
                                    <div class="card-body">
                                        <ul class="list-group bookmark">
                                            <li class="list-group-item"><a href="#">Statefarm.com</a></li>
                                            <li class="list-group-item"><a href="#">Amex.com</a></li>
                                            <li class="list-group-item"><a href="#">AIG.com</a></li>
                                            <li class="list-group-item"><a href="#"> Add Site</a> </li>
                                       </ul>
                                    </div>
                                </div>
                              </div>
                         <hr>
                            <h4 class="card_title">FILES</h4>
                                <div class="col-lg-6 mt-4 ">
                                    <div class="card_bookmark">
                                        <div class="card-body">
                                            <ul class="list-group bookmark">
                                                <li class="list-group-item ">
                                                    <img src="{{ asset('images/presentation.png') }}">presentation.ppt
                                                </li>
                                                <li class="list-group-item ">
                                                    <img src="{{ asset('images/word.png') }}">profiledocument.ppt
                                                </li>
                                                <li class="list-group-item ">
                                                    <img src="{{ asset('images/pdf.png') }}">policy.pdf
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
@endsection