<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewUser
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
        $actionBy = Auth::user();

        $view = 'emails.new-user';
        $data = array('event' => $event,'actionBy'=>$actionBy);

        Mail::send($view, $data, function ($message) use ($event) {

            if (Auth::user()->role_id != 1) {
                $message->to([$event->user->email]);
                $message->bcc(['Abdelrahman.Mohamed@samaya-electronics.com']);
            }else{
                $message->bcc(['Abdelrahman.Mohamed@samaya-electronics.com']);
            }
            $message->subject('Injection Files System Report Notification');
            $message->from('EPD-Notifications@samaya-electronics.com', 'Engineering Program Development');
        });
    }
}
