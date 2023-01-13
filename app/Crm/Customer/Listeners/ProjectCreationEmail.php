<?php

namespace Crm\Customer\Listeners;

use Crm\Customer\Services\CustomerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Crm\Project\Events\ProjectCreation;

class ProjectCreationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private CustomerService $customerService)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProjectCreation  $event
     * @return void
     */
    public function handle(ProjectCreation $event)
    {
        $project = $event->getProject();
        $customer = $this->customerService->showById($project->customer_id);
        dd($project, $customer);
    }
}
