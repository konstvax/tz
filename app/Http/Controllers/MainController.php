<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = [1, 2, 3,];
        $title = 'Main page';
        return view('news.index', ['data' => $data, 'title' => $title]);
    }

    public function admin()
    {
        return 'admin panel';
    }
}
