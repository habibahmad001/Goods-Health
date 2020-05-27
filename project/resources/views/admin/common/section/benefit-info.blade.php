<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary">Benefit Info</h4>
        <div class="pull-right pull-left-mob">
            <!-- <button data-toggle="collapse" href="#benefitinfo_profile" role="button" aria-expanded="true" aria-controls="benefitinfo_profile">
                <i class="fa fa-sort-down"></i>
            </button> -->
        </div>
    </div>

    <div class="profile_card">
        <div  class="form-group-no-border box_shadow">
            <div class="wrap_con box_shadow" >
                <div class="full_wrap">
                    <div class="row no-margin">

                        <div class="col-sm-12 profile_card ">
                            <div class="row profile_title py-2">
                                <h4  class="text-primary pl-lg-2">Benefit</h4>
                                <div class="pull-right pull-right-mob">
                                    <a class="btn btn-submit" href="#">
                                        Add Benefits
                                    </a>
                                </div>
                            </div>
                            <div class="row form-group-no-border">
                                @if(!$policies->isEmpty())
                                <div class="col-md-2 px-0 py-0 border-right ">
                                    @php $pc_array = []; @endphp
                                    @foreach($policies as $list)
                                        @if(!in_array($list->category_name, $pc_array))
                                        @php array_push($pc_array, $list->category_name); @endphp
                                        <div class="text-center border-bottom py-4"><img class="benefit_img px-2 pb-3" src="{{ asset('images').'/'.strtolower($list->category_name).'.png' }}"/> <h5 class="text-primary">{{ $list->category_name }}</h5></div>
                                        @endif
                                    @endforeach()
                                </div>

                                <div class="col-md-10 px-0 ">
                                    <div class="row profile_title no-border  pb-2  px-2">
                                        <h6  class="text-primary">Current</h6>
                                        <div class="pull-right pull-right-mob">
                                            <button data-toggle="collapse" href="#current_policies" role="button" aria-expanded="true" aria-controls="current_policies">
                                                <i class="fa fa-minus mt-m-15 text-red bold"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="current_policies">
                                        @foreach($policies as $list_key => $list)
                                        @if($list->status == 1)
                                        <div class="bg-sky  px-2 pb-3">
                                            <div class="row profile_title py-2 px-0">
                                                <h6  class="text-primary">{{ $list->carrier_name }}</h6>
                                                <h6  class="text-primary pl-4">Silver Full PPO 1700/40      </h6>
                                                <h6 class="text-primary pl-4">Active</h6>
                                                <div class="pull-right pull-left-mob">
                                                <button data-toggle="collapse" href="#agent_show" role="button" aria-expanded="true" aria-controls="agent_show">
                                                    <i class="fa fa-eye mt-m-15 text-primary"></i>
                                                </button>
                                            </div>

                                            </div>
                                            <div class="row profile_title py-2 no-border px-0">
                                                <p class="text-primary  font-size-10">PLAN 1 </p>
                                                <p class="text-primary  pl-3 font-size-10">FL </p>
                                                <p class="text-primary  pl-3 font-size-10"><a class="btn btn-red">Pro</a> </p>
                                                <p class="text-primary  pl-3 font-size-10">POLICY NUMBER {{ $list->policy_number}}</p>
                                                <p class="text-primary pl-3  font-size-10"> GROUP ID # N/A</p>
                                                <p class="text-primary pl-3  font-size-10"> EFFECTIVE DATE {{ $list->created_at}}</p>
                                                <p class="text-primary pl-3  font-size-10"> RENEWAL DATE 05-30-2020</p>
                                                <p class="text-primary pl-3  font-size-10">  EXCHANGE NO.</p>

                                            </div>
                                            <div class="row profile_title py-2 no-border px-0">
                                                <p class="text-primary  font-size-10">MONTHLY PREMIUM </p>
                                                <p class="text-primary  pl-4 font-size-10">N/A </p>
                                                <p class="text-primary  pl-4 font-size-10">DEDUCTIBLE </p>
                                                <p class="text-primary  pl-4 font-size-10">OUT OF POCKET MAX N/A</p>
                                                <p class="text-primary pl-4  font-size-10"> Documents</p>
                                                <p class="text-primary pl-4  font-size-10"> Business Directory  </p>
                                                <p class="text-primary pl-4  font-size-10"> Center Portal</p>
                                                <p class="text-primary pl-4  font-size-10">  Notes</p>


                                            </div>
                                            <div class="row profile_title no-border py-1 px-0">
                                                <p class="text-primary  font-size-12 mb-0">Note: </p>

                                            </div>
                                            <div class="row profile_title no-border px-0 py-0">

                                                <p class="text-primary font-size-12">External Note </p>

                                            </div>
                                        </div>
                                        @endif
                                        @endforeach()
                                    </div>
                                    <hr>
                                    <div class="row profile_title no-border  pb-lg-5  px-2">
                                        <h6  class="text-primary">Past</h6>
                                        <div class="pull-right pull-right-mob">
                                            <button data-toggle="collapse" href="#past_policies" role="button" aria-expanded="true" aria-controls="agent_show">
                                                <i class="fa fa-plus mt-m-10 text-red bold"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="past_policies">
                                        @foreach($policies as $list_key => $list)
                                        @if($list->status == 0)
                                        <div class="bg-sky  px-2 pb-3">
                                            <div class="row profile_title py-2 px-0">
                                                <h6  class="text-primary">{{ $list->carrier_name }}</h6>
                                                <h6  class="text-primary pl-4">Silver Full PPO 1700/40      </h6>
                                                <h6 class="text-primary pl-4">Active</h6>
                                                <div class="pull-right pull-left-mob">
                                                <button data-toggle="collapse" href="#agent_show" role="button" aria-expanded="true" aria-controls="agent_show">
                                                    <i class="fa fa-eye mt-m-15 text-primary"></i>
                                                </button>
                                            </div>

                                            </div>
                                            <div class="row profile_title py-2 no-border px-0">
                                                <p class="text-primary  font-size-10">PLAN 1 </p>
                                                <p class="text-primary  pl-3 font-size-10">FL </p>
                                                <p class="text-primary  pl-3 font-size-10"><a class="btn btn-red">Pro</a> </p>
                                                <p class="text-primary  pl-3 font-size-10">POLICY MEMBER 00034567</p>
                                                <p class="text-primary pl-3  font-size-10"> GROUP ID # N/A</p>
                                                <p class="text-primary pl-3  font-size-10"> EFFECTIVE DATE 05-30-2019   </p>
                                                <p class="text-primary pl-3  font-size-10"> RENEWAL DATE 05-30-2020</p>
                                                <p class="text-primary pl-3  font-size-10">  EXCHANGE NO.</p>

                                            </div>
                                            <div class="row profile_title py-2 no-border px-0">
                                                <p class="text-primary  font-size-10">MONTHLY PREMIUM </p>
                                                <p class="text-primary  pl-4 font-size-10">N/A </p>
                                                <p class="text-primary  pl-4 font-size-10">DEDUCTIBLE </p>
                                                <p class="text-primary  pl-4 font-size-10">OUT OF POCKET MAX N/A</p>
                                                <p class="text-primary pl-4  font-size-10"> Documents</p>
                                                <p class="text-primary pl-4  font-size-10"> Business Directory  </p>
                                                <p class="text-primary pl-4  font-size-10"> Center Portal</p>
                                                <p class="text-primary pl-4  font-size-10">  Notes</p>


                                            </div>
                                            <div class="row profile_title no-border py-1 px-0">
                                                <p class="text-primary  font-size-12 mb-0">Note: </p>

                                            </div>
                                            <div class="row profile_title no-border px-0 py-0">

                                                <p class="text-primary font-size-12">External Note </p>

                                            </div>
                                        </div>
                                        @endif
                                        @endforeach()
                                    </div>
                                </div>
                                @else
                                    <div class="col-md-12">
                                        <h4 class="text-primary font-size-14 profile_title py-3">No benefits found! </h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

