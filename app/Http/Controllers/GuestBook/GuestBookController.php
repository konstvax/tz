<?php

namespace App\Http\Controllers\GuestBook;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        $users = Guestbook::paginate(2);
        return view('guestbook.index', compact('users'));
    }
}
