<?php

namespace App\Listeners;

use App\Enums\SupportStatus;
use App\Events\SupportReplied;
use App\Services\SupportService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeStatusSupport
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected SupportService $supportService,
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SupportReplied $event): void
    {
        $support = $event->support();

        $this->supportService->updateStatus(
            $support->support_id,
            SupportStatus::P,
        );
    }
}
