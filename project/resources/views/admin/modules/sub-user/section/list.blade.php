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
                                            <div class="d-flex book_business align-items-center" id="EmployeeUserlist">
                                                    <button type="button" class="btn btn-danger btn-md mb-3 tabcomplete cus_book_business" id="addEmployeeUserBtn"> <i class="fa fa-plus-circle"></i> Add </button>
                                                    <button type="button"  class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="editEmployeeUserBtn"> <i class="fa fa-pencil"></i>Edit </button>
                                                    <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business UserDeleteEmployeeButton" data-table_id="table_{{ $user_role_data->role_slug }}"> <i class="fa fa-minus-circle" id=""></i>Delete </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-10" id="BusUserTable">
                                        <table class="table table-hover" id="table_{{ $user_role_data->role_slug }}" style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Avatar</th>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>Email</th>
                                                <th>Phone</th>
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
            <div class="wrap_con gi_detail_section">
                <div class="gi_detail_employee_section" style="display: none">
                    
                </div>
            </div>