<div class="col-lg-12 profile_card">                                    
    <div class="nav profile_tab-2" role="tablist" aria-orientation="horizontal">
        <ul class="nav" id="pills-tab-2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="v-pills-requests-tab" data-toggle="pill" href="#v-pills-requests" role="tab" aria-controls="v-pills-requests" aria-selected="true">Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-attachment-tab" data-toggle="pill" href="#v-attachment-tab" role="tab" aria-controls="v-attachment-tab" aria-selected="false">Attachment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-library-tab" data-toggle="pill" href="#v-library-tab" role="tab" aria-controls="v-library-tab" aria-selected="false">Library</a>
            </li>
        </ul>
    </div>
</div>

<div class="tab-content" id="v-pills-tabContent-2">
    <div class="tab-pane fade show active" id="v-pills-requests" role="tabpanel" aria-labelledby="v-pills-requests-tab">
        <div class="profile_card">
            <div class="row profile_title">
                <h4 class="text-primary">Requests List</h4>
            </div>
        </div>
        <div class="profile_card file_button_section">
            <div class="col-12">
                <div class="col-9 py-3 text-left float-left book_business">
                    <button type="button" class="mt-0 btn btn-gray btn-primary btn-xs mb-2 tabcomplete" id="file_request_button"><i class="fa fa-arrow-up"></i>Request</button>
                    <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_download_button"> <i class="fa fa-arrow-down"></i> View</a>
                    <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_activate_button"> <i class="fa fa-check-circle"></i> Activate</a>
                    <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_deactivate_button" style="display: none;"> <i class="fa fa-times-circle"></i> Deactivate</a>
                    <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_delete_button"> <i class="fa fa-trash"></i> Delete</a>
                </div>
                <!-- <div class="col-3 py-3 text-right has-search float-left">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input class="pl-sm-4 py-1 search-share"  placeholder="Search"/>
                </div> -->
            </div>
        </div>
        <!-- Progress Table start -->
        <div class="col-lg-12 col-md-12 stretched_card">
            <div class="card no-border">
                <div class="table-responsive mt-10">
                    <table class="table table-hover" id="table_files" style="width: 100%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th  class="text-left">Request Type</th>
                            <th>Description</th>
                            <th>Date Requested</th>
                            <th>Submit Before</th>
                            <th>Requestor</th>
                            <th>Status</th>
                            <th>Reply</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="profile_card" id="document_request_form" style="display:none;">
            <div class="row profile_title">
                <h4 class="text-primary">Document Request Form</h4>
            </div>
            <div class="form-group-no-border collapse show" id="agent_show">
                <div class="row provider_profile_edit">
                    <form action="#" type="POST" class="document_req_form" enctype="multipart/form-data" id="document_rqstform">
                        @include('admin.common.elements.document_request_form')
                    </form>
                </div>
            </div>
        </div>

        <div class="profile_card" id="document_response_form" style="display:none;">
            <div class="row profile_title">
                <h4 class="text-primary">Document Response Form</h4>
            </div>
            <div class="form-group-no-border collapse show" id="agent_show">
                <div class="row provider_profile_edit">
                    <form action="#" type="POST" class="document_req_form" enctype="multipart/form-data" id="document_respform">
                        @include('admin.common.elements.document_responce_form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="v-attachment-tab" role="tabpanel" aria-labelledby="v-attachment-tab">
        <div class="profile_card">
            <div class="row profile_title">
                <h4 class="text-primary">Attachment List</h4>
            </div>
        </div>
        <div class="profile_card file_button_section">
            <div class="col-12">
                <div class="col-9 py-3 text-left float-left">
                    <button type="button" class="mt-0 btn btn-gray btn-primary btn-xs mb-2 tabcomplete" id="file_attach_button"><i class="fa fa-arrow-up"></i>Attach</button>
                    <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_download_button"> <i class="fa fa-arrow-down"></i> View Files</a>
                    <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_activate_button"> <i class="fa fa-check-circle"></i> Activate</a>
                    <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_deactivate_button" style="display: none;"> <i class="fa fa-times-circle"></i> Deactivate</a>
                    <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_delete_button"> <i class="fa fa-trash"></i> Delete</a>
                </div>
                <!-- <div class="col-3 py-3 text-right has-search float-left">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input class="pl-sm-4 py-1 search-share"  placeholder="Search"/>
                </div> -->
            </div>
        </div>
        <!-- Progress Table start -->
        <div class="col-lg-12 col-md-12 stretched_card">
            <div class="card no-border">
                <div class="table-responsive mt-10">
                    <table class="table table-hover" id="table_attachments" style="width: 100%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th  class="text-left">Attachment Type</th>
                            <th>Description</th>
                            <th>Date Requested</th>
                            <th>Submit Before</th>
                            <th>Requestor</th>
                            <th>Status</th>
                            <th>Reply</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="profile_card" id="document_attachment_form" style="display:none;">
            <div class="row profile_title">
                <h4 class="text-primary">Document Attachment Form</h4>
            </div>
            <div class="form-group-no-border collapse show">
                <div class="row provider_profile_edit">
                    <form action="#" type="POST" class="document_req_form" enctype="multipart/form-data" id="document_attachform">
                        @include('admin.common.elements.document_attachment_form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="v-library-tab" role="tabpanel" aria-labelledby="v-library-tab">
        <div class="profile_card pb-5">
            <div class="profile_card">
                <div class="row profile_title">
                    <h4 class="text-primary">Personal Library</h4>
                </div>
            </div>
            <div class="profile_card file_button_section">
                <div class="col-12">
                    <div class="col-9 py-3 text-left float-left">
                        <button type="button" class="mt-0 btn btn-gray btn-primary btn-xs mb-2 tabcomplete" id="pl_upload_button"><i class="fa fa-arrow-up"></i>Upload</button>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled" id="pl_send_message_button"> <i class="fa fa-paper-plane"></i> Send Message</a>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled" id="pl_send_email_button"> <i class="fa fa-share"></i> Send Email</a>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled" id="pl_attach_button"> <i class="fa fa-arrow-up"></i> Attach</a>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled" id="pl_request_button"> <i class="fa fa-arrow-up"></i> Request</a>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_view_button"> <i class="fa fa-eye"></i> View</a>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_activate_button"> <i class="fa fa-check-circle"></i> Activate</a>
                        <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_deactivate_button" style="display: none;"> <i class="fa fa-times-circle"></i> Deactivate</a>
                        <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_delete_button"> <i class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
            </div>

            <!-- Progress Table start -->
            <div class="col-lg-12 col-md-12 stretched_card">
                <div class="card no-border">
                    <div class="table-responsive mt-10">
                        <table class="table table-hover" id="table_personal_lib" style="width: 100%;">
                            <thead>
                            <tr>
                                <th></th>
                                <th  class="text-left">Document Type</th>
                                <th>File Name</th>
                                <th>Description</th>
                                <th>Date Uploaded</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile_card">
            <div class="profile_card">
                <div class="row profile_title">
                    <h4 class="text-primary">Archive Library</h4>
                </div>
            </div>
            <div class="profile_card file_button_section">
                <div class="col-12">
                    <div class="col-9 py-3 text-left float-left">
                        <button type="button" class="mt-0 btn btn-gray btn-primary btn-xs mb-2 tabcomplete" id="al_edit_button"><i class="fa fa-pencil-square-o"></i>Edit</button>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_view_button"> <i class="fa fa-eye"></i> View</a>
                        <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled file_activate_button"> <i class="fa fa-check-circle"></i> Activate</a>
                        <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_deactivate_button" style="display: none;"> <i class="fa fa-times-circle"></i> Deactivate</a>
                        <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled file_delete_button"> <i class="fa fa-trash"></i> Delete</a>
                    </div>
                    <!-- <div class="col-3 py-3 text-right has-search float-left">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input class="pl-sm-4 py-1 search-share"  placeholder="Search"/>
                    </div> -->
                </div>
            </div>
            <!-- Progress Table start -->
            <div class="col-lg-12 col-md-12 stretched_card">
                <div class="card no-border">
                    <div class="table-responsive mt-10">
                        <table class="table table-hover" id="table_archive_lib" style="width: 100%;">
                            <thead>
                            <tr>
                                <th></th>
                                <th  class="text-left">Document Type</th>
                                <th>File Name</th>
                                <th>Description</th>
                                <th>Date Uploaded</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile_card" id="document_upload_form" style="display:none;">
            <div class="row profile_title">
                <h4 class="text-primary">Document Upload Form</h4>
            </div>
            <div class="form-group-no-border collapse show">
                <div class="row provider_profile_edit">
                    <form action="#" type="POST" class="document_req_form" enctype="multipart/form-data" id="document_uploadform">
                        @include('admin.common.elements.document_upload_form')
                    </form>
                </div>
            </div>
        </div>
        <div class="profile_card" id="archive_library_form" style="display:none;">
            <div class="row profile_title">
                <h4 class="text-primary">Insurance Contract</h4>
            </div>
            <div class="form-group-no-border collapse show">
                <div class="row provider_profile_edit">
                    @include('admin.common.elements.archive_library_edit_form')
                </div>
            </div>
        </div>
    </div>
</div>