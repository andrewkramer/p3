<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PasswordController extends Controller {

    /**
    * Responds to requests to GET /password
    */
    public function getIndex() {
        return "XKCD Default";
    }

    /**
    * Responds to requests to POST /password
    */
    public function postIndex() {
        return "XKCD Custom";
    }
}