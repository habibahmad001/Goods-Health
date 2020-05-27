                        <div class="wrap_con box_shadow">
                            <div class="full_wrap">
                                <div class="row no-margin">
                                    <div class="col-sm-12  profile_card">
                                        <div class="row profile_title">
                                            <h4 class="text-primary">Documents</h4>
                                            <div class="pull-right pull-left-mob">
                                                <a data-toggle="collapse" href="#documentSec1" role="button" aria-expanded="true" aria-controls="documentSec1">
                                                    <i class="fa fa-sort-down"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row form-group-no-border collapse show" id="documentSec1">
                                            @if(isset($documents[0]))
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="py-lg-4 pr-lg-5 col-md-12 text-right float-left">
                                                            <button type="button" class="btn btn-submit user_document_download">DOWNLOAD</button>
                                                            <button type="button" class="btn btn-reset user_document_delete">DELETE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 mt-4 stretched_card">
                                                    <div class="card no-border">
                                                        <div class="table-responsive mt-10">
                                                            <table class="table table-hover text-left">
                                                                <thead>
                                                                <tr>
                                                                    <th><input type="radio" /></th>
                                                                    <th  class="text-left">Name</th>
                                                                    <th>Type</th>
                                                                    <th>Link</th>
                                                                    <th>Created At</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($documents as $list)
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" value="{{ $list->id }}" name="user_document_id" data-href="{{ asset($list->document_path) }}"/>
                                                                    </td>
                                                                    <td>
                                                                        @if($list->document_name == 1)
                                                                            Passport
                                                                        @elseif($list->document_name == 2)
                                                                            Driving License
                                                                        @elseif($list->document_name == 3)
                                                                            Government Id
                                                                        @elseif($list->document_name == 4)
                                                                            Contract
                                                                        @elseif($list->document_name == 5)
                                                                        @elseif($list->document_name == 6)
                                                                            Job Description
                                                                        @elseif($list->document_name == 7)
                                                                            Resignation Letter
                                                                        @elseif($list->document_name == 8)
                                                                            Certificate Of Employment
                                                                        @elseif($list->document_name == 9)
                                                                            Termination Letter
                                                                        @elseif($list->document_name == 10)
                                                                            Memorandum
                                                                        @else
                                                                            Others
                                                                        @endif
                                                                    </td>
                                                                    <td  class="text-left">
                                                                        @if($list->document_type == 'folder')
                                                                            <i class="fa fa-folder"></i> Folder
                                                                        @elseif($list->document_type == 'jpg' || $list->document_type == 'jpeg' || $list->document_type == 'png')
                                                                            <i class="fa fa-picture-o text-red"></i> Image
                                                                        @elseif($list->document_type == 'doc' || $list->document_type == 'docx')
                                                                            <i class="fa fa-file-word-o text-info"></i> DOC
                                                                        @elseif($list->document_type == 'ppt' || $list->document_type == 'pptx')
                                                                            <i class="fa fa-file-powerpoint-o text-red"></i> PPT
                                                                        @elseif($list->document_type == 'pdf')
                                                                            <i class="fa fa-file-pdf-o text-red"></i> PDF
                                                                        @else
                                                                            <i class="fa fa-file"></i> File
                                                                        @endif
                                                                    </td>
                                                                    <td><a href="{{ asset($list->document_path) }}" target="_blank">View</td>
                                                                    <td>{{ $list->created_at }}</td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row provider_profile_edit">
                                                <div class="col-md-6 info_con profile_info_con">
                                                    <div class="form-group row in_field">
                                                        <label for="emergency_contact" class="col-sm-4 col-form-label">Document</label>
                                                        <div class="col-sm-8 input_f">
                                                            <select id="inputState" class="text-center in form-control " name="document_type[]" >
                                                                <option selected value="">Select Doc Type</option>
                                                                <option value="1">Passport</option>
                                                                <option value="2">Driving License</option>
                                                                <option value="3">Government Id</option>
                                                                <option value="4">Contract</option>
                                                                <option value="6">Job Description</option>
                                                                <option value="7">Resignation Letter</option>
                                                                <option value="8">Certificate Of Employment</option>
                                                                <option value="9">Termination Letter</option>
                                                                <option value="10">Memorandum</option>
                                                                <option value="11">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 info_con profile_info_con">
                                                    <div class="form-group row in_field">
                                                        <label for="spouse" class="col-sm-4 col-form-label"></label>
                                                        <div class="col-sm-8 input_f yo_photo document">
                                                            <div class="upload_image">
                                                                <div class="file_upload_wrap">
                                                                    <label class="custom-file-upload">Upload Document
                                                                        <input type="file" class="file_upload" name="document_name[]">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-lg-5">
                                                <button id="addDocBtn" type="button" class="text-danger ml-3"> <i class="fa fa-plus-circle"></i> Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>