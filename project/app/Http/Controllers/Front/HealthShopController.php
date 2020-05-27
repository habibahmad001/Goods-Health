<?php

namespace App\Http\Controllers\Front;

use App\Http\Traits\MakeHeaderSeoTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthShopController extends Controller
{
    use MakeHeaderSeoTrait;

    public $header_title;

    public function __construct()
    {
        $this->header_title = "healthinsured";
    }

    public function index(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "home");
        return view('home.healthshop.pages.index', $data);
    }

    public function about(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "about");
        return view('home.healthshop.pages.about', $data);
    }

    public function contact(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "contact");
        return view('home.healthshop.pages.contact', $data);
    }

    public function health(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "health");
        return view('home.healthshop.pages.health', $data);
    }

    public function life(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "life");
        return view('home.healthshop.pages.life', $data);
    }

    public function vision(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "vision");
        return view('home.healthshop.pages.vision', $data);
    }

    public function dental(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "dental");
        return view('home.healthshop.pages.dental', $data);
    }

    public function medicare(){

        $data['landing_site']= $this->header_title;
        $data['title'] = $this->get_header_title($this->header_title, "medicare");
        return view('home.healthshop.pages.medicare', $data);
    }

}
