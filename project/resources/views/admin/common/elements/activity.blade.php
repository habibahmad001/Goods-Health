<div class="profile_card pb-4">
    <div class="row profile_title">
        <h4 class="text-primary">Activity</h4>
        <div class="pull-left-mob">
            <!-- <a data-toggle="collapse" href=".clps-history" role="button" aria-expanded="true" aria-controls="history">
                <i class="fa fa-sort-down"></i>
            </a> -->
        </div>
    </div>

    <div class="form-group-no-border collapse show">
        <div class="col-sm-12 profile_card br-bt">                                    
            <div class="nav profile_tab-2" role="tablist" aria-orientation="horizontal">
                <ul class="nav" id="sub-pills-tab" role="tablist">
                    <li class="nav-item dropdown">
                        <a class="nav-link active task dropbtn" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="true">Tasks</a>
                        <div class="nav-item dropdown-content">
                            <a href="#" class="add_Task_to_user_module"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Task</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link event dropbtn" id="v-pills-events-tab" data-toggle="pill" href="#v-events-tab" role="tab" aria-controls="v-events-tab" aria-selected="false">Events</a>
                        <div class="dropdown-content">
                            <a href="#" class="add_Event_to_user_module"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Event</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link notes dropbtn" id="v-pills-notes-tab" data-toggle="pill" href="#v-notes-tab" role="tab" aria-controls="v-notes-tab" aria-selected="false">Notes</a>
                        <div class="dropdown-content">
                            <a href="#" class="add_Note_to_user_module"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Note</a>
                        </div>
                    </li>
                    <span class="left-border"></span>
                    <li class="nav-item">
                        <a class="nav-link message" id="v-pills-message-tab" data-toggle="pill" href="#v-pills-message" role="tab" aria-controls="v-pills-message" aria-selected="false">Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link email" id="v-pills-email-tab" data-toggle="pill" href="#v-pills-email" role="tab" aria-controls="v-pills-email" aria-selected="false">Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link live_chat" id="v-pills-live-chat-tab" data-toggle="pill" href="#v-pills-live-chat" role="tab" aria-controls="v-pills-live-chat" aria-selected="false">Live Chat</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-sub-tabContent">
            <div class="tab-pane fade show active" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">
                <div class="col-lg-12 col-md-12 stretched_card pt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_tasks" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>Creator</th>
                                        <th>Date Created</th>
                                        <th>Schedule</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-events-tab" role="tabpanel" aria-labelledby="v-events-tab-tab">
                <div class="col-lg-12 col-md-12 stretched_card pt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_events" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>Creator</th>
                                        <th>Date Created</th>
                                        <th>Schedule</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-notes-tab" role="tabpanel" aria-labelledby="v-notes-tab-tab">
                <div class="col-lg-12 col-md-12 stretched_card pt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_notes" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Policy</th>
                                        <th>Title</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-message" role="tabpanel" aria-labelledby="v-pills-message-tab">
                <div class="col-lg-12 col-md-12 stretched_card pt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_message" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>From</th>
                                        <th>Subject</th>
                                        <th>Date Created</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab">
                <div class="col-lg-12 col-md-12 stretched_card pt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_email" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>From</th>
                                        <th>Subject</th>
                                        <th>Date Created</th>
                                        <th>Email From</th>
                                        <th>CC</th>
                                        <th>BCC</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-live-chat" role="tabpanel" aria-labelledby="v-pills-live-chat-tab">
                <div class="col-lg-12 col-md-12 stretched_card pt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_live_chat" style="width: 100%;">
                                   <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Reply From</th>
                                        <th>Date</th>
                                        <th>Chat Message</th>
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