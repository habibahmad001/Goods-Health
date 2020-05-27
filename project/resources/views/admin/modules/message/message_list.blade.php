<br>
<div class="col-lg-12 col-md-12 stretched_card">
    <div class="card no-border">
        <div class="table-responsive mt-10">
            <table class="table table-hover" id="table_message_hub" style="width: 100%;">
                <thead>
                <tr>
                    @if($request_for == 'inbox' || $request_for == 'important' || $request_for == 'trash')
                    <th>From</th>
                    @endif
                    @if($request_for == 'sent' || $request_for == 'draft' || $request_for == 'trash')
                    <th>To</th>
                    @endif
                    <th>Subject</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
