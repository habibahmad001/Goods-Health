<div class="col-md-6 info_con profile_info_con">
    <div class="form-group row in_field">
        <input type="hidden" name="request_id" value="">
        <input type="hidden" name="reply" value="">
        <input type="hidden" name="request_type" value="2">
        <label for="request_field" class="col-sm-4 col-form-label request_field">Document Type</label>
        <div class="col-sm-8 input_f request_field">
            <select id="file_type_dropdown" class="text-center in form-control" name="document_type">
                <option selected value="">Select Doc Type</option>
                @foreach($document_types as $document_type)
                <option value="{{ $document_type->id }}">{{ $document_type->document_name }}</option>
                @endforeach
            </select>
            <span class="error-message">Please provide a valid document type.</span>
        </div>

        <!-- <label for="file_type" class="col-sm-4 col-form-label">File Name</label>
        <div class="col-sm-8  input_f">
            <input type="text" class="in form-control-plaintext" id="req_file_name" name="file_name" value="" readonly>
            <span class="error-message">Please provide a valid file name.</span>
        </div> -->
        <label for="city" class="col-sm-4 col-form-label">Description </label>
        <div class="col-sm-8  input_f">
            <textarea class="in form-control-plaintext" rows="6" name="description"></textarea>
            <span class="error-message">Please provide a valid description.</span>
        </div>
        <label for="city" class="col-sm-4 col-form-label">Submit Before </label>
        <div class="col-sm-8  input_f">
            <input type="text" class="in form-control-plaintext form-current-date" name="submit_before" autocompleted="off" readonly="readonly">
            <i class="fa fa-calendar fa-lg datepicker_icon" aria-hidden="true"></i>
            <span class="error-message">Please provide a valid date.</span>
        </div>
        <label class="col-sm-4 col-form-label">Attach File </label>

        <div class="col-sm-8 pt-1">
            <input type="file" name="image" id="attach" class="inputfile" multiple/>
            <label for="attach" class="pb-1">Browser</label>
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
