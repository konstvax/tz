<?php

namespace App\Http\Controllers\GuestBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guestbook\GuestbookCreateRequest;
use App\Repositories\GuestbookRepository;

class GuestBookController extends Controller
{
    private $guestBookRepository;

    public function __construct()
    {
        $this->guestbookRepository = new GuestbookRepository();
    }

    public function index()
    {
        $users = $this->guestBookRepository->getAllPublishedWithPaginate(2);
        return view('guestbook.index', compact('users'));
    }

    /**
     * @param  GuestbookCreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GuestbookCreateRequest $request)
    {
        $saveMessage = $this->guestBookRepository->createCommentAndSave($request);
        if ($saveMessage) {
            return redirect()
                ->route('guest.index')
                ->with([
                    'success' => 'Your message has been successfully sent.
                    It will be published after verification by the administrator'
                ]);
        }
        return back()->withErrors(['msg' => 'Save error'])
            ->withInput();
    }
}
