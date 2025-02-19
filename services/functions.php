<?php

// Return the base path of a path
function basePath($path){
    return BASE_PATH . $path;
}

// Returns a view
function view($view, $params=[]){
    extract($params);
    require_once basePath("views". DIRECTORY_SEPARATOR . $view);
}

function newInstance($classname){
    return new $classname();
}

/** Shows an abort view given a HTTP code.
* The view must be created by the user
*/
$abort = function($code){
    http_response_code($code);
    view("{$code}.view.php");
};
