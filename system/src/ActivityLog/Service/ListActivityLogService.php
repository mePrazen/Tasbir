<?php

namespace Src\ActivityLog\Service;

use Src\ActivityLog\Interface\ActivityLogRepositoryInterface;

class ListActivityLogService
{

    public function __construct(public ActivityLogRepositoryInterface $activityLogRepository)
    {
    }

    public function listActivityLog()
    {



    }
}
