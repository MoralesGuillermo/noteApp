<?php

namespace controllers;

class HomeController{

    public function home(){
        $header = "Home";
        $params = compact("header");
        return view("index.view.php", $params);
    }
}
