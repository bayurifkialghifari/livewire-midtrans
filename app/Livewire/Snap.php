<?php

namespace App\Livewire;

use Livewire\Component;

class Snap extends Component
{
    public $clientKey = 'SB-Mid-client-FTWgdwVbFTVRkUKX';
    public $serverKey = 'SB-Mid-server-GJQwjY13zW2YUqyX5lZmrhU_';

    public function getSnapToken() {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = $this->serverKey;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => 10000,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $this->dispatch('span-token-generated', token: $snapToken);
    }

    public function success() {

    }

    public function render()
    {
        return view('livewire.snap');
    }
}
