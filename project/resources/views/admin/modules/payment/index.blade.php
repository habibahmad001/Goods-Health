@extends('layout')

@section('content')
<div class="row">
                <!-- Progress Table start -->
               <div class="col-lg-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                         <div class="row">
                          <div class="col-lg-6">
                          <h4 class="card_title">BILLING STATEMENT</h4>
                          </div>
                          <div class="col-lg-6 text-right">
                          <button type="button" class="btn btn-primary btn-md mb-3 mr-4 tabcomplete">EDIT</button>
                          <button type="button" class="btn btn-primary btn-md mb-3 mr-4 tabcomplete_gray ">CANCEL</button></div>
                          </div>
                            <div class="d-md-flex vertical_tabs">
                                <div class="nav flex-column nav-pills mr-mob-0 mr-4 mb-3 mb-sm-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><img src="{{ asset('images/auto.png') }}"> AUTO</a>
                                    <hr>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><img src="{{ asset('images/boat.png') }}"> BOAT</a>
                                    <hr>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><img src="{{ asset('images/mobile_home.png') }}"> MOBILE HOME</a>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="col-lg-12">
                    <div class="card">
                     
                        <div class="card-body">

                            <h4 class="card_title">ACCOUNT INFORMATION</h4>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-lg-2 col-form-label">Policy Holder</label>
                                <div class="col-lg-10">
                                <input class="form-control bg-sky" type="email" value="name@example.com" id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-lg-2 col-form-label">Policy Number</label>
                                <div class="col-lg-10">
                                <input class="form-control bg-sky" type="email" value="name@example.com" id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-lg-2 col-form-label">Policy Period</label>
                                <div class="col-lg-10">
                                <input class="form-control bg-sky" type="tel" value="+880-1233456789" id="example-tel-input">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="example-tel-input" class="col-lg-2 col-form-label">Total Premium</label>
                                <div class="col-lg-10">
                                <input class="form-control bg-sky" type="tel" value="+880-1233456789" id="example-tel-input">
                                </div>
                            </div>
                            <hr>
                            <h4 class="card_title">PAYMENT PLAN</h4>
                            <div class="custom-control custom-radio primary-radio custom-control-inline">
                                    <input type="radio" checked="" id="customRadio4" name="customRadio2" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">Monthly</label>
                                </div>
                                <div class="custom-control custom-radio primary-radio custom-control-inline">
                                    <input type="radio" id="customRadio5" name="customRadio2" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5">Quarter</label>
                                </div>
                                <div class="custom-control custom-radio primary-radio custom-control-inline">
                                    <input type="radio" checked="" disabled="" id="customRadio6" name="customRadio3" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio6">Annual</label>
                                </div>

                            <hr>
                             <h4 class="card_title">PAYMENT METHOD</h4>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-2 col-form-label ">Card Name</label>
                                <div class="col-lg-10">
                                <input class="form-control bg-sky" type="text" value="Carlos Rath" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-2 col-form-label ">Card Number</label>
                                <div class="col-lg-10">
                                <input class="form-control bg-sky" type="text" value="Carlos Rath" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-2 col-form-label ">Expiry Date</label>
                                <div class="col-lg-4">
                                <input class="form-control bg-sky" type="text" value="Carlos Rath" id="example-text-input">
                                </div>
                                <label for="example-text-input" class="col-lg-2 col-form-label ">Security Code (”CVC” or CVV”)</label>
                                <div class="col-lg-4">
                                <input class="form-control bg-sky" type="text" value="Carlos Rath" id="example-text-input">
                                </div>
                                <label for="example-datetime-local-input" class="col-lg-2 col-form-label">Country</label>
                                <div class="col-lg-4">
                                    <input class="form-control bg-sky" type="datetime-local" value="2018-07-19T15:30:00" id="example-datetime-local-input">
                                </div>
                                <label for="example-text-input" class="col-lg-2 col-form-label ">Postal Code</label>
                                <div class="col-lg-4">
                                <input class="form-control bg-sky" type="text" value="Carlos Rath" id="example-text-input">
                                </div>
                                <div class="col-lg-12" style="margin-top:5%">
                                <p>By saving a credit card, you agree to our Terms of Service, and if you use to pay for a plan, you authorize your credit card to be changed on a recurring basis until you cancel, which you can do at anytime. You understand how your payment works and how to cancel.</p>
                                </div>

                            </div>
                             <hr>
                                 <h4 class="card_title">PAYMENT HISTORY</h4>
                                  <div class="row">
                                    <div class="col-lg-12 stretched_card">
                                            <div class="card-body">
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase">
                                                                <tr>
                                                                    <th scope="col">Transacton No.</th>
                                                                    <th scope="col">Date Paid</th>
                                                                    <th scope="col">Date Posted </th>
                                                                    <th scope="col">Amount</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">000000000033999</th>
                                                                    <td>05/25/2010 8:00 PM</td>
                                                                    <td>05/25/2010 9:00 PM</td>
                                                                    <td>$ 100.00</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">000000000033999</th>
                                                                    <td>04/25/2010 8:00 PM</td>
                                                                    <td>04/25/2010 9:00 PM</td>
                                                                    <td>$ 100.00</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">000000000033999</th>
                                                                    <td>03/25/2010 8:00 PM</td>
                                                                    <td>03/25/2010 9:00 PM</td>
                                                                    <td>$ 100.00</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">000000000033999</th>
                                                                    <td>02/25/2010 8:00 PM</td>
                                                                    <td>02/25/2010 9:00 PM</td>
                                                                    <td>$ 100.00</td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="button" class="btn btn-primary btn-md mb-3 mr-4 tabcomplete">SAVE</button>
                                <button type="button" class="btn btn-primary btn-md mb-3 mr-4 tabcomplete_gray ">CANCEL</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                       <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat blanditiis eaque ab qui accusamus laudantium perspiciatis sint quibusdam at eius consequatur quos possimus aspernatur debitis deleniti sed odit provident repudiandae suscipit officiis, tempora voluptas, excepturi perferendis. Quasi delectus tempora temporibus ipsa soluta mollitia, doloremque corrupti labore, quae voluptatem obcaecati consequuntur ad ipsum fugit impedit cum. Facere, ea? Eveniet quisquam ratione voluptate rerum tempora, consectetur assumenda. Porro temporibus suscipit corporis nulla?</p>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat blanditiis eaque ab qui accusamus laudantium perspiciatis sint quibusdam at eius consequatur quos possimus aspernatur debitis deleniti sed odit provident repudiandae suscipit officiis, tempora voluptas, excepturi perferendis. Quasi delectus tempora temporibus ipsa soluta mollitia, doloremque corrupti labore, quae voluptatem obcaecati consequuntur ad ipsum fugit impedit cum. Facere, ea? Eveniet quisquam ratione voluptate rerum tempora, consectetur assumenda. Porro temporibus suscipit corporis nulla?</p>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat blanditiis eaque ab qui accusamus laudantium perspiciatis sint quibusdam at eius consequatur quos possimus aspernatur debitis deleniti sed odit provident repudiandae suscipit officiis, tempora voluptas, excepturi perferendis. Quasi delectus tempora temporibus ipsa soluta mollitia, doloremque corrupti labore, quae voluptatem obcaecati consequuntur ad ipsum fugit impedit cum. Facere, ea? Eveniet quisquam ratione voluptate rerum tempora, consectetur assumenda. Porro temporibus suscipit corporis nulla?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
@endsection