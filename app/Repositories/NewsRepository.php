<?php


namespace App\Repositories;

use App\Http\Requests\News\NewsCreateRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Models\News;
use App\Repositories\Services\UploadService;
use Carbon\Carbon;

/**
 * Class NewsRepository
 *
 * @package App\Repositories
 */
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
            case 'id':
                return 'id';
            default:
                return 'published_at';
        }
    }

    /**
     * @param  null  $perPage
     * @param  null  $byColumn
     * @return mixed
     */
    public function getListOfNewsWithPaginate($perPage = null, $byColumn = null)
    {
        $columns = [
            'id',
            'title',
            'views',
            'is_published',
            'published_at',
            'created_at',
            'updated_at',
        ];

        $result = $this->news
            ->select($columns)
            ->orderBy($this->order($byColumn), 'ASC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->news->find($id);
    }

    /**
     * @param $id
     * @param  NewsUpdateRequest  $request
     * @return mixed
     */
    public function prepareToUpdate($id, NewsUpdateRequest $request)
    {
        $data = $request->all();
        $news = $this->news->find($id);
        $news->image = UploadService::upload($request, $news);
        $news->published_at = $data['is_published'] == 1 ? Carbon::now() : null;

        return $news;
    }

    /**
     * @param  NewsCreateRequest  $request
     * @return News
     */
    public function createNews(NewsCreateRequest $request)
    {
        $data = $request->input();
        $news = $this->news;
        $news->title = $data['title'];
        $news->content = $data['content'];
        $news->is_published = isset($data['is_published']) ? (int) $data['is_published'] : 0;
        $news->image = UploadService::store($request);
        $news->published_at = $news->is_published == 1 ? Carbon::now() : null;
        $news->save();
        return $news;
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function forceDelete($id): ? bool
    {
        $result = $this->news->find($id);

        if ($result) {
            UploadService::deleteImage($result->image);
            return $result->forceDelete();
        }
        return null;
    }
}
