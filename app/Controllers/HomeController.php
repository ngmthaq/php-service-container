<?php

namespace App\Controllers;

class HomeController extends Controller implements HomeControllerContract
{
    public function index()
    {
        dd($_SERVER);
    }
}
