<?php

namespace App\Http\Controllers\Front;

use App\Http\Traits\MakeHeaderSeoTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodInsuredController extends Controller
{
    use MakeHeaderSeoTrait;

    public $header_title;

    public function __construct()
    {
        $this->header_title = "goodinsured";
    }

    public function index(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "home");
        return view('home.goodinsured.pages.index', $data);
    }

    public function about(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "about");
        return view('home.goodinsured.pages.about', $data);
    }

    public function contact(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "contact");
        return view('home.goodinsured.pages.contact', $data);
    }

    public function business_owner(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "business_owner");
        return view('home.goodinsured.pages.business_owner', $data);
    }

    public function general_liability(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "general_liability");
        return view('home.goodinsured.pages.general_liability', $data);
    }

    public function professional_liability(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "professional_liability");
        return view('home.goodinsured.pages.professional_liability', $data);
    }

    public function workers_compensation(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "workers_compensation");
        return view('home.goodinsured.pages.workers_compensation', $data);
    }

    public function commercial_auto(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "commercial_auto");
        return view('home.goodinsured.pages.commercial_auto', $data);
    }

    public function collection_auto(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "collection_auto");
        return view('home.goodinsured.pages.collection_auto', $data);
    }

    public function condo(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "condo");
        return view('home.goodinsured.pages.condo', $data);
    }

    public function rideshare(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "rideshare");
        return view('home.goodinsured.pages.rideshare', $data);
    }

    public function renters(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "renters");
        return view('home.goodinsured.pages.renters', $data);
    }

    public function pets(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "pet");
        return view('home.goodinsured.pages.pets', $data);
    }

    public function homeowners(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "homeowners");
        return view('home.goodinsured.pages.homeowners', $data);
    }

    public function auto(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "auto");
        return view('home.goodinsured.pages.auto', $data);
    }

    public function motorcycle(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "motorcycle");
        return view('home.goodinsured.pages.motorcycle', $data);
    }
    public function trailer(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "trailer");
        return view('home.goodinsured.pages.trailer', $data);
    }

    public function atv(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "atv");
        return view('home.goodinsured.pages.atv', $data);
    }

    public function rv(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "rv");
        return view('home.goodinsured.pages.rv', $data);
    }

    public function flood(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "flood");
        return view('home.goodinsured.pages.flood', $data);
    }

    public function mobile_home(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "mobile_home");
        return view('home.goodinsured.pages.mobile_home', $data);
    }

    public function boat(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "boat");
        return view('home.goodinsured.pages.boat', $data);
    }


}
