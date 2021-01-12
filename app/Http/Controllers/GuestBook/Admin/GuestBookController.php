<?php

namespace App\Http\Controllers\GuestBook\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guestbook\GuestbookUpdateRequest;
use App\Repositories\GuestbookRepository;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    /**
     * @var GuestbookRepository
     */
    private $guestBookRepository;

    /**
     * GuestBookController constructor.
     */
    public function __construct()
    {
        $this->guestBookRepository = new GuestbookRepository();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $commentsList = $this->guestBookRepository->getListOfComment(8);
        return view('admin.guestbook.index', compact('commentsList'));
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
        $comment = $this->guestBookRepository->getCommentToEdit($id);
        return view('admin.guestbook.show', compact('comment'));
    }

    /**
     * @param  GuestbookUpdateRequest  $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GuestbookUpdateRequest $request, $id)
    {
        $data = $request->all();
        $comment = $this->guestBookRepository->prepareToUpdateComment($request, $id);
        if (!$comment) {
            return back()
                ->withErrors(['msg' => "Comment with id=$id not foud"])
                ->withInput();
        }

        $result = $comment->update($data);

        if ($comment) {
            return redirect()
                ->route('admin.guestbook.edit', $comment->id)
                ->with(['success' => 'Updated successfully']);
        }
        return back()
            ->withErrors(['msg' => 'Update error'])
            ->withInput();
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
