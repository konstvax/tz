<?php

namespace App\Http\Controllers\GuestBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        return view('guestbook.index');
    }
}
