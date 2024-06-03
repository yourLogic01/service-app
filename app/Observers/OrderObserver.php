<?php

namespace App\Observers;

use App\Models\Order;
use Carbon\Carbon;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function creating(Order $order)
    {
         // Mendapatkan tanggal dan bulan saat ini
         $yearMonth = Carbon::now()->format('ym');

         // Mencari id terakhir untuk bulan ini
         $lastOrder = Order::where('id', 'like', 'SS' . $yearMonth . '%')->latest()->first();
         if ($lastOrder) {
             // Jika ada Order sebelumnya pada bulan ini, tambahkan 1 pada increment
             $increment = intval(substr($lastOrder->id, -3)) + 1;
         } else {
             // Jika tidak ada Order pada bulan ini, mulai dari 001
             $increment = 1;
         }
 
         // Format ulang increment dengan padding nol
         $increment = str_pad($increment, 3, '0', STR_PAD_LEFT);
 
         // Set nilai ID berdasarkan pola tahun, bulan, dan increment
         $order->id = 'SS' . $yearMonth . $increment;
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
