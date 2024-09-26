<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }
}