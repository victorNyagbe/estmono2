<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\Discussion;

Class AdminDiscussionPending {

    public static function count()
    {
        $allDiscussions = Discussion::where('status', 0)->get();

        $discussionArray = [];

        $discussions = collect($discussionArray);

        if (count($allDiscussions) > 0) {
            foreach ($allDiscussions as $item)
            {
                if ($item->conversations()->latest()->limit(1)->value('person_status') == 'client') {

                    $discussionCreatedAt = $item->created_at;
                    $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

                    $timestamp1 = strtotime($discussionCreatedAt);
                    $timestamp2 = strtotime($getNow);

                    $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

                    if ($diffHour < 2) {
                        $discussionArray[] = $item;
                        $discussions = collect($discussionArray);
                    }
                }
            }
        }

        return $discussions->count();
    }
}

?>
