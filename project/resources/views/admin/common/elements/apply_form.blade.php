<div class="row profile_title px-lg-5 pt-4">
    <p  class="col-12 text-primary font-size-16">Report Claim No:</p>
</div>
<div class="row profile_title px-lg-5 pt-4">
    <p  class="col-12 text-primary font-size-16">Policy No: {{ $policy->policy_number }}</p>
</div>
<div class="form-group-no-border box_shadow">
    <div class="row provider_profile_edit">
        <div class="col-md-12 info_con profile_info_con">
            <div class="form-group row in_field">
                <input type="hidden" name="report_claim_id" value="{{ !empty($rc_details) ? $rc_details->id : ''}}">
                <input type="hidden" name="policy_id" value="{{ $policy->id }}">
                <input type="hidden" name="organisation_id" value="{{ $organisation->id }}">
                <div class="col-12 row profile_title  mb-3 py-0 px-0">
                    <p  class="col-12 text-primary font-size-16 pl-0">Insured / Organization Information</p>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Insured / Organization Name</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ $organisation->carrier_name }}" name="rc_organization_name" readonly>
                </div>
                <label class="col-sm-3  pt-2 pl-0 pr-0">Email</label>
                <div class="col-sm-9  input_f">
                    <input type="email" class="in form-control-plaintext" value="{{ $organisation->carrier_email }}" name="rc_email" readonly="">
                </div>
                <label class="col-sm-3  pt-2 pl-0 pr-0">Address</label>
                <div class="col-sm-9  input_f">
                    <textarea type="text" class="in form-control-plaintext" name="rc_address" readonly="">{{ $organisation->carrier_address }}</textarea>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Phone Number</label>
                <div class="col-sm-3  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($contact_person) && !empty($contact_person->phone_number) ?  $contact_person->phone_number : $organisation->carrier_phone }}" name="rc_phone_number" readonly="">
                </div>
                <label class="col-sm-2 pt-2 pl-0 pr-0">Contact Person</label>
                <div class="col-sm-4 input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($contact_person) && !empty($contact_person->name) ?  $contact_person->name : $organisation->carrier_name }}" name="rc_contact_person" readonly="">
                </div>
                
                <div class="col-12 row profile_title  mb-3 py-0 px-0">
                    <p  class="col-12 text-primary font-size-16 pl-0">Damaged Property Description</p>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Owner of Damaged Property*</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->owner_damaged_property : ''}}" name="rc_injured_owner">
                    <span class="error-message">Please provide owner of damage property.</span>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Injured Party Information*</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->injured_party_information : ''}}" name="rc_injured_party">
                    <span class="error-message">Please provide injured party information.</span>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Name of Injured Person*</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->injured_person_name : ''}}" name="rc_injured_person">
                    <span class="error-message">Please provide name of injured person.</span>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Address*</label>
                <div class="col-sm-9  input_f">
                    <textarea type="text" class="in form-control-plaintext" name="rc_injured_address">{{ !empty($rc_details) ? $rc_details->injured_person_address : ''}}</textarea>
                    <span class="error-message">Please provide a valid address.</span>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Phone Number*</label>
                <div class="col-sm-2  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->injured_person_number : ''}}" name="phone_number">
                    <span class="error-message">Please provide a valid phone number.</span>
                </div>
                <label class="col-sm-2 pt-2 pl-0 pr-0">Additional Phone Number  </label>
                <div class="col-sm-2  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->injured_person_alternate_number : ''}}" name="rc_injured_apn">
                </div>
                <label class="col-sm-1 pt-2 pl-0 pr-0">Date of Birth</label>
                <div class="col-sm-2  input_f">
                    <input type="text" class="in form-control-plaintext date_of_birth" value="{{ !empty($rc_details) ? $rc_details->injured_person_dob : ''}}" name="rc_injured_dob">
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Guardian*</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->injured_person_guardian : ''}}" name="rc_injured_gaurdian">
                    <span class="error-message">Please provide guardian information.</span>
                </div>

                <div class="col-12 row profile_title mb-3 py-0 px-0">
                    <p  class="col-12 text-primary font-size-16 pl-0">Description of Injury</p>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Date of Damage/Injury*</label>
                <div class="col-sm-3  input_f">
                    <input type="text" class="in form-control-plaintext date_of_birth" value="{{ !empty($rc_details) ? $rc_details->damage_injury_date : ''}}" name="rc_injured_date">
                    <span class="error-message">Please provide date of damage/injury.</span>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Time of Damage/Injury*</label>
                <div class="col-sm-3  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->damage_injury_date : ''}}" name="rc_injured_time">
                    <span class="error-message">Please provide time of damage/injury.</span>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Exact Location of the Incident</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->location_of_incident : ''}}" name="rc_injured_location">
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">What activity was going on</label>
                <div class="col-sm-9  input_f">
                    <input type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->activity : ''}}" name="rc_injured_activity">
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Detailed description of the accident</label>
                <div class="col-sm-9  input_f">
                    <textarea type="text" class="in form-control-plaintext" value="{{ !empty($rc_details) ? $rc_details->description_of_accident : ''}}" name="rc_injured_description"></textarea>
                </div>
                <label class="col-sm-3 pt-2 pl-0 pr-0">Attach file</label>
                <div class="col-sm-9  input_f">
                    <input type="file" name="rc_file" id="file_report" class="inputfile" />
                    <label for="file_report">Browser</label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 pt-lg-2 pb-lg-5 text-center">
        <button type="submit" class="col-2 btn btn-submit" id="report_claim_button">{{ !empty($rc_details) ? 'UPDATE' : 'SAVE'}}</button>
        <button type="reset" class="col-2 btn btn-reset">CANCEL</button>
    </div>
</div>
            