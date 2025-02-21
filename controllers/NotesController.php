<?php

namespace controllers;

use services\database\MySqlDB;

class NotesController{

    public function get(){
        $header = "Notes";
        $database = $GLOBALS["database"];
        $notes = $this->getNotes($database);
        $params = compact("header", "notes");
        return view("notes.view.php", $params);
    }

    private function getNotes($database){
        $query = "SELECT title, content FROM note";
        return $database->query($query);
    }
}
