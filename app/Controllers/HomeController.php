<?php

namespace App\Controllers;

use App\Helpers\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        send_json($_SERVER);
    }
}
