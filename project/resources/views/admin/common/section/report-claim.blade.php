<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary">Report Claim</h4>
        <div class="pull-right pull-left-mob">
            <!-- <button data-toggle="collapse" href="#report_profile" role="button" aria-expanded="true" aria-controls="report_profile">
                <i class="fa fa-sort-down"></i>
            </button> -->
        </div>
    </div>

    <div class="collapse show pb-80" id="report_profile">
        <div class="profile_card">
            <div  class="form-group-no-border box_shadow">
                <div class="wrap_con box_shadow">
                    <div class="full_wrap">
                        <div class="row no-margin">

                            <div class="col-sm-12 profile_card ">
                                <div class="row profile_title px-lg-5">
                                    <h4  class="text-primary">  LIST OF REPORT CLAIM </h4>
                                </div>

                            </div>


                            <div class="col-12 py-3 text-right share-provider has-search">
                                <button type="button" class="btn btn-primary btn-xs mb-2 tabcomplete cus_book_business" id="edit_report_claim"> <i class="fa fa-pencil"></i> Edit</button>
                                <button type="button" class="btn btn-primary btn-xs mb-2 tabcomplete cus_book_business" id="delete_report_claim"> <i class="fa fa-minus-circle"></i> Delete</button>

                                <!-- <span class="fa fa-search form-control-feedback"></span>
                                <input class="pl-sm-4 py-1 search-share" placeholder="Search"/> -->
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 stretched_card py-3">
                            <div class="card no-border">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="table_report_claim" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Report Claim No.</th>
                                            <th>Name</th>
                                            <th>Insurance Type </th>
                                            <th>Created by</th>
                                            <th>Date Created</th>
                                            <th>Last Updated</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="profile_card box_shadow">
            <div class="row profile_title no-border">
                <h4 class="text-primary ">Apply For Report Claim</h4>
            </div>
        </div>

        <div class="profile_card box_shadow report_claim_1">
            @php $p_array = []; @endphp
            @foreach($policies as $list)
                @if(!in_array($list->category_id, $p_array))
                    @php array_push($p_array, $list->category_id); @endphp
                    <div class="view_policies_list" data-value="{{ encrypt($list->category_id) }}"> <img src="{{ asset('images').'/'.strtolower($list->category_name).'.png' }}" /> <label>{{ $list->category_name }}</label></div>
                @endif
            @endforeach()
        </div>
    </div>
</div>