<div class="card_1">
    <div class="card-body_1">
        <div class="mail_content">
            <form action="#" id="message_hub_form">
            <div class="row">
                <div class="mail_message col-lg-12">
                    <!-- <div class="form-group">
                        <label for="example-email-from_email" class="col-form-label">FROM:</label>
                        <input class="form-control" type="email" value="" id="example-email-from_email" name="from_email">
                        <select class="js-example-basic-ajax form-control" name="from_email" id="example-email-from_email" readonly>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="example-text-to_email" class="col-form-label">TO:</label>
                        <!-- <input class="form-control" type="email" value="" id="example-text-to_email" name="to_email"> -->
                        <select class="js-example-basic-ajax form-control" name="to_email" id="example-email-to_email">
                        </select>
                        <span class="error-message">Please provide a valid email address.</span>
                    </div>
                    <div class="form-group">
                        <label for="example-text-cc_email" class="col-form-label">CC:</label>
                        <!-- <input class="form-control" type="text" value="" id="example-text-cc_email" name="cc_email"> -->
                        <select class="js-example-basic-ajax form-control" name="cc_email" id="example-email-cc_email">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-bcc_email" class="col-form-label">BCC:</label>
                        <!-- <input class="form-control" type="text" value="" id="example-text-bcc_email" name="bcc_email"> -->
                        <select class="js-example-basic-ajax form-control" name="bcc_email" id="example-text-bcc_email">
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="example-text-subject" class="col-form-label">Subject:</label>
                        <input class="form-control" type="text" value="" id="example-text-subject" name="subject">
                        <span class="error-message">Please provide a valid subject.</span>
                    </div>
                    <div class="form-group">
                        <label for="example-text-subject" class="col-form-label">Message:</label>
                        <textarea class="form-control textarea" rows="10" id="example-text-message" name="message"></textarea>
                        <span class="error-message">Please provide a valid message.</span>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card text-white bg-card-skyline">
                        <div class="card-body">
                            <h4 class="">FILES</h4>
                            <div class="custom-file-upload"> 
                                <label for="file-upload" class="custom-file-upload1">
                                    Choose File
                                </label>
                                <input id="file-upload" type="file" name="attachments[]" multiple>
                            </div>
                            <div class="alert" role="alert" id="file_name_to_display" style="display: none;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary btn-md mb-3 mr-4 tabcomplete mail_sent">SEND</button>
                    <button type="button" class="btn btn-primary btn-md mb-3 mr-4 tabcomplete_gray mail_close">CLOSE</button>
                </div>
            </div>
            </form>
        </div>  
    </div>
</div>