<?php

namespace App\Http\Controllers\GuestBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guestbook\GuestbookCreateRequest;
use App\Repositories\GuestbookRepository;

/**
 * Class GuestBookController
 *
 * @package App\Http\Controllers\GuestBook
 */
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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
