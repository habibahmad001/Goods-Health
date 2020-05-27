                        <div class="wrap_con box_shadow">
                            <div class="full_wrap">
                                <div class="row no-margin">
                                    <div class="col-sm-12 profile_card">
                                        <div class="row profile_title">
                                            <h4  class="text-primary">Customer Benefits</h4>
                                            <div class="pull-right pull-left-mob">
                                                <a data-toggle="collapse" href=".clps-customer-benefits" role="button" aria-expanded="true" aria-controls="customer_benefits">
                                                    <i class="fa fa-sort-down"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row form-group-no-border  collapse show clps-customer-benefits" id="customer_benefits">

                                            <div class="row provider_profile_edit">
                                                <div class="col-md-12 info_con profile_info_con">
                                                    <div class="form-group row in_field  pb-0">
                                                        <label for="benefit" class="col-sm-1 col-form-label">Benefit</label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="benefit_type" value="{{ !empty($userdata->benefit) ? $userdata->benefit : '' }}">
                                                        </div>
                                                        <label for="insurance" class="col-sm-1 col-form-label">Insurance </label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="insurer" value="{{ !empty($userdata->insurer) ? $userdata->insurer : '' }}">
                                                        </div>
                                                        <label for="policy_number" class="col-sm-1 col-form-label">Policy No</label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="policy_number" value="{{ !empty($userdata->policy_number) ? $userdata->policy_number : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($beneficiaries[0]))
                                                @foreach($beneficiaries as $list)
                                                <div class="col-md-12 info_con profile_info_con">
                                                    <div class="form-group row in_field  pb-0">
                                                        <input type="hidden" name="benefeciaries_id[]" value="{{$list->id}}">
                                                        <label for="beneficiaries" class="col-sm-1 col-form-label">Beneficiaries</label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="beneficiaries[]" value="{{ $list->beneficiary_name }}">
                                                        </div>
                                                        <label for="city" class="col-sm-1 col-form-label">Name</label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="beneficiary_name[]" value="{{ $list->beneficiary_name }}">
                                                        </div>
                                                        <label for="city" class="col-sm-1 col-form-label">Relationship</label>
                                                        <div class="col-sm-3  input_f">
                                                            <select id="city" class="in form-control" name="beneficiary_relation[]">
                                                                <option value="">Select Status</option>
                                                                <option value="1" {{ $list->beneficiary_relation == 1 ? 'selected' : ''}}>Father</option>
                                                                <option value="2" {{ $list->beneficiary_relation == 2 ? 'selected' : ''}}>Mother</option>
                                                                <option value="3" {{ $list->beneficiary_relation == 3 ? 'selected' : ''}}>Brother</option>
                                                                <option value="4" {{ $list->beneficiary_relation == 4 ? 'selected' : ''}}>Sister</option>
                                                                <option value="5" {{ $list->beneficiary_relation == 5 ? 'selected' : ''}}>Spouse</option>
                                                                <option value="6" {{ $list->beneficiary_relation == 6 ? 'selected' : ''}}>Others</option>
                                                            </select>
                                                        </div>
                                                        <label>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="col-md-12 info_con profile_info_con">
                                                    <div class="form-group row in_field  pb-0">
                                                        <label for="beneficiaries" class="col-sm-1 col-form-label">Beneficiaries</label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="beneficiaries[]" value="">
                                                        </div>
                                                        <label for="city" class="col-sm-1 col-form-label">Name</label>
                                                        <div class="col-sm-3  input_f">
                                                            <input type="text" class="in form-control-plaintext" name="beneficiary_name[]" value="">
                                                        </div>
                                                        <label for="city" class="col-sm-1 col-form-label">Relationship</label>
                                                        <div class="col-sm-3  input_f">
                                                            <select id="city" class="in form-control" name="beneficiary_relation[]">
                                                                <option value="" selected>Select Status</option>
                                                                <option value="1">Father</option>
                                                                <option value="2">Mother</option>
                                                                <option value="3">Brother</option>
                                                                <option value="4">Sister</option>
                                                                <option value="5">Spouse</option>
                                                                <option value="6">Others</option>
                                                            </select>
                                                        </div>
                                                        <label>
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                <div class="col-md-12 info_con profile_info_con">
                                                    <div class="form-group row in_field pb-lg-5">
                                                        <label for="phone" class="col-sm-2 col-form-label">Benefit Information</label>
                                                        <div class="col-sm-1 mr-5">
                                                            <a href="#" class="inputfile_label">Download</a>
                                                        </div>
                                                        <div class="col-sm-1 ">

                                                            <a href="#" class="inputfile_label">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>