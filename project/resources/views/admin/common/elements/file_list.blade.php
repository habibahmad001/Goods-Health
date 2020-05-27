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