<input type="hidden" name="activity_type" value="task">
<input type="hidden" name="task_id" value="{{ !empty($activity_data->id) ? $activity_data->id: '' }}">
<div class="form-group row in_field no-border p-0">
    <label for="title" class="col-md-3 col-form-label"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;Title</label>
    <div class="col-md-9 input_f">
        <input type="text" class="in form-control-plaintext input-small" id="title" name="title" value="{{ !empty($activity_data->title) ? $activity_data->title: '' }}" {{ $action_type == 'view'? 'readonly' : ''}}>
    </div>

    <label for="start_datetime" class="col-md-3 col-form-label"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;Date</label>
    <div class="col-md-3 input_f">
        <input type="text" class="in form-control-plaintext input-small form-current-date" id="start_date" name="start_date" readonly value="{{ !empty($activity_data->start_date) ? date('m/d/Y', strtotime($activity_data->start_date)): '' }}" {{ $action_type == 'view'? 'readonly' : ''}}>
    </div>
    <div class="col-md-2 input_f">
        <input type="text" class="in form-control-plaintext input-small gi_time_picker" id="start_time" name="start_time" value="{{ !empty($activity_data->start_time) ? $activity_data->start_time : '' }}" {{ $action_type == 'view'? 'readonly' : ''}}>
    </div>
    <div class="col-md-2 input_f">
        <input type="text" class="in form-control-plaintext input-small gi_time_picker" id="end_time" name="end_time" value="{{ !empty($activity_data->end_time) ? $activity_data->end_time : '' }}" {{ $action_type == 'view'? 'readonly' : ''}}>
    </div>
    <div class="col-md-2 input_f mb-0">
        <label class="container_checkbox m-0" style="font-size: 10px;">All Day
            <input type="checkbox" class="checkbox in form-control-plaintext all_day_checkbox" name="all_day" value="1" {{ !empty($activity_data->all_day) && $activity_data->all_day == 1 ? 'checked' : '' }} {{ $action_type == 'view'? 'readonly' : ''}}>
            <span class="checkmark"></span>
        </label>
    </div>

    @if($action_from != 'module')
    <label for="user_type_id" class="col-md-3 col-form-label"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;User Type</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'view')
            @foreach($get_all_roles as $get_all_role)
                @if(!empty($get_user) && $get_user->role_id == $get_all_role->id)
                    <input type="text" class="in form-control-plaintext input-small" id="user_type_id" name="user_type_id" value="{{$get_all_role->role_name}}" readonly>
                @endif
            @endforeach
        @else
        <select id="user_type_id" class="in form-control input-small gi_te_user_type" name="user_type_id">
            <option value="">Select User Type</option>
            @foreach($get_all_roles as $get_all_role)
            <option value="{{ encrypt($get_all_role->id) }}" {{ !empty($get_user) && $get_user->role_id == $get_all_role->id ? 'selected' : '' }}>{{$get_all_role->role_name}}</option>
            @endforeach
        </select>
        @endif
    </div>

    <label for="user_id" class="col-md-3 col-form-label"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;User</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'view')
            @foreach($users_data as $user_data)
                @if($user_data->id == $activity_data->user_id)
                    @php 
                    $user_name = $user_data->name ? $user_data->name : $user_data->username;
                    $selected = $user_data->id == $activity_data->user_id ? 'selected' : '';
                    @endphp
                    <input type="text" class="in form-control-plaintext input-small" id="user_id" name="user_id" value="{{ $user_name }} / {{ $user_data->email }}" readonly>
                @endif
            @endforeach
        @else
        <select id="user_id" class="in form-control input-small gi_te_user_id" name="user_id">
            @if(!empty($users_data))
            <option value="">Select User</option>
                @foreach($users_data as $user_data){
                    @php 
                    $user_name = $user_data->name ? $user_data->name : $user_data->username;
                    $selected = $user_data->id == $activity_data->user_id ? 'selected' : '';
                    @endphp
                    <option value="{{ encrypt($user_data->id) }}" {{ $selected }} >{{ $user_name}} / {{ $user_data->email }}</option>
                @endforeach
            @else
            <option value="">Select User</option>
            @endif
        </select>
        @endif
    </div>
    @else
        <input type="hidden" name="user_id" value="{{ encrypt($user_id) }}">
    @endif
    <label for="reminder_1" class="col-md-3 col-form-label"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;Reminder 1</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'view')
            <input type="text" class="in form-control-plaintext input-small" id="reminder_1" name="reminder_1" value="{{ !empty($activity_data->reminder_1) ? $activity_data->reminder_1.' minute': '' }}" readonly>
        @else
        <select id="reminder_1" class="in form-control input-small" name="reminder_1">
            <option value="">Select Reminder</option>
            <option value="10" {{ !empty($activity_data->reminder_1) && $activity_data->reminder_1 == 10 ? 'selected' : '' }}>10 minute</option>
            <option value="15" {{ !empty($activity_data->reminder_1) && $activity_data->reminder_1 == 15 ? 'selected' : '' }}>15 minute</option>
            <option value="20" {{ !empty($activity_data->reminder_1) && $activity_data->reminder_1 == 20 ? 'selected' : '' }}>20 minute</option>
            <option value="25" {{ !empty($activity_data->reminder_1) && $activity_data->reminder_1 == 25 ? 'selected' : '' }}>25 minute</option>
            <option value="30" {{ !empty($activity_data->reminder_1) && $activity_data->reminder_1 == 30 ? 'selected' : '' }}>30 minute</option>
            <option value="60" {{ !empty($activity_data->reminder_1) && $activity_data->reminder_1 == 60 ? 'selected' : '' }}>60 minute</option>
        </select>
        @endif
    </div>

    <label for="reminder_2" class="col-md-3 col-form-label"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>&nbsp;&nbsp;Reminder 2</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'view')
            <input type="text" class="in form-control-plaintext input-small" id="reminder_2" name="reminder_2" value="{{ !empty($activity_data->reminder_2) ? $activity_data->reminder_2.' minute': '' }}" readonly>
        @else
        <select id="reminder_2" class="in form-control input-small" name="reminder_2">
            <option value="">Select Reminder</option>
            <option value="10" {{ !empty($activity_data->reminder_2) && $activity_data->reminder_2 == 10 ? 'selected' : '' }}>10 minute</option>
            <option value="15" {{ !empty($activity_data->reminder_2) && $activity_data->reminder_2 == 15 ? 'selected' : '' }}>15 minute</option>
            <option value="20" {{ !empty($activity_data->reminder_2) && $activity_data->reminder_2 == 20 ? 'selected' : '' }}>20 minute</option>
            <option value="25" {{ !empty($activity_data->reminder_2) && $activity_data->reminder_2 == 25 ? 'selected' : '' }}>25 minute</option>
            <option value="30" {{ !empty($activity_data->reminder_2) && $activity_data->reminder_2 == 30 ? 'selected' : '' }}>30 minute</option>
            <option value="60" {{ !empty($activity_data->reminder_2) && $activity_data->reminder_2 == 60 ? 'selected' : '' }}>60 minute</option>
        </select>
        @endif
    </div>

    <label for="reminder_3" class="col-md-3 col-form-label"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i>&nbsp;&nbsp;Reminder 3</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'view')
            <input type="text" class="in form-control-plaintext input-small" id="reminder_3" name="reminder_3" value="{{ !empty($activity_data->reminder_3) ? $activity_data->reminder_3.' minute': '' }}" readonly>
        @else
        <select id="reminder_3" class="in form-control input-small" name="reminder_3">
            <option value="">Select Reminder</option>
            <option value="10" {{ !empty($activity_data->reminder_3) && $activity_data->reminder_3 == 10 ? 'selected' : '' }}>10 minute</option>
            <option value="15" {{ !empty($activity_data->reminder_3) && $activity_data->reminder_3 == 15 ? 'selected' : '' }}>15 minute</option>
            <option value="20" {{ !empty($activity_data->reminder_3) && $activity_data->reminder_3 == 20 ? 'selected' : '' }}>20 minute</option>
            <option value="25" {{ !empty($activity_data->reminder_3) && $activity_data->reminder_3 == 25 ? 'selected' : '' }}>25 minute</option>
            <option value="30" {{ !empty($activity_data->reminder_3) && $activity_data->reminder_3 == 30 ? 'selected' : '' }}>30 minute</option>
            <option value="60" {{ !empty($activity_data->reminder_3) && $activity_data->reminder_3 == 60 ? 'selected' : '' }}>60 minute</option>
        </select>
        @endif
    </div>

    <label for="description" class="col-md-3 col-form-label"><i class="fa fa-align-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Description</label>
    <div class="col-md-9 input_f">
        <textarea type="text" class="in form-control-plaintext font-size-12" id="description" name="description" {{ $action_type == 'view'? 'readonly' : ''}}>{!! !empty($activity_data->description) ? $activity_data->description: '' !!}</textarea>
    </div>
    @if($action_type != 'view')
    <div class="col-md-12 text-center pt-3">
        <button class="btn btn-submit task_button" type="submit">
            @if($action_type == 'edit')
            UPDATE
            @else
            SAVE
            @endif
        </button>
    </div>
    @endif
</div>