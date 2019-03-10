<?php

namespace App\Observers;

use App\Order;

use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        Mail::to($order->user->email)->send(
            new OrderCreated($order)
        );
    }
}
