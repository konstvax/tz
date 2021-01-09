<?php


namespace App\Repositories;

use App\Models\News;

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
     * @param  string|null  $byColumn
     * @return mixed
     */
    public function getAllPublishedWithPaginate($perPage = null, $byColumn = null)
    {
        $columns = [
            'id',
            'title',
            'image',
            'views',
            'is_published',
            'published_at',
        ];

        $result = $this->news
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy($this->order($byColumn), 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSingleNews($id)
    {
        $columns = [
            'id',
            'title',
            'content',
            'image',
            'views',
            'is_published',
            'published_at',
        ];

        $result = $this->news
            ->where([['is_published', '=', 1], ['id', '=', $id]])
            ->first();

        return $result;
    }

    /**
     * @param $by
     * @return string
     */
    private function order($by): string
    {
        $by = trim($by, '/');
        switch ($by) {
            case 'by-rating':
                return 'views';
            case 'by-date':
            default:
                return 'published_at';
        }
    }


}
