<?php

namespace Site\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Site\Events\BusinessRegistered;
use Site\Events\CompanyActivated;
use Site\Events\CustomerOrdered;
use Site\Events\NfeXMLUploaded;
use Site\Events\PaymentStatusChange;
use Site\Listeners\NewCompanyAccount;
use Site\Listeners\NotifyCompanyAgent;
use Site\Listeners\NotifyCompanyConfirmation;
use Site\Listeners\NotifyCustomerOrdered;
use Site\Listeners\NotifyUserPaymentUpdated;
use Site\Listeners\SendInteconNotification;
use Site\Listeners\NewCompanyAlert;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
