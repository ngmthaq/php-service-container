<?php

namespace App\Controllers;

class HomeController extends Controller implements HomeControllerContract
{
    public function index()
    {
        send_json($_SERVER);
    }
}
