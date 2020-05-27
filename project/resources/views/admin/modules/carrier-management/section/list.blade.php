            @if($type == 'carriers')
            @include('admin.common.search.carrier-management-search')

            <div class="wrap_con box_shadow">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 stretched_card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                        <div>
                                        <h4 class="card_title mb-0">Carriers</h4>
                                        </div>
                                        <div>
                                            <div class="d-flex book_business align-items-center">
                                                <button type="button"  class="btn btn-danger btn-md mb-3 tabcomplete cus_book_business" id="LoadAddSectionBtnCarrier"> <i class="fa fa-plus-circle"></i>Add </button>
                                                <button type="button"  class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="LoadEditSectionBtnCarrier"> <i class="fa fa-pencil"></i>Edit </button>
                                                <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business DeleteButtonCarrier"> <i class="fa fa-minus-circle" id=""></i>Delete </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-10">
                                        <table class="table table-hover" id="table_carriers" style="width: 100%;">
                                           <thead>
                                              <tr>
                                                <th class="sorting_disabled"></th>
                                                <th>ID</th>
                                                <th>Carrier ID</th>
                                                <th>Carrier Name</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>Email</th>
                                                <th>Phone</th>
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
            <div class="wrap_con gi_detail_section" style="display: none"></div>
            @else
            @include('admin.modules.product-management.section.list')
            @endif
            