<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Guestbook
 *
 * @package App\Models
 *
 * @property string $username
 * @property string $text
 * @property string $email
 * @property int $is_published
 * @property string $created_at
 * @property string $updated_at
 */
class Guestbook extends Model
{

    protected $fillable = [
        'username',
        'text',
        'email',
        'is_published',
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
