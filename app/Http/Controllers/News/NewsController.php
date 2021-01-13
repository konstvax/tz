<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\Services\VisitorViewsService;
use Illuminate\Http\Request;

/**
 * Class NewsController
 *
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
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function index($id, Request $request)
    {
        $single = $this->newsRepository->getSingleNews($id);
        if ($single) {
            VisitorViewsService::scan($request, $single);
            $title = 'News of '.$single->id;
            return view('news.single', ['news' => $single, 'title' => $title]);
        }
        return abort(404);
    }
}
