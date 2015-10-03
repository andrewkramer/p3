<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LipsumController extends Controller {

    /**
    * Responds to requests to GET /lipsum
    */
    public function getIndex() {
        return "Lorum Ipsum Default";
    }

    /**
    * Responds to requests to POST /lipsum
    */
    public function postIndex() {
        return "Lorum Ipsum Custom";
    }
}