<input type="hidden" name="activity_type" value="note">
<input type="hidden" name="user_id" value="{{ encrypt($user_id) }}">
@if($action_type == 'reply')
<input type="hidden" name="note_id" value="{{ encrypt($activity_data->id) }}">
@endif
<div class="form-group row in_field no-border p-0">
    <label for="title" class="col-md-3 col-form-label"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;Title</label>
    <div class="col-md-9 input_f">
        <input type="text" class="in form-control-plaintext input-small" id="title" name="title" value="{{ !empty($activity_data->title) ? $activity_data->title: '' }}" {{ $action_type == 'view' || $action_type == 'reply' ? 'readonly' : '' }}>
    </div>

    @if($action_type == 'reply')
    <input type="hidden" name="policy_id" value="{{ encrypt($activity_data->policy_id) }}">
    @else
    <label for="user_type_id" class="col-md-3 col-form-label"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;Policy</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'view')
            @foreach($policies as $policy)
                @if($activity_data->policy_id == $policy->id)
                    <input type="text" class="in form-control-plaintext input-small" id="policy_id" name="policy_id" value="{{$policy->policy_number}}" readonly>
                @else
                    <input type="text" class="in form-control-plaintext input-small" id="policy_id" name="policy_id" value="" readonly>
                @endif
            @endforeach
        @else
        <select id="policy_id" class="in form-control input-small" name="policy_id">
            <option value="">Select Policy</option>
            @foreach($policies as $policy)
            <option value="{{ encrypt($policy->id) }}" {{ !empty($activity_data->id) && $activity_data->policy_id == $policy->id ? 'selected' : '' }}>{{$policy->policy_number}}</option>
            @endforeach
        </select>
        @endif
    </div>
    @endif

    <label for="note" class="col-md-3 col-form-label"><i class="fa fa-align-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Description</label>
    <div class="col-md-9 input_f">
        @if($action_type == 'reply')
            <textarea type="text" class="in form-control-plaintext font-size-12" id="note" name="note"></textarea>
        @else
            <textarea type="text" class="in form-control-plaintext font-size-12" id="note" name="note">{!! !empty($activity_data->note) ? $activity_data->note: '' !!}</textarea>
        @endif
    </div>
    @if($action_type != 'view')
    <div class="col-md-12 text-center pt-3">
        <button class="btn btn-submit note_button" type="submit">
            @if($action_type == 'edit')
            UPDATE
            @elseif($action_type == 'reply')
            REPLY
            @else
            SAVE
            @endif
        </button>
    </div>
    @endif
</div>

@if($action_type == 'view')
<table class="table table-hover dataTable no-footer" id="table_notes" style="width: 100%;">
   <thead>
      <tr role="row">
        <th>Reply</th>
        <th>Reply By</th>
        <th>Reply At</th>
    </tr>
   </thead>
    <tbody>
        @foreach($note_reply as $nr)
        <tr role="row">
            <td>{{ $nr->note }}</td>
            <td>{{ $nr->name }}</td>
            <td>{{ date('m/d/Y h:i:s A', strtotime($nr->created_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif