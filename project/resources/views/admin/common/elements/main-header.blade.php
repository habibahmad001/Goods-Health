<header class="vz_main_header flex-grow-1 top_nav">
  <div class="container-fluid d-flex flex-row h-100 align-items-center logo_left_margin" >
    <div class="text-center rt_nav_wrapper d-flex align-items-center">
      <!-- <a class="nav_logo rt_logo" href="http://162.252.56.37/goodinsured/public/admin/index"><img src="http://162.252.56.37/goodinsured/public/images/logo-light-icon.png" alt="logo"/></a>-->
      <!-- <a class="nav_logo nav_logo_mob" href="http://162.252.56.37/goodinsured/public/admin/index"><img src="http://162.252.56.37/goodinsured/public/images/Goodinsured.png" alt="logo"/></a> -->
      <!-- <button type="button" id="sidebarCollapse" class="btn btn-info">
      <i class="fas fa-align-left"></i>
      <span>Toggle Sidebar</span>
    </button> -->
    <!-- <div id="" class="hide_on_mobile sidebarCollapse">
    <img src="../images/sidebar/collapse.png" alt="collapse.png" style="margin-right: 15px;" class="img_collapse">
  </div>
  <div id="" class="show_on_mobile sidebarCollapse" style="display: none;">
  <img src="../images/sidebar/collapse_mobile.png" alt="collapse_mobile.png" style="margin-right: 15px;" class="img_collapse_mobile">
</div> -->

<!--code for logo-->

<!-- <button type="button" class="" data-toggle="dropdown"> -->


  <img src="{{ asset('images/GI.png') }}" alt="logo" style="width:91px;height:26px;" class="">

  <!-- <span class="glyphicon glyphicon-chevron-down" style="margin-left: 9px;"></span> -->
<!-- </button> -->

<ul class="dropdown-menu">
  <!-- <li class="dropdown-header">Member name (you)</li> -->
  <li class="hide_on_mobile" style="margin-left: -13%;">
    <a href="#" title="Select this card"><img src="{{ asset('images/healths_insured_logo.png') }}" class="alter_logo1"></a>
  </li>

  <li class="li_show_on_mobile" style="display: none;"><br>
    <a href="#"><img src="{{ asset('images/gi_logo_small_with_background.png') }}" class="left_margin_ipad_portrait_logo1" style="margin-left: -12%; margin-top: 2%;"></a>
  </li>
  <li class="li_show_on_mobile" style="display: none; margin-top: 5px;">
    <a href="#"><img src="{{ asset('images/hi_logo_small.png') }}" class="left_margin_ipad_portrait_logo2" style="margin-left: -19%; margin-top: 2%;"></a>
  </li>
  <li class="li_show_on_mobile" style="display: none; margin-top: 5px;">
    <button class="btn red_btn_gradient left_margin_ipad_portrait_request_btn" style="background-color: #cc0000; color: #ffffff; margin-left: -16%;">REQUEST FOR QUOTE</button>
  </li>
  <li class="li_show_on_mobile" style="display: none; margin-top: -4%;">
    <br>
    <div class="input-group left_margin_ipad_portrait_search_input" style="margin-left: -16.5%;">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="feather ft-search"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="search" style="width: 16px;">
    </div>
  </li>
</ul>

</div>
<div class="nav_wrapper_main d-flex align-items-center justify-content-between flex-grow-1">
  <!-- <a class="vz_mobile_menu_icon mr-3 d-md-flex d_none_sm" id="vz_mobileCollapseIcon" href="javascript:void(0)"><span></span></a> -->

  <ul class="navbar-nav navbar-nav-left mr-0 left_position_mobile">

    <li  style="height:68px; "class="nav-item d_none_sm col-md-offset-3 active" "=" ">
      <a  style = "margin-top: 24px;" class="nav-link count-indicator dropdown-toggle " href="#">
        <p><img src="{{ asset('images/Goodinsured.png') }}" alt="logo"  class=" dropdown-toggle fifi" ></p>
        <span> Goods Insured </span>
      </a>
    </li>
    <li class="nav-item d_none_sm">
      <a class="nav-link count-indicator dropdown-toggle" href="#">
        <p><img src="{{ asset('images/hi1.png') }}" alt="logo"  class=" dropdown-toggle"></p>
        <span> Healths Insured </span>


      </a>
    </li>
    <li class="vl"></li>
    <li class="nav-item d_none_sm">
      <a class="nav-link count-indicator dropdown-toggle" href="#">
       <p> <img src="{{ asset('images/hr1.png') }}" alt="logo"  class=" dropdown-toggle bif"></p>
        <span> HR Insured </span>
        <img src="{{ asset('images/lock.png') }}" class="show_on_mobile" >

      </a>
    </li>
    <li class="nav-item d_none_sm">
      <a class="nav-link count-indicator dropdown-toggle" href="#">
       <p> <img src="{{ asset('images/chat1.png') }}" alt="logo" class=" dropdown-toggle  chat"></p>
        <span> Team chat </span>
        <img src="{{ asset('images/lock.png') }}" class="show_on_mobile" >

      </a>
    </li>
     <li class="nav-item d_none_sm special">
      <a class="nav-link count-indicator dropdown-toggle" href="#">



      </a>
    </li>
  </ul>

  <ul class="navbar-nav navbar-nav-right mr-0 ml-auto left_position_mobile" style="position: relative; left: 57px;">

    <li class="nav-item dropdown">

      <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2 dropdown-menu dropdown-menu-right navbar-dropdown rt-notification-list" aria-labelledby="profileDropdown">
      <div class="profile_edit_notification notification_message">
        <div class="dropdown-item">
          <p class="mb-0 font-weight-normal float-left">You have 3 New Messages</p>
          <a href="#" class="view_btn" style="margin-left: 7px;">view all</a>
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item rt-notification-item">
          <div class="rt-notification-thumbnail">
            <img src="header_1_files/author-img1.jpg" class="profile-pic" alt="image">
          </div>
          <div class="rt-notification-item-content flex-grow">
            <h6 class="rt-notification-subject ellipsis font-weight-medium">Jhon Doe
              <span class="float-right font-weight-light small-text">3:15 PM</span>
            </h6>
            <p class="font-weight-light small-text">
              Hello are you there?
            </p>
          </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item rt-notification-item">
          <div class="rt-notification-thumbnail">
            <img src="header_1_files/author-img2.jpg" class="profile-pic" alt="image">
          </div>
          <div class="rt-notification-item-content flex-grow">
            <h6 class="rt-notification-subject ellipsis font-weight-medium">David Boos
              <span class="float-right font-weight-light small-text">1:25 PM</span>
            </h6>
            <p class="font-weight-light small-text">
              Waiting for your Response...
            </p>
          </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item rt-notification-item">
          <div class="rt-notification-thumbnail">
            <img src="header_1_files/user.jpg" class="profile-pic" alt="image">
          </div>
          <div class="rt-notification-item-content flex-grow">
            <h6 class="rt-notification-subject ellipsis font-weight-medium"> Jason Roy
              <span class="float-right font-weight-light small-text">5:21 PM</span>
            </h6>
            <p class="font-weight-light small-text">
              Hi there, Hope you are well
            </p>
          </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item rt-notification-item">
          <div class="rt-notification-thumbnail">
            <img src="header_1_files/author-img3.jpg" class="profile-pic" alt="image">
          </div>
          <div class="rt-notification-item-content flex-grow">
            <h6 class="rt-notification-subject ellipsis font-weight-medium"> Malika Roy
              <span class="float-right font-weight-light small-text">2:30 PM</span>
            </h6>
            <p class="font-weight-light small-text">
              Your Product Dispatched ...
            </p>
          </div>
        </a>
      </div></div>
    </li>
       <li class="nav-item d_none_sm">
      <a class="nav-link count-indicator dropdown-toggle open_calendar sprt" href="#">QUOTE</a>
    </li>
    <li class="nav-item d_none_sm">
      <a class="nav-link count-indicator dropdown-toggle open_calendar" href="#">
        <i class="fa fa-calendar mx-0 mobile_size" style="width: 15px;height:15px;"></i>
        <img src="{{ asset('images/notifications_mobile.png') }}" class="show_on_mobile" style=" width:10px;height:10px; ">

      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
      <!-- <i class="fa fa-bell mobile_size" style="width: 15px;height:15px;"></i> -->
      <img src="{{ asset('images/notifications.png') }}" style="width: 15px;height:15px;" class="hide_on_mobile">
      <img src="{{ asset('images/notifications_mobile.png') }}" class="show_on_mobile" style=" width:10px;height:10px; ">
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2" aria-labelledby="profileDropdown">
    <div class="profile_edit_notification">
      <div class="dropdown-item">
        <p class="mb-0 font-weight-normal float-left">You have 3 new notifications</p>
        <a href="#" class="view_btn" style="margin-left: 7px;">view all</a>
      </div>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item rt-notification-item">
        <div class="rt-notification-thumbnail">
          <div class="rt-notification-icon">
            <i class="ti-map-alt text-info mx-0"></i>
          </div>
        </div>
        <div class="rt-notification-item-content">
          <h6 class="rt-notification-subject text-info font-weight-normal mb-1">You added your Location</h6>
          <p class="font-weight-light small-text mb-0">
            Just now
          </p>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item rt-notification-item">
        <div class="rt-notification-thumbnail">
          <div class="rt-notification-icon">
            <i class="ti-bolt-alt text-primary mx-0"></i>
          </div>
        </div>
        <div class="rt-notification-item-content">
          <h6 class="rt-notification-subject font-weight-normal text-primary mb-1">Your Subscription Expired</h6>
          <p class="font-weight-light small-text mb-0">
            30 Seconds ago
          </p>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item rt-notification-item">
        <div class="rt-notification-thumbnail">
          <div class="rt-notification-icon">
            <i class="ti-heart text-secondary mx-0"></i>
          </div>
        </div>
        <div class="rt-notification-item-content">
          <h6 class="rt-notification-subject text-secondary font-weight-normal mb-1">Some special like you</h6>
          <p class="font-weight-light small-text mb-0">
            Just Now
          </p>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item rt-notification-item">
        <div class="rt-notification-thumbnail">
          <div class="rt-notification-icon">
            <i class="ti-comments text-danger mx-0"></i>
          </div>
        </div>
        <div class="rt-notification-item-content">
          <h6 class="rt-notification-subject text-danger font-weight-normal mb-1">New Commetns On Post</h6>
          <p class="font-weight-light small-text mb-0">
            Just Now
          </p>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item rt-notification-item">
        <div class="rt-notification-thumbnail">
          <div class="rt-notification-icon">
            <i class="ti-settings text-success mx-0"></i>
          </div>
        </div>
        <div class="rt-notification-item-content">
          <h6 class="rt-notification-subject text-success font-weight-normal mb-1">You changed your Settings</h6>
          <p class="font-weight-light small-text mb-0">
            Just Now
          </p>
        </div>
      </a>
    </div></div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
    <img src="{{ asset('images/grayclock.png') }}" style="width: 17px;height:20px;" class="hide_on_mobile">
    <img src="{{ asset('images/clock_green_mobile.png') }}" class="show_on_mobile" style="display: none;">
  </a>
  <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2" aria-labelledby="profileDropdown">

  <div class="profile_edit_clock">

    <div class="row">
      <div class="col-sm-12">
        <div style="width: 90%; margin: auto; height: 40px; border: 1px solid #cccccc; margin-top: 10px; background-color: #f1f1f1; padding-top: 11px; padding-left: 6px; padding-right: 6px;">
          <span>Duration</span><span style="float: right;">00:00:00</span>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center top_margin">
            <a href="javascript:void(0)" class="save save1">Clockin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2" aria-labelledby="profileDropdown" style="display: none;">

<div class="profile_edit_clock">

  <div class="row">
    <div class="col-sm-12">
      <div style="width: 90%; margin: auto; height: 40px; border: 1px solid #cccccc; margin-top: 10px; background-color: #f1f1f1; padding-top: 11px; padding-left: 6px; padding-right: 6px;">
        <span>Duration</span><span style="float: right;">00:00:00</span>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center top_margin">
          <a href="javascript:void(0)" class="save save1 save2">Clockin</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</li>
<li class="nav-item nav-profile dropdown">
  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
    <span class="profile_sec right_position_ipad_landscape right_position_ipad_pro_portrait">
      <img src="{{ asset('images/sailor.png') }}" alt="profile">
      <div class="bottom-left" ></div>
      <div class="bottom-left"></div>
      <div class="bottom-left"></div>

      <!-- <span class="profile_name hide_on_ipad_landscape hide_on_ipad_pro_portrait">
      <span class="hi_name">Artest Admin</span>
      <i class="fa fa-caret-down"></i>
    </span> -->

  </span>
</a>
<div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2" aria-labelledby="profileDropdown">
<div class="profile_edit">
  <h2>
    <li>
      <img src="{{ asset('images/sailor.png') }}" alt="profile">
    </li>
    <li class="profile-user-name">Artest Admin
    </li>
  </h2>

  <div class="wrap_profile">

    <div class="li_show_on_mobile">
      <div class=" ">

        <ul id="myUL">
          <label class="in"><img src="{{ asset('images/products.png') }}" alt="" style="width:16px;height:16px;margin-left: 9px;"> &nbsp;Your Products<label class="caret"></label>
          <ul class="nested" style="margin-left:32px;">
            <li class="in" style="font-size:12px;margin-bottom:3px;">
              <img src="{{ asset('images/boat.png') }}" alt="" style="width:17px;height:20px;">&nbsp;&nbsp;
              Boat</li>
              <li style="font-size:11px;margin-bottom:8px;">
                <img src="{{ asset('images/mobile_home.png') }}" alt="" style="width:16px;height:19px;">&nbsp;&nbsp;Mobile Home</li>
                <li class="in" style="font-size:12px;margin-bottom:4px;">
                  <img src="{{ asset('images/b4.png') }}" alt="" style="width:12px;height:13px;">&nbsp;&nbsp;
                  Dental</li>
              </ul>
            </label>
          </ul>
          <hr>
        </div>
      </div>
      <div class="li_show_on_mobile">
        <div class=" ">

          <ul id="myUL">
            <label class="in"><img src="{{ asset('images/premium.png') }}" alt="" style="width:16px;height:16px;margin-left: 9px;"> &nbsp;&nbsp;Premium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="caret"></label>
            <ul class="nested" style="margin-left:32px;">

                <li style="font-size:11px;margin-bottom:2px;">
                  <img src="{{ asset('images/hr1.png') }}" alt="" style="width:16px;height:19px;">&nbsp;&nbsp;HRI</li>
                  <li class="in" style="font-size:12px;margin-bottom:3px;">
                    <img src="{{ asset('images/chat1.png') }}" alt="" style="width:17px;height:20px;">&nbsp;&nbsp;
                    Team chat</li>
                </ul>
              </label>
            </ul>
            <hr>
          </div>
        </div>

      <div class="li_show_on_mobile">

        <label>
           <img src="{{ asset('images/settings.png') }}" alt="" style="width:17px;height:20px;"> Settings </label><br>
        <label>   <img src="{{ asset('images/logout.png') }}" alt="" style="width:17px;height:20px;"> Logout </label>

      </div>

    </div>
  </div>
</div>
</li>
<li class="nav-item hide_on_mobile">
  &nbsp;&nbsp;
</li>
<li class="nav-item hide_on_mobile">
  &nbsp;
</li>
<li class="nav-item hide_on_mobile">
  &nbsp;
</li>
</ul>

<span class="d-lg-none">
  <a class="vz_mobile_menu_icon ml-3" id="vz_mobileCollapseIconMobile" href="javascript:"><span></span></a>
</span>
</div>
</div>
</header>
<script type="text/javascript">
// Treeview Initialization
var toggler = document.getElementsByClassName("caret");
var i;
for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    event.stopPropagation();

    this.classList.toggle("caret-down");
    toggler.classList.toggle("mystyle");

  });
}


</script>
