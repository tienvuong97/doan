<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;

class OrderObserver
{
    public function created(Order $order)
    {
        $admins = User::where('role', 1)->get();
        foreach($admins as $admin) {
            $admin->notify(new OrderNotification($order));
        }
    }
}
