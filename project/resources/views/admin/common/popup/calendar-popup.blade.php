<!-- Calendar popup -->
<div class="modal fade slide-right" id="main_calendar_popup" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg-2x float-r m-0 mt-5 pr-2" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
            <h5 class="modal-title text-primary">Calendar</h5>
                <button type="button" class="close close_calendar_popup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="row provider_profile_edit main-search-module">
                    <div class="col-md-12">
                        <div class="profile_title">
                            <h6 class="text-primary">Search</h6>
                        </div>
                    </div>
                    <div class="col-md-6 info_con profile_info_con">
                        <div class="form-group row in_field p-0 pt-1 no-border">
                            <label for="calendar_keyword" class="col-md-4 col-form-label">Keyword</label>
                            <div class="col-md-8 input_f">
                                <input type="text" class="in form-control-plaintext input-small" id="calendar_keyword" name="keyword">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 info_con profile_info_con">
                        <div class="form-group row in_field p-0 pt-1 no-border">
                            <label for="notification_type" class="col-md-4 col-form-label">Notification Type</label>
                            <div class="col-md-8 input_f">
                                <select class="in form-control input-small" id="calendar_module_id" name="state">
                                    <option value="">Select notification type</option>
                                    <option value="3">Book Of Business</option>
                                    <option value="4">Messages & Emails</option>
                                    <option value="6">Files</option>
                                    <option value="10">Claim</option>
                                    <option value="9">Payment</option>
                                    <option value="11">Employee</option>
                                    <option value="14">Agent/Broker</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" id="calendar_section">
                </div>
                <div class="col-sm-12 calendar_notification_list stretched_card pt-4" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_calendar_notification" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Date Created</th>
                                        <th>Schedule</th>
                                        <th>Action</th>
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
</div>