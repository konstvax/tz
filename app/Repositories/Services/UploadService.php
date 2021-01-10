<?php


namespace App\Repositories\Services;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class UploadService
 * @package App\Repositories\Services
 */
class UploadService
{
    const PATH_PUBLIC_DIRECTORY = 'public/';

    const PATH_STORED_DIRECTOR = 'storage/';

    /**
     * @param  Request  $request
     * @param  News  $news
     * @return string
     */
    public static function upload(Request $request, News $news): string
    {
        $file = $request->file('picture');
        if ($file) {
            return self::parsePicture($file, $news);
        } else {
            return self::getPathToFile($news);
        }
    }

    /**
     * @param $file
     * @param $news
     * @return string
     */
    private static function parsePicture($file, $news): string
    {
        if ($fileStored = $file->store('public/images')) {
            self::destroyOldPictureIfExists($news->image);

            return self::getStoredPath($fileStored);
        }
        return $news->image;
    }

    /**
     * @param $image
     */
    private static function destroyOldPictureIfExists($image): void
    {
        if (Storage::disk('local')->exists(self::getPublicPath($image))) {
            Storage::delete(self::getPublicPath($image));
        }
    }

    /**
     * @param  News  $news
     * @return string|null
     */
    private static function getPathToFile(News $news): ?string
    {
        if ($news->image != '') {
            $publicPath = self::getPublicPath($news->image);
            $allFiles = Storage::files('public/images/');
            foreach ($allFiles as $fileInDirectory) {
                if ($fileInDirectory === $publicPath) {
                    return $news->image;
                }
            }
        }
        return false;
    }

    /**
     * @param $pathFromColumnDB
     * @return string|null
     */
    private static function getPublicPath($pathFromColumnDB): ?string
    {
        return str_replace(self::PATH_STORED_DIRECTOR, self::PATH_PUBLIC_DIRECTORY, $pathFromColumnDB);
    }


    /**
     * @param  string  $pathFromPublic
     * @return string
     */
    private static function getStoredPath(string $pathFromPublic): string
    {
        return str_replace(self::PATH_PUBLIC_DIRECTORY, self::PATH_STORED_DIRECTOR, $pathFromPublic);
    }
}
