<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
    }

    public function index(Request $request)
    {
//        dd($request->ip());
        $news = $this->newsRepository->getAllPublishedWithPaginate(3);
        $title = 'Main page';
        return view('news.index', ['news' => $news, 'title' => $title]);
    }

    public function admin()
    {
        return 'admin panel';
    }
}
