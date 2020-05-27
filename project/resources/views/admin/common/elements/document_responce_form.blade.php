<div class="col-md-6 info_con profile_info_con">
    <div class="form-group row in_field">
        <input type="hidden" name="request_id" value="" id="res_request_id">
        <label for="file_type" class="col-sm-2 col-form-label">Request</label>
        <div class="col-sm-4  input_f">
            <input type="text" class="in form-control-plaintext" id="res_request" readonly>
        </div>
        <label for="file_type" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-4  input_f">
            <input type="text" class="in form-control-plaintext" id="res_type" readonly>
        </div>
        <label for="file_type" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10  input_f">
            <input type="text" class="in form-control-plaintext" id="res_description" readonly>
        </div>
        <label for="file_type" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-4  input_f">
            <input type="text" class="in form-control-plaintext" id="res_date" readonly>
        </div>
        <label for="file_type" class="col-sm-2 col-form-label">Submit Before</label>
        <div class="col-sm-4  input_f">
            <input type="text" class="in form-control-plaintext" id="res_submit_before" readonly>
        </div>
        <label for="file_type" class="col-sm-2 col-form-label">Requestor Name</label>
        <div class="col-sm-4  input_f">
            <input type="text" class="in form-control-plaintext" id="res_requestor_name" readonly>
        </div>
        <label for="file_type" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-4  input_f">
            <input type="text" class="in form-control-plaintext" id="res_status" readonly>
        </div>

        <!-- <label for="file_type" class="col-sm-2 col-form-label">File Name</label>
        <div class="col-sm-8 input_f">
            <input type="text" class="in form-control-plaintext" id="res_file_name" readonly>
        </div>
        <div class="col-sm-2 text-left float-left">
            <a href="#" class="btn btn-primary btn-xs mb-2 btn-flat tabcomplete" id="res_file_download" target="_blank"> <i class="fa fa-arrow-down"></i> Download</a>
        </div> -->
    </div>
   
    <div class="form-group row in_field">
        <!-- <label for="file_type" class="col-sm-4 col-form-label">File Name</label>
        <div class="col-sm-8  input_f">
            <input type="text" class="in form-control-plaintext" id="file_name" value="" name="file_name" readonly>
        </div> -->
        <label for="city" class="col-sm-4 col-form-label">Description </label>
        <div class="col-sm-8  input_f">
            <textarea class="in form-control-plaintext" rows="6" name="description"></textarea>
            <span class="error-message">Please provide a valid description.</span>
        </div>
        <label for="file_type" class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8  input_f">
            <input type="text" class="in form-control-plaintext" id="res_status_2" readonly>
        </div>
        <label class="col-sm-4 col-form-label">Attach File </label>

        <div class="col-sm-8 pt-1">
            <input type="file" name="image" id="file_resp" class="inputfile" multiple />
            <label for="file_resp" class="pb-1">Browser</label>
        </div>

        <label class="col-sm-4 col-form-label"></label>
        <div class="col-sm-8 pt-1">
            <div class="alert bg-card-skyline" role="alert" id="file_name_to_display" style="display: none;"></div>
        </div>
    </div>
    <div class="pt-0 col-md-12 text-center">
        <button class="btn btn-submit btn-rounded font-size-12 bold send_file_request" type="submit">SEND</button>
        <button type="reset" class="btn btn-reset font-size-12 bold btn-rounded cancel_file_request">CANCEL</button>
    </div>
</div>