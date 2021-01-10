<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Repositories\NewsRepository;
use App\Repositories\Services\UploadService;
use Illuminate\Http\Request;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsList = $this->newsRepository->getListOfNewsWithPaginate(8, 'id');
        return view('admin.news.index', compact('newsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $src = Storage::url('images/my_photo.jpg');

//        dd(Storage::disk('local')->exists('public/images/my_photo.jpg'));
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
        $news = $this->newsRepository->getEdit($id);
        if (!$news) {
            return back()
                ->withErrors(['msg' => "Record with id={$id} not found"])
                ->withInput();
        }
        $data = $request->all();
        $news->image = UploadService::upload($request, $news);
        $result = $news->update($data);

        if ($result) {
            return redirect()
                ->route('admin.news.edit', $news->id)
                ->with(['success' => 'updated successfully']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error'])
                ->withInput();;
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
