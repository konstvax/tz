<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * @var NewsRepository
     */
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
