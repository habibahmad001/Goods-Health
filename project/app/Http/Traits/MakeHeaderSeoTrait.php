<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/8/2020
 * Time: 10:29 PM
 */

namespace App\Http\Traits;


trait MakeHeaderSeoTrait
{
    public $title;
    public $header;

    public function make_title($title)
    {
        $this->title = ucfirst($title);
    }

    public function make_header($name)
    {
        $this->header = ucfirst(str_replace("_", " ", str_replace("-", " ", $name) ) );
    }


    public function get_header_title($title, $name)
    {
        $this->make_title($title);
        $this->make_header($name);

        $data =  $this->title." | ".$this->header;

        return $data;
    }




}