<?php

namespace Src\AdminUser\DTO\Request\ActivityLog;

use Src\Shared\DTO\Constructor;

class LogAdminActivityDTO extends Constructor
{

    public string $description;
    public string $activityType;
    public string $ipAddress;
    public string $objectId;
    public string $modifierId;
    public string $modifierUsername;

}
