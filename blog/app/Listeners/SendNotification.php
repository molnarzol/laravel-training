<?php

namespace App\Listeners;

use App\Events\MessageSenr;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotification
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
     * @param  MessageSenr  $event
     * @return void
     */
    public function handle(MessageSenr $event)
    {
        $contact_message = $event->message;
        Mail::send('email.contact-message-notification', ['contact_message' => $contact_message], function($m) use ($contact_message) {
            $m->from('test@test.com', 'Test');
            $m->to('admin@admin.com', 'Admin');
            $m->subject('New contact message');
        });
    }
}
