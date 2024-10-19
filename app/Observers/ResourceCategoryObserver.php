<?php

namespace App\Observers;

use App\Models\ResourceCategory;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class ResourceCategoryObserver
{
    public function created(ResourceCategory $resourceCategory): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($resourceCategory), $resourceCategory->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(ResourceCategory $resourceCategory): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($resourceCategory), $resourceCategory->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(ResourceCategory $resourceCategory): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($resourceCategory), $resourceCategory->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
