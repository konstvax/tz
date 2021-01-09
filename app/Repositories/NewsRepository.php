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
     * @return News
     */
    public function getSingleNews($id): News
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
            ->find($id);

        return $result;
    }

    /**
     * @param $by
     * @return string
     */
    private function order($by)
    {
        $by = trim($by, '/');
        switch ($by) {
            case 'by-date':
                return 'published_at';
            case 'by-rating':
                return 'title';
            default:
                return 'id';
        }
    }


}
