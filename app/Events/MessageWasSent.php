<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageWasSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $channel;
    public $message;

    public function __construct($projectId, $message)
    {
        $this->channel = $projectId;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('project-' . $this->channel);
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
