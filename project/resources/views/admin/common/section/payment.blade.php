<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary">Payments</h4>
        <div class="pull-left-mob">
            <a data-toggle="collapse" href=".clps-payment_info" role="button" aria-expanded="true" aria-controls="payment_info">
                <i class="fa fa-sort-down"></i>
            </a>
        </div>
    </div>

    <div class="form-group-no-border collapse show clps-payment_info" id="payment">
        @include('admin.common.elements.payment_info')
    </div>
</div>

<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary">Payment History</h4>
        <div class="pull-left-mob">
            <a data-toggle="collapse" href=".clps-payment_history_tab" role="button" aria-expanded="true" aria-controls="payment_history_tab">
                <i class="fa fa-sort-down"></i>
            </a>
        </div>
    </div>

    <div class="form-group-no-border collapse show clps-payment_history_tab" id="payment_history_tab">
        <div class="col-lg-12 col-md-12 stretched_card">
            <div class="card no-border">
                <div class="table-responsive mt-10">
                    <table class="table table-hover text-left">
                        <input type="hidden" name="payment_history_offset" value="{{count($payment_history)}}">
                        <thead>
                            <tr class="py-lg-5">
                                <th  class="text-left no-border">Transaction No.</th>
                                <th class="text-center no-border">Date Paid</th>
                                <th class="text-center no-border">Date Posted   </th>
                                <th class="text-center no-border">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="payment_history">
                            @if(!$payment_history->isEmpty())
                            @foreach($payment_history as $ph)
                            <tr>
                                <td>
                                    {{$ph->transaction_number}}
                                </td>
                                <td class="text-center">{{$ph->created_at}}</td>
                                <td class="text-center">{{$ph->created_at}}</td>
                                <td class="text-center">${{$ph->amount}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    No payment history found!
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="profile_title text-right">
                    <a href="javascript:void(0)" class="text-red show_more_payment_history"> Show more </a>
                </div>
            </div>
        </div>
    </div>
</div>