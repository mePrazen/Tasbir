<?php

namespace Src\ActivityLog\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Src\ActivityLog\Interface\ActivityLogRepositoryInterface;

class ActivityLogRepository implements ActivityLogRepositoryInterface
{

    public function getAllData()
    {
        return DB::table('activity_logs')
            ->where('modifierId', '=' , Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }
}
