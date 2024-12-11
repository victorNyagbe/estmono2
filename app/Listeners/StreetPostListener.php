<?php

namespace App\Listeners;

use App\Models\Alert;
use App\Events\StreetPostEvent;
use App\Helpers\MessageSender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StreetPostListener
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
     * @param  \App\Events\StreetPostEvent  $event
     * @return void
     */
    public function handle(StreetPostEvent $event)
    {
        $alerte_numbers = Alert::limit(3)->get();

        $commune = new MessageSender('GOLFE1');


        $message = "Une suggestion vient d'être envoyée dans ma rue par un citoyen.";

        foreach ($alerte_numbers as $alert_number) {
            $commune->Submit($message, $alert_number->number, "yAYu1Q7C9FKy/1dOOBSHvpcrTldsEHGHtM2NjcuF4iU=", "4460f3b0-3a6a-49f4-8cce-d5900b86723d");
        }
    }
}
