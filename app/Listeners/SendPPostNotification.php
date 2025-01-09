<?php

namespace App\Listeners;

use App\Events\PostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPPostNotification implements ShouldQueue
{
    public $connection = 'database';

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostNotification $event): void
    {
        Log::info("This if the event run");
    }
}
