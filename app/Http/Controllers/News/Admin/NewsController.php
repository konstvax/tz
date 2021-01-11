<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsCreateRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Repositories\NewsRepository;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $newsList = $this->newsRepository->getListOfNewsWithPaginate(8, 'id');
        return view('admin.news.index', compact('newsList'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * @param  NewsCreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsCreateRequest $request)
    {
        $news = $this->newsRepository->createNews($request);
        if ($news) {
            return redirect()
                ->route('admin.news.edit', [$news->id])
                ->with(['success' => 'Successfully created']);
        }
        return back()->withErrors(['msg' => 'Save error'])
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $news = $this->newsRepository->getEdit($id);

        return view('admin.news.show', compact('news'));
    }

    /**
     * @param  NewsUpdateRequest  $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $news = $this->newsRepository->prepareToUpdate($id, $request);
        if (!$news) {
            return back()
                ->withErrors(['msg' => "Record with id={$id} not found"])
                ->withInput();
        }
        $data = $request->all();
        $result = $news->update($data);

        if ($result) {
            return redirect()
                ->route('admin.news.edit', $news->id)
                ->with(['success' => 'updated successfully']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
