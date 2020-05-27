            @include('admin.common.search.product-management-search')
           
            <div class="wrap_con box_shadow">
                <div class="full_wrap">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 stretched_card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                        <div>
                                        <h4 class="card_title mb-0">Carrier Products</h4>
                                        </div>
                                        <div>
                                            <div class="d-flex book_business align-items-center">
                                                @if($type == 'products')
                                                <button type="button"  class="btn btn-danger btn-md mb-3 tabcomplete cus_book_business" id="LoadAddProductSectionBtn"> <i class="fa fa-plus-circle"></i>Add </button>
                                                <button type="button"  class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="LoadEditProductSectionBtn"> <i class="fa fa-pencil"></i>Edit </button>
                                                <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business CarrierProductDeleteButton"> <i class="fa fa-minus-circle" id=""></i>Delete </button>
                                                @else
                                                <button type="button"  class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business" id="LoadEditProductMgntSectionBtn"> <i class="fa fa-pencil"></i>Edit </button>
                                                <button type="button" class="btn btn-primary btn-md mb-3 tabcomplete cus_book_business CarrierProductMgntDeleteButton"> <i class="fa fa-minus-circle" id=""></i>Delete </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-10">
                                        <table class="table table-hover" id="table_carrier_products" style="width: 100%;">
                                           <thead>
                                              <tr>
                                                <th class="sorting_disabled"></th>
                                                <th>ID</th>
                                                <th>Products</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>County</th>
                                                <th>Carrier ID</th>
                                                <th>Carrier</th>
                                                <th>Product Type</th>
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