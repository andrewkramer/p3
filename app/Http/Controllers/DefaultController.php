<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DefaultController extends Controller {

    /**
    * Responds to requests to GET /
    */
    public function getIndex() {
        return "Home Page";
    }

    /**
    * Responds to requests to POST /
    */
    public function postIndex() {
        return "Not allowed";
    }
}