<!DOCTYPE html>
<html lang="en" >
    <head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Goods insured">
		<title>Goods insured</title>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datepicker/gijgo.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">

        @stack('links')
    </head>

    <div class="vz_main_sec">
        @include('admin.common.elements.main-header')
        @include('admin.common.navigation.main-menu')
        <div class="vz_main_container">
            <div class="vz_main_content">
                <div id="gi-overlay" class="gi-overlay-dark">
                    <div class="spinner-border-sr"></div>
                </div>
                    <div class="alert alert-success alert-shadow gi-alert-success">
                        <strong>Success!</strong>
                    </div>
                    <div class="alert alert-danger alert-shadow gi-alert-error">
                        <strong>Success!</strong>
                    </div>
                @yield('content')
                @include('admin.common.popup.calendar-popup')
                @include('admin.common.popup.task-event-popup')
    		</div>
    	</div>
        <footer>
            <div class="footer-area">
                <p>© GOODINSURED | HEALTHSHOP {{date("Y")}}</p>
            </div>
        </footer>
    </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datepicker/gijgo.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.4/tinymce.min.js'></script>
<script>
    var is_iPad = navigator.userAgent.match(/iPad/i) != null;
    
    window.mobilecheck = function() {
        var check = false;

        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    };

    var mobile_var = mobilecheck();

    if(mobile_var == true || is_iPad == true){
        $(".dynamic_logo").removeClass('dropdown-menu');
        $(".dynamic_logo_mobile").addClass('dropdown-menu');

        $('#sidebar').toggleClass('active');
        $(".menu-collapsed").toggleClass('d-none');
        $(".dynamic_body_width").toggleClass('content_body_dynamic');
        $(".search-field").toggleClass('search_collapsed_left_margin');
        $(".alter_logo").attr("src", "../images/GI.png");
        $(".alter_logo1").attr("src", "../images/GI.png");
    }

    $(document).ready(function () {
        $('.sidebarCollapse').on('click', function () {
            $('.vz_navbar').toggleClass('navbar-collapsed');
            $('#sidebar').toggleClass('active');
            $(".menu-collapsed").toggleClass('d-none');
            $(".dynamic_body_width").toggleClass('content_body_dynamic');
            $(".search-field").toggleClass('search_collapsed_left_margin');
            src= $(".img_collapse").attr("src");
            if(src.includes('collapse_new.png')){
                $(".img_collapse").attr("src", "{{ asset('images/sidebar/collapse_next_new.png') }}");
                $(".img_collapse_mobile").attr("src", "{{ asset('images/sidebar/collapse_next_mobile.png') }}");
                $(".alter_logo").attr("src", "{{ asset('images/GI.png') }}");
                $(".alter_logo1").attr("src", "{{ asset('images/hi_logo_small.png') }}");
            }else{
                $(".img_collapse").attr("src", "{{ asset('images/sidebar/collapse_new.png') }}");
                $(".img_collapse_mobile").attr("src", "{{ asset('images/sidebar/collapse_mobile.png') }}");
                $(".alter_logo").attr("src", "{{ asset('images/GI.png') }}");
                $(".alter_logo1").attr("src", "{{ asset('images/healths_insured_logo.png') }}");
            }
        });

        $(".top_menu").click(function(){
            $(this).find(".sub_menu").slideToggle("slow");
            $(this).find(".caret_css").toggleClass('fa-caret-down fa-caret-right');
        });
    });



    $(function() {
        $(".expand").on( "click", function() {
            $(this).next().slideToggle(200);
            $expand = $(this).find(">:first-child");
    
            if($expand.text() == "+"){
                $expand.text("-");
            }else{
                $expand.text("+");
            }
        });

        $('.navbar-content').animate({
            scrollTop: $(".navbar-content li.active").offset().top - 470
        }, 200);
    });

    $('[name="first_question"]').on('change',function(){
        var first_question = $(this).val();
        if(first_question != "")
        {
            $("[name='second_question'] option[value='"+first_question+"']").remove();
        }  
    });

    $('[name="second_question"]').on('change',function(){
        var second_question = $(this).val();
        if(second_question != "")
        {
            $("[name='first_question'] option[value='"+second_question+"']").remove();
        }  
    });
</script>

@include('admin.common.js.common')
@include('admin.common.js.function')
@include('admin.common.js.calendar')

    @yield('extra-js')
    </body>
</html>
