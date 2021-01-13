<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class News
 *
 * @package App\Models
 *
 * @property string $title
 * @@property string $content
 * @property int $is_published
 * @property string $published_at
 * @property string $created_at
 */
class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'is_published',
        'published_at',
    ];

    /**
     * @param  string  $format
     * @return string
     */
    public function getCreatedAt(string $format = 'Y:m:d h:m:i ')
    {
        return \Illuminate\Support\Carbon::parse($this->created_at)->format($format);
    }
}
