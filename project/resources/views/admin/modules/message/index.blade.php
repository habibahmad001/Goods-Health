@extends('layout')

@section('content')

        <br>
        <div class="card_bg">
            <div class="col-lg-3 col-sm-12">
                <div class="card_dta">
                    <div class="card-body">
                        @if(in_array(4, $global_permission))
                        <a class="btn btn-primary btn-block mb-3 tabcomplete" id="message-hub-compose" href="javascript:void(0);">COMPOSE MAIL <i class="fa fa-plus"></i></a>
                        @endif
                        <ul class="list-unstyled mail_tabs">
                            <li class="mail_tab_li" id="message-hub-inbox">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-inbox"></i> Inbox 
                                </a>
                            </li>
                            @if(in_array(4, $global_permission))
                            <li class="mail_tab_li" id="message-hub-sent">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-send-o"></i> Sent
                                </a>
                            </li>
                            <li class="mail_tab_li" id="message-hub-draft">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-edit"></i> Drafts 
                                </a>
                            </li>
                            @endif
                            <li class="mail_tab_li" id="message-hub-important">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-star-o"></i> Important
                                </a>
                            </li>
                            <li class="mail_tab_li" id="message-hub-trash">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-trash-o"></i> Trash
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 mt-mob-4 message-hub-div">
            </div>
        </div>

    @include('admin.common.popup.message-popup')
    
@endsection

@push('links')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('extra-js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    @include('admin.common.js.message')
@endsection
