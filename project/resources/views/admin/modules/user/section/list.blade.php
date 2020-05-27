            @include('admin.common.search.user-search')
           
            <div class="wrap_con box_shadow">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 stretched_card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                        <div>
                                        <h4 class="card_title mb-0">Manage {{ ucwords(strtolower($user_role_data->role_name)) }}</h4>
                                        </div>
                                        <div>
                                            <div class="d-flex book_business align-items-center">
                                                @if(!isset($used_in) && empty($used_in))
                                                <button type="button" class="btn btn-danger btn-md mb-3 tabcomplete cus_book_business" id="LoadUserAddSectionBtn"> <i class="fa fa-plus-circle"></i> Add </button>
                                                <button type="button"  class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="LoadUserEditSectionBtn"> <i class="fa fa-pencil"></i>Edit </button>
                                                <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business UserDeleteButton" data-table_id="table_{{ $user_role_data->role_slug }}"> <i class="fa fa-minus-circle" id=""></i>Delete </button>
                                                @else
                                                <button type="button" class="btn btn-primary  btn-md mb-3 tabcomplete cus_book_business" id="GoToProfileSectionBtn"> <i class="fa fa-share-square"></i> Go To Profile </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-10">
                                        <table class="table table-hover" id="table_{{ $user_role_data->role_slug }}" style="width: 100%;">
                                           <thead>
                                              <tr>
                                                <th class="sorting_disabled"></th>
                                                <th>Avatar</th>
                                                <th>Id</th>

                                                @if($user_role_data->id == 2)
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                @else
                                                    <th>Company Name</th>
                                                    <th>Contact Person</th>
                                                @endif
                                                
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>Email</th>
                                                <th>Phone</th>

                                                @if(!isset($used_in) && empty($used_in) && $user_role_data->id == 2)
                                                    <th>Insured Number</th>
                                                    <th>Policy Number</th>
                                                    <th>Effective From</th>
                                                    <th>Effective To</th>
                                                @endif

                                                @if(!isset($used_in) && empty($used_in) && $user_role_data->id == 3)
                                                    <th>Broker</th>
                                                    <th>Provider</th>
                                                    <th>Access Right</th>
                                                @endif

                                                @if(!isset($used_in) && empty($used_in) && $user_role_data->id == 4)
                                                    <th>Broker</th>
                                                    <th>Access Right</th>
                                                @endif
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
            <div class="wrap_con gi_detail_section" style="display: none"></div>