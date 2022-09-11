<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ListenerFile
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $authMail = [Auth::user()->email, 'EhabMahmoud.Saeed@samaya-electronics.com'];
        // $principalEmail = $event->report->principal->email;

        $filePath = storage_path('app/files/' . $event->modelName . '/' . $event->files['file']);

        $view = 'emails.file-added';
        $data = array('event' => $event);
        Mail::send($view, $data, function ($message) use ($filePath, $event) {
            $message->attach(
                $filePath,
                [
                    'as' => substr($event->files['file'], 11),
                ]
            );

            $message->to([$event->files->user->email]);
            // $message->cc($event->files->user->email);
            $message->bcc(['Abdelrahman.Mohamed@samaya-electronics.com']);
            $message->subject('Injection Files System Report Notification');
            $message->from('EPD-Notifications@samaya-electronics.com', 'Engineering Program Development');
        });
    }
}
