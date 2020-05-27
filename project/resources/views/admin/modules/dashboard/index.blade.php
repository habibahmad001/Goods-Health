@extends('layout')

@section('content')

            <div class="row">
                <!-- Progress Table start -->
                <div class="col-lg-12 col-md-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Daily Traffic Statistics</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <form>
                                            <div class="form-group w-80 m-0">
                                                <select class="form-control form-control-sm">
                                                    <option>Month</option>
                                                    <option>Yesterday</option>
                                                    <option>Today</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-10">
                                <table class="table table-hover table-center">
                                    <thead>
                                    <tr>
                                        <td class="w-70">Avatar</td>
                                        <td class="w-30p">Name</td>
                                        <td>Order ID</td>
                                        <td>Sales</td>
                                        <td>Company</td>
                                        <td>Date Created</td>
                                        <td>Rating</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('images/author/author-img1.jpg') }}" alt="Image" class="img-responsive">
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="fw-600 ">Denis A. Short </div>
                                        </td>
                                        <td>547</td>
                                        <td>100$</td>
                                        <td>David Co.</td>
                                        <td>12-06-2019</td>
                                        <td class="fs-10 text-warning text-nowrap">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('images/author/author-img2.jpg') }}" alt="User" class="img-responsive">
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="fw-600 ">Barbara J.</div>
                                        </td>
                                        <td>6435</td>
                                        <td>8000$</td>
                                        <td>Market Co.</td>
                                        <td>21-09-2019</td>
                                        <td class="fs-10 text-warning text-nowrap">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('images/author/author-img3.jpg') }}" alt="User" class="img-responsive">
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="fw-600 ">Anthony E. Hurst</div>
                                        </td>
                                        <td>4765</td>
                                        <td>566$</td>
                                        <td>Querry Enterprise</td>
                                        <td>14-02-2019</td>
                                        <td class="fs-10 text-warning text-nowrap">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('images/author/author-img4.jpg') }}" alt="User" class="img-responsive">
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="fw-600 ">Wendy B. Franklin</div>
                                        </td>
                                        <td>6565</td>
                                        <td>900$</td>
                                        <td>Jhon &amp; Sons</td>
                                        <td>12-06-2019</td>
                                        <td class="fs-10 text-warning text-nowrap">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
@endsection