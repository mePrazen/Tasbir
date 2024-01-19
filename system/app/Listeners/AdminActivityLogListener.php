<?php

namespace App\Listeners;

use App\Events\AdminActivityLogEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminActivityLogListener
{
    /**
     * @param AdminActivityLogEvent $event
     * @return void
     */
    public function handle(AdminActivityLogEvent $event)
    {
        $activity = $event->logAdminActivityDTO;
        $time = Carbon::now()->toDateTimeString();
//        DB::beginTransaction();
        DB::table('admin_activity_logs')->insert([
            'description' => $activity->description,
            'activityType' => $activity->activityType,
            'ipAddress' => $activity->ipAddress,
            'modifierId' => $activity->modifierId,
            'modifierUsername' => $activity->modifierUsername,
            'objectId' => $activity->objectId,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
//        DB::commit();
    }
}
