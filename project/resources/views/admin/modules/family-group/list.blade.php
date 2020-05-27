            @include('admin.common.search.family-group-search')
           
            <div class="wrap_con box_shadow">
                <div class="full_wrap">
                    <div class="row">
                    <!-- Progress Table start -->
                        <div class="col-lg-12 col-md-12 stretched_card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                        <div>
                                        <h4 class="card_title mb-0">Manage Family/Group</h4>
                                        </div>
                                        <div>
                                            <div class="d-flex book_business align-items-center">
                                                    <button type="button" class="btn btn-danger btn-md mb-3 tabcomplete cus_book_business" id="addUserCenterUserBtn"> <i class="fa fa-plus-circle"></i> Add </button>
                                                    <button type="button"  class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="editUserCenterUserBtn"> <i class="fa fa-pencil"></i>Edit </button>
                                                    <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="delete_user_all"> <i class="fa fa-minus-circle" id=""></i>Delete </button>
                                                    <form id="delete-user" action="" method="POST" >
                                                        <input type="hidden" name="u_type" value="business">
                                                        @csrf
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-10">
                                        <table class="table table-hover" id="table_family_group" style="width: 100%;">
                                           <thead>
                                              <tr>
                                                <th class="sorting_disabled"></th>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Job</th>
                                                <th>Employment Status</th>
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
                        <!-- Progress Table end -->
                    </div>
                </div>
            </div>
            <div class="wrap_con gi_detail_section" style="display: none"></div>