<?php


namespace App\Repositories;

use App\Http\Requests\Guestbook\GuestbookCreateRequest;
use App\Models\Guestbook;

class GuestbookRepository
{
    /**
     * @var Guestbook
     */
    private $guestbook;

    /**
     * GuestbookRepository constructor.
     */
    public function __construct()
    {
        $this->guestbook = new Guestbook();
    }

    /**
     * @param  null  $perPage
     * @return mixed
     */
    public function getAllPublishedWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'username',
            'email',
            'text',
            'is_published',
            'created_at',
        ];

        $result = $this->guestbook
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param  GuestbookCreateRequest  $request
     * @return mixed
     */
    public function createCommentAndSave(GuestbookCreateRequest $request)
    {
        $data = $request->all();
        $result = $this->guestbook
            ->create($data);
        return $result;
    }

}
