<?php

use App\Models\UserPlan;

function checkUserPlan($id)
{

    $getID = intval($id);
    $data =  UserPlan::query()
        ->where('plan_id', $getID)
        ->where('user_id', auth()->id())
        ->whereNull('cancelled_at')
        ->exists();
    return $data;
}















?>
