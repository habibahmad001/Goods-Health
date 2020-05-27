<div class="card_bg">
    <div class="col-lg-12 col-sm-12">
        <div class="card_dta">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-9 col-sm-12">
                        @if($request_type == 'inbox')
                        <p  class="col-12 text-primary font-size-18">From : <strong>{{ $data->f_name ? $data->f_name : $data->f_uname }}</strong> <span class="font-size-14">{{ $data->f_email ? '<'.$data->f_email.'>' : '' }}</span></p>
                        @elseif($request_type == 'sent')
                        <p  class="col-12 text-primary font-size-18">To : <strong>{{ $data->t_name ? $data->t_name : $data->t_uname }}</strong> <span class="font-size-14">{{ $data->t_email ? '<'.$data->t_email.'>' : '' }}</span></p>
                        @else
                        <p  class="col-12 text-primary font-size-18">From : <strong>{{ $data->f_name ? $data->f_name : $data->f_uname }}</strong> <span class="font-size-14">{{ $data->f_email ? '<'.$data->f_email.'>' : '' }}</span></p>
                        <p  class="col-12 text-primary font-size-18">To : <strong>{{ $data->t_name ? $data->t_name : $data->t_uname }}</strong> <span class="font-size-14">{{ $data->t_email ? '<'.$data->t_email.'>' : '' }}</span></p>
                        @endif
                        <p  class="col-12 text-primary font-size-12 mb-0">
                            CC : <strong>{{ $data->c_name ? $data->c_name : $data->c_uname }}</strong> <span class="font-size-12">{{ $data->c_email ? '<'.$data->c_email.'>' : '' }}</span><br>
                            BCC : <strong>{{ $data->b_name ? $data->b_name : $data->b_uname }}</strong> <span class="font-size-12">{{ $data->b_email ? '<'.$data->b_email.'>' : '' }}</span>
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <span class="text-primary font-size-12">{{ date('m/d/Y h:i:s a', strtotime($data->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card_bg">
    <div class="col-lg-12 col-sm-12">
        <div class="card_dta">
            <div class="card-body">
                <p  class="col-12 text-primary font-size-14 mb-0"><strong>Subject</strong> : {{ $data->subject }}</p>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card_bg no-border">
    <div class="col-lg-12 col-sm-12">
        <div class="card_dta">
            <div class="card-body">
                <p  class="col-12 text-primary font-size-14 mb-0">{{ $data->message }}</p>
            </div>
        </div>
    </div>
</div>
@if(!empty($data->file_name))
@php $file_names = json_decode($data->file_name); @endphp
<br>
<div class="card_bg no-border">
    <div class="col-lg-12 col-sm-12">
        <table class="table table-hover no-footer stripe" style="width: 100%;" role="grid">
            <tbody>
                @if($file_names)
                @foreach($file_names as $fn)
                <tr>
                    <td><span class="text-primary font-size-14">{{ $fn }}</span></td>
                    <td><a href="{{ asset('uploads/message_hub/'.$fn) }}" id="res_file_download" download> <i class="fa fa-download fa-lg"></i></a></td>
                </tr>  
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endif  