<table class="table table-hover" style="width: 100%;">
    <thead>
        <th>Policy Number</th>
        <th>Policy Name</th>
        <th>Created Date</th>
        <th></th>
    </thead>
    <tbody>
    @foreach($policies as $list)
    <tr>
        <td>{{ $list->policy_number }}</th>
        <td>{{ $list->policy_name }}</th>
        <th>{{ $list->created_at }}</th>
        <th><button type="button" class="btn btn-primary bg-red btn-xs mb-2 tabcomplete cus_book_business add-report-claim" data-policy_id="{{ encrypt($list->id) }}"> <i class="fa fa-plus-circle"></i> Apply</button></th>
    </tr>
    @endforeach
    </tbody>
</table>