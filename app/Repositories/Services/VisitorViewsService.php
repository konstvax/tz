<?php


namespace App\Repositories\Services;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Guest;

class VisitorViewsService
{

    /**
     * @param  Request  $request
     * @param  News  $singleNews
     */
    public static function scan(Request $request, News $singleNews): void
    {
        $sessionName = $singleNews->id.'-'.$request->getSession()->getId();
        $ip = $request->getClientIp();
        if (!Session::exists($sessionName)) {
            self::check($ip, $singleNews);
            Session::put($sessionName, $singleNews);
        }
        return;
    }

    /**
     * @param  string  $ip
     * @param  News  $singleNews
     */
    private static function check(string $ip, News $singleNews): void
    {
        $newsId = $singleNews->id;

        $guest = Guest::where([['news_id', '=', $newsId], ['ip_address', '=', $ip]])->first();

        if (!$guest) {
            $guest = new Guest();
            $guest->news_id = $newsId;
            $guest->ip_address = $ip;
            $guest->save();
//            //increment
            return;
        } else {
            if ($guest->updated_at->addMinutes(1) < Carbon::now()) {
                $guest->touch();
                return;
            }
        }
    }
}
