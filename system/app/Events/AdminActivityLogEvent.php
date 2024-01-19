<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Src\AdminUser\DTO\Request\ActivityLog\LogAdminActivityDTO;

class AdminActivityLogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public LogAdminActivityDTO $logAdminActivityDTO;

    /**
     * Create a new event instance.
     */
    public function __construct(string $description, string $objectId, string $activityType, string $ipAddress)
    {
        $adminActivityLog = LogAdminActivityDTO::from(
            [
                'description' => $description,
                'activityType' => $activityType,
                'objectId' => $objectId,
                'ipAddress' => $ipAddress,
                'modifierId' => Auth::guard('admin')->user()->getAuthIdentifier(),
                'modifierUsername' => Auth::guard('admin')->user()->name
            ]
        );

        $this->logAdminActivityDTO = $adminActivityLog;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
