<?php

namespace App\Observers;

use App\Models\Resource;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class ResourceObserver
{
    public function created(Resource $resource): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($resource), $resource->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(Resource $resource): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($resource), $resource->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(Resource $resource): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($resource), $resource->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
