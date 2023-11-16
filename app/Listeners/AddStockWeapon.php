<?php

namespace App\Listeners;

use App\Events\ReceiveStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddStockWeapon
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
    public function handle(ReceiveStock $event): void
    {
        //$receive = $event->receive;

        //$receive->
    }
}
