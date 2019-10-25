<?php

namespace App\Observers;

use App\Notifications\ProductieUpdateNotification;
use App\Productie;

class ProductieObservel
{
    /**
     * Handle the productie "created" event.
     *
     * @param  \App\Productie  $productie
     * @return void
     */
    public function created(Productie $productie)
    {
        //
    }

    /**
     * Handle the productie "updated" event.
     *
     * @param  \App\Productie  $productie
     * @return void
     */
    public function updated(Productie $productie)
    {
        if ($productie->count>0) {
            $productie->follwers()->get()->each()->notify(new ProductieUpdateNotification());
        }
    }

    /**
     * Handle the productie "deleted" event.
     *
     * @param  \App\Productie  $productie
     * @return void
     */
    public function deleted(Productie $productie)
    {
        //
    }

    /**
     * Handle the productie "restored" event.
     *
     * @param  \App\Productie  $productie
     * @return void
     */
    public function restored(Productie $productie)
    {
        //
    }

    /**
     * Handle the productie "force deleted" event.
     *
     * @param  \App\Productie  $productie
     * @return void
     */
    public function forceDeleted(Productie $productie)
    {
        //
    }
}
