<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers\News
 */
class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $single = $this->newsRepository->getSingleNews($id);
        $title = 'News of '.$single->id;
//        dd($singleNews->id);
        return view('news.single', ['news' => $single, 'title' => $title]);
    }
}
