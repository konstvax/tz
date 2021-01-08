<?php


namespace App\Repositories;

use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsRepository
{
    /**
     * @var News
     */
    private $news;

    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        $this->news = new News();
    }

    /**
     * @param  null  $perPage
     * @return LengthAwarePaginator
     */
    public function getAllPublishedWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'content',
            'image',
            'is_published',
            'published_at',
        ];

        $result = $this->news
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;
    }


}
