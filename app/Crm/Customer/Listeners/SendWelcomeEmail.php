<?php

namespace Crm\Customer\Listeners;

use App\Events\CustomerCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CustomerCreation  $event
     * @return void
     */
    public function handle(CustomerCreation $event)
    {
        //
    }
}
