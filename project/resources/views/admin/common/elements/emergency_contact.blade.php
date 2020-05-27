@if(isset($emergency_contact[0]))
@foreach($emergency_contact as $ec_key => $list)
<div class="row provider_profile_edit" id="{{ $ec_key != 0 ? 'emrg_contact' : '' }}">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="emergency_contact" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8 input_f">
                <input type="text" class="in form-control-plaintext"  name="emergency_user_name[]" autocomplete="off" value="{{ $list->emergency_user_name }}">
               <input type="hidden" name="emergency_id[]" value="{{$list->id}}">
            </div>
            <label for="last_name" class="col-sm-4 col-form-label">Phone No.</label>
            <div class="col-sm-8 input_f">
                <input type="text" class="in form-control-plaintext"  name="emergency_number[]" autocomplete="off" value="{{ $list->emergency_number }}">
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="spouse" class="col-sm-4 col-form-label">Relation</label>
            <div class="col-sm-8 input_f">
                <select  class="in form-control " name="relation[]">
                    <option value="">Select relation</option>
                        <option value="0" {{$list->relation == 0 ? 'selected' : ''}}>Father</option>
                        <option value="1" {{$list->relation == 1 ? 'selected' : ''}}>Mother</option>
                        <option value="2" {{$list->relation == 2 ? 'selected' : ''}}>Brother</option>
                        <option value="3" {{$list->relation == 3 ? 'selected' : ''}}>Sister</option>
                </select>
            </div>
            <label for="last_name" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8 input_f">
                <input type="text" class="in form-control-plaintext"  name="emergency_relative_email[]" autocomplete="off" value="{{ $list->emergency_relative_email }}">
            </div>
        </div>
    </div>
    <div class="col-md-12 pb-lg-5">
        <button id="addEmerConBtn" type="button" class="text-danger ml-3"> <i class="fa fa-plus-circle"></i> Add</button>
        @if($ec_key != 0)
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="text-danger ml-3 closed"> <i class="fa fa-remove"></i> Remove </button>
        @endif
    </div>
</div>

@endforeach
@else
<div class="row provider_profile_edit">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="emergency_contact" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8 input_f">
                <input type="text" class="in form-control-plaintext"  name="emergency_user_name[]" autocomplete="off" value="">
               <input type="hidden" name="emergency_id[]" value="0">
            </div>
            <label for="last_name" class="col-sm-4 col-form-label">Phone No.</label>
            <div class="col-sm-8 input_f">
                <input type="text" class="in form-control-plaintext"  name="emergency_number[]" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="spouse" class="col-sm-4 col-form-label">Relation</label>
            <div class="col-sm-8 input_f">
                <select  class="in form-control " name="relation[]">
                    <option value="">Select relation</option>
                        <option value="0">Father</option>
                        <option value="1">Mother</option>
                        <option value="2">Brother</option>
                        <option value="3">Sister</option>
                </select>
            </div>
            <label for="last_name" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8 input_f">
                <input type="text" class="in form-control-plaintext"  name="emergency_relative_email[]" autocomplete="off">
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 pb-lg-5">
    <button id="addEmerConBtn" type="button" class="text-danger ml-3"> <i class="fa fa-plus-circle"></i> Add</button>
</div>
@endif