<?php

namespace controllers;

class AboutController{

    public function get(){
        $header = "About us";
        $params = compact("header");
        return view("about.view.php", $params);
    }
}
