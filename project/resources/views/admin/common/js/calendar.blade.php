<script>
    var eventSources = [];

   	$(document).on('click', '.open_calendar', function(e){
        e.preventDefault();

        eventSources = ["{{ route('admin.load_calendar_data', ['prefix' => Auth::user()->role->role_slug ]) }}"];

   		init_calender();

        window.setTimeout(calendar_click_today, 200);

        add_dropdown_to_calender_button('fc-cal_taskButton-button', 'Task');
        add_dropdown_to_calender_button('fc-cal_eventButton-button', 'Event');

        $('#main_calendar_popup').modal('show');
    });

    $(document).on('click', '.close_calendar_popup', function(){
   		destroy_calendar();

        $('.calendar_notification_list').css('display', 'none');
        $('#main_calendar_popup').modal('hide');
    });

	function init_calender(){
        var t_date_array = e_date_array = n_date_array = [];
		$('#calendar_section').fullCalendar({
    		editable: true,
    		customButtons: {
    			cal_notificationButton: {
      				text: 'Notification',
    			},
    			cal_taskButton: {
    				text: 'Task',
    			},
    			cal_eventButton: {
    				text: 'Event',
    			}
  			},
    		header: {
     			left:'today prev, title, next',
     			center:'',
     			right:'cal_notificationButton, cal_taskButton, cal_eventButton'
    		},
    		eventSources: eventSources,
            eventRender: function(event, element){
                if(event.n_type == 'notification'){
                    if($('.fc-day-top[data-date="' + event.start.format("YYYY-MM-DD") + '"] #notification_icon').length === 0){
                        $('.fc-day-top[data-date="' + event.start.format("YYYY-MM-DD") + '"]').append('<i class="fa fa-bell fa-lg mt-3 ml-2 mr-2" aria-hidden="true" style="color:#00c3ff" id="notification_icon"></i>');
                    }
                }

                if(event.n_type == 'task'){
                    if($('.fc-day-top[data-date="' + event.start.format("YYYY-MM-DD") + '"] #task_icon').length === 0){
                        $('.fc-day-top[data-date="' + event.start.format("YYYY-MM-DD") + '"]').append('<i class="fa fa-tasks fa-lg mt-3 ml-2 mr-2" aria-hidden="true" style="color:#1bc210" id="task_icon"></i>');
                    }
                }

                if(event.n_type == 'event'){
                    if($('.fc-day-top[data-date="' + event.start.format("YYYY-MM-DD") + '"] #event_icon').length === 0){
                        $('.fc-day-top[data-date="' + event.start.format("YYYY-MM-DD") + '"]').append('<i class="fa fa-building fa-lg mt-3 ml-2 mr-2" aria-hidden="true" style="color:#f705b3" id="event_icon"></i>');
                    }
                }

                element.find('.fc-title').parent().parent().html('+1 more');
            },
    		selectable: true,
    		selectHelper: true,
    		eventLimit: 1,
    		height: 550,
    		buttonText:{
    			today: 'Today',
				month: 'Month',
				week: 'Week',
				day: 'Day',
				list: 'List'
    		},
            eventLimitClick: function(info){
                load_calendar_notification_list(info.date.format());
            },
            eventClick: function(info){
                load_calendar_notification_list(info.start.format());
            },
            
            loading: function( isLoading, view ) {
                if(isLoading){
                    $('#event_icon, #task_icon, #notification_icon').remove();
                    $('#main_calendar_popup .fc-view').css('opacity', '0.4');
                    $('#main_calendar_popup .fc-view').append('<span class="spinner-border-div" style="margin-top:100px;"></span>');
                } else {
                    $('#main_calendar_popup .fc-view').css('opacity', '1');
                    $('.spinner-border-div').remove();
                }
            }
   		});
	}

	function destroy_calendar(){
		$('#calendar_section').fullCalendar('destroy');
        eventSources = [];
	}

	function calendar_click_today() {
		$('.fc-today-button').click();
	}

	function add_dropdown_to_calender_button(button_class, dropdown_for){
		$('.'+button_class).addClass('dropdown dropbtn');

		var dropdown = '<div class="dropdown-content"><a href="#" class="add_'+dropdown_for+'_to_user"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add '+dropdown_for+'</a><a href="#" class="show_'+dropdown_for+'_to_user"><i class="fa fa-eye" aria-hidden="true"></i> Show</a></div>';

		$('.'+button_class).append(dropdown);
	}

    $(document).on('click', '.add_Task_to_user', function(e){
        e.preventDefault();

        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('task'), 'action_from' => encrypt('calendar'), 'action_type' => 'add']) }}//";

        load_activity_popup_from(url, 'main_task_popup', 'form_TaskEventForm', 'task_title', 'Add Task');
    });

    $(document).on('click', '.edit_task_to_user', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('task_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('task'), 'action_from' => encrypt('calendar'), 'action_type' => 'edit']) }}/null/"+activity_id;

        load_activity_popup_from(url, 'main_task_popup', 'form_TaskEventForm', 'task_title', 'Edit Task');
    });

    $(document).on('click', '.view_task_to_user', function(e){
        e.preventDefault();

        var activity_id = $(this).data('task_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('task'), 'action_from' => encrypt('calendar'), 'action_type' => 'view']) }}/null/"+activity_id;

        load_activity_popup_from(url, 'main_task_popup', 'form_TaskEventForm', 'task_title', 'View Task');
    });

    $(document).on('click', '.delete_task_to_user', function(e){
        e.preventDefault();

        var activity_id = $(this).data('task_id');

        delete_activity_data(activity_id, 'task', 'calender');
    });

    $(document).on('click', '.add_Event_to_user', function(e){
        e.preventDefault();

        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('event'), 'action_from' => encrypt('calendar'), 'action_type' => 'add']) }}//";

        load_activity_popup_from(url, 'main_event_popup', 'form_TaskEventForm', 'event_title', 'Add Event');
    });

    $(document).on('click', '.edit_events_to_user', function(e){
        e.preventDefault();

        var activity_id = $(this).data('events_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('event'), 'action_from' => encrypt('calendar'), 'action_type' => 'edit']) }}/null/"+activity_id;

        load_activity_popup_from(url, 'main_event_popup', 'form_TaskEventForm', 'event_title', 'Edit Event');
    });

    $(document).on('click', '.view_events_to_user', function(e){
        e.preventDefault();

        var activity_id = $(this).data('events_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('event'), 'action_from' => encrypt('calendar'), 'action_type' => 'view']) }}/null/"+activity_id;

        load_activity_popup_from(url, 'main_event_popup', 'form_TaskEventForm', 'event_title', 'View Event');
    });

    $(document).on('click', '.delete_events_to_user', function(e){
        e.preventDefault();

        var activity_id = $(this).data('events_id');

        delete_activity_data(activity_id, 'event', 'calender');
    });

    function load_calendar_notification_list(date){
        $('#main_calendar_popup .calendar_notification_list').show();

        var keyword = $('#calendar_keyword').val() ? $('#calendar_keyword').val() : null;
        var module_id = $('#calendar_module_id').val() ? $('#calendar_module_id').val() : null;
        var show_n = $('.fc-cal_notificationButton-button').attr('data-show') == 0 ? 0 : 1;
        var show_t = $('.show_Task_to_user').attr('data-show') == 0 ? 0 : 1;
        var show_e = $('.show_Event_to_user').attr('data-show') == 0 ? 0 : 1;

        var url = "{{ route('admin.load_calender_notification_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+date+'/'+keyword+'/'+module_id+'/'+show_n+'/'+show_t+'/'+show_e;

        if($.fn.dataTable.isDataTable('#table_calendar_notification')){
            $('#table_calendar_notification').DataTable().destroy();
        }

        $('#table_calendar_notification').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
            },
            columns: [
                    { data: 'description', name: 'description' },
                    { data: 'n_type', name: 'n_type' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'schedule', name: 'schedule' },
                    { data: 'action', name: 'action' },
                ],
            order: [[1, 'desc']],
            autoWidth: true
        });
    }

    $(document).on('keyup', '#calendar_keyword', function(){
        $('#main_calendar_popup .calendar_notification_list').hide();

        var keyword = $(this).val() ? $(this).val() : null;
        var module_id = $('#calendar_module_id').val() ? $('#calendar_module_id').val() : null;
        var show_n = $('.fc-cal_notificationButton-button').attr('data-show') == 0 ? 0 : 1;
        var show_t = $('.show_Task_to_user').attr('data-show') == 0 ? 0 : 1;
        var show_e = $('.show_Event_to_user').attr('data-show') == 0 ? 0 : 1;

        $('#calendar_section').fullCalendar('removeEventSource', eventSources[0]);

        eventSources[0] = "{{ route('admin.load_calendar_data', ['prefix' => Auth::user()->role->role_slug ]) }}/"+keyword+'/'+module_id+'/'+show_n+'/'+show_t+'/'+show_e;

        $('#calendar_section').fullCalendar('addEventSource', eventSources[0]);
        $('#calendar_section').fullCalendar('refetchEvents');
    });

    $(document).on('change', '#calendar_module_id', function(){
        $('#main_calendar_popup .calendar_notification_list').hide();

        var module_id = $(this).val() ? $(this).val() : null;
        var keyword = $('#calendar_keyword').val() ? $('#calendar_keyword').val() : null;
        var show_n = $('.fc-cal_notificationButton-button').attr('data-show') == 0 ? 0 : 1;
        var show_t = $('.show_Task_to_user').attr('data-show') == 0 ? 0 : 1;
        var show_e = $('.show_Event_to_user').attr('data-show') == 0 ? 0 : 1;

        $('#calendar_section').fullCalendar('removeEventSource', eventSources[0]);

        eventSources[0] = "{{ route('admin.load_calendar_data', ['prefix' => Auth::user()->role->role_slug ]) }}/"+keyword+'/'+module_id+'/'+show_n+'/'+show_t+'/'+show_e;

        $('#calendar_section').fullCalendar('addEventSource', eventSources[0]);
        $('#calendar_section').fullCalendar('refetchEvents');
    });

    $(document).on('click', '.fc-cal_notificationButton-button', function(){
        $('#main_calendar_popup .calendar_notification_list').hide();

        var module_id = $('#calendar_module_id').val() ? $('#calendar_module_id').val() : null;
        var keyword = $('#calendar_keyword').val() ? $('#calendar_keyword').val() : null;

        if($(this).attr('data-show') == 0){
            var show_n = 1;
            $(this).attr('data-show', show_n);
            $(this).css('opacity', '1');
        }else{
            var show_n = 0;
            $(this).attr('data-show', show_n);
            $(this).css('opacity', '0.4');
        }
        
        var show_t = $('.show_Task_to_user').attr('data-show') == 0 ? 0 : 1;
        var show_e = $('.show_Event_to_user').attr('data-show') == 0 ? 0 : 1;

        $('#calendar_section').fullCalendar('removeEventSource', eventSources[0]);

        eventSources[0] = "{{ route('admin.load_calendar_data', ['prefix' => Auth::user()->role->role_slug ]) }}/"+keyword+'/'+module_id+'/'+show_n+'/'+show_t+'/'+show_e;

        $('#calendar_section').fullCalendar('addEventSource', eventSources[0]);
        $('#calendar_section').fullCalendar('refetchEvents');
    });

    $(document).on('click', '.show_Task_to_user', function(e){
        e.preventDefault();

        $('#main_calendar_popup .calendar_notification_list').hide();

        var module_id = $('#calendar_module_id').val() ? $('#calendar_module_id').val() : null;
        var keyword = $('#calendar_keyword').val() ? $('#calendar_keyword').val() : null;

        if($(this).attr('data-show') == 0){
            var show_t = 1;
            $(this).attr('data-show', show_t);
            $(this).css('opacity', '1');
        }else{
            var show_t = 0;
            $(this).attr('data-show', show_t);
            $(this).css('opacity', '0.4');
        }
        
        var show_n = $('.fc-cal_notificationButton-button').attr('data-show') == 0 ? 0 : 1;
        var show_e = $('.show_Event_to_user').attr('data-show') == 0 ? 0 : 1;

        $('#calendar_section').fullCalendar('removeEventSource', eventSources[0]);

        eventSources[0] = "{{ route('admin.load_calendar_data', ['prefix' => Auth::user()->role->role_slug ]) }}/"+keyword+'/'+module_id+'/'+show_n+'/'+show_t+'/'+show_e;

        $('#calendar_section').fullCalendar('addEventSource', eventSources[0]);
        $('#calendar_section').fullCalendar('refetchEvents');
    });

    $(document).on('click', '.show_Event_to_user', function(e){
        e.preventDefault();

        $('#main_calendar_popup .calendar_notification_list').hide();

        var module_id = $('#calendar_module_id').val() ? $('#calendar_module_id').val() : null;
        var keyword = $('#calendar_keyword').val() ? $('#calendar_keyword').val() : null;

        if($(this).attr('data-show') == 0){
            var show_e = 1;
            $(this).attr('data-show', show_e);
            $(this).css('opacity', '1');
        }else{
            var show_e = 0;
            $(this).attr('data-show', show_e);
            $(this).css('opacity', '0.4');
        }
        
        var show_n = $('.fc-cal_notificationButton-button').attr('data-show') == 0 ? 0 : 1;
        var show_t = $('.show_Task_to_user').attr('data-show') == 0 ? 0 : 1;

        $('#calendar_section').fullCalendar('removeEventSource', eventSources[0]);

        eventSources[0] = "{{ route('admin.load_calendar_data', ['prefix' => Auth::user()->role->role_slug ]) }}/"+keyword+'/'+module_id+'/'+show_n+'/'+show_t+'/'+show_e;

        $('#calendar_section').fullCalendar('addEventSource', eventSources[0]);
        $('#calendar_section').fullCalendar('refetchEvents');
    });
    
</script>