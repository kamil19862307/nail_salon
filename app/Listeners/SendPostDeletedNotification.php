<?php

namespace App\Listeners;

use App\Events\PostDeletedEvent;
use App\Notifications\PostDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostDeletedNotification
{
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
    public function handle(PostDeletedEvent $event): void
    {
        $event->user->notify(new PostDeleted($event->postTitle, $event->author));
    }
}
