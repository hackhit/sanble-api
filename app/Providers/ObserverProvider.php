<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \App\User::observe(\App\Observers\UserObserver::class);
        \App\Role::observe(\App\Observers\RoleObserver::class);
        \App\Fair::observe(\App\Observers\FairObserver::class);
        \App\Invitation::observe(\App\Observers\InvitationObserver::class);
        \App\Photography::observe(\App\Observers\PhotographyObserver::class);
        \App\Request::observe(\App\Observers\RequestObserver::class);
        \App\Stand::observe(\App\Observers\StandObserver::class);
        \App\Item::observe(\App\Observers\ItemObserver::class);
        \App\ReviewStand::observe(\App\Observers\ReviewStandObserver::class);
        \App\ReviewFair::observe(\App\Observers\ReviewFairObserver::class);
        \App\AdFair::observe(\App\Observers\AdFairObserver::class);
        \App\AdStand::observe(\App\Observers\AdStandObserver::class);
        \App\Promotion::observe(\App\Observers\PromotionObserver::class);
    }
}
