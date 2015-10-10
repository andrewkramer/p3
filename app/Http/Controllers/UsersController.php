<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UsersController extends Controller {

    /**
    * Responds to requests to GET /users
    */
    public function getIndex() {
        return view('users.index');
    }

    /**
    * Responds to requests to POST /users
    */
    public function postIndex() {
        return "Users Custom";
    }
}