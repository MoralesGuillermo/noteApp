<?php

namespace controllers;

class NotesController{

    public function get(){
        $header = "Notes";
        $params = compact("header");
        return view("notes.view.php", $params);
    }
}
