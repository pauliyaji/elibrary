<?php

namespace App\Providers;

use App\Listeners\AssignRoleForRegisteredUser;
use App\Models\Resource as ResourceModel;
use App\Models\ResourceCategory as ResourceCategoryModel;
use App\Models\User as UserModel;
use App\Observers\ResourceCategoryObserver;
use App\Observers\ResourceObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            AssignRoleForRegisteredUser::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        ResourceModel::observe(ResourceObserver::class);
        UserModel::observe(UserObserver::class);
        ResourceCategoryModel::observe(ResourceCategoryObserver::class);
    }
}
