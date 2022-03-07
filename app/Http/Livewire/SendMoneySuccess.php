<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SendMoneySuccess extends Component
{
    public function render()
    {
        return view('livewire.send-money-success', [
            'amount' => session('amount'),
            'fees' => session('fees'),
            'total' => session('total'),
            'email' => session('receiver_email'),
            'currency' => session('base_currency'),
        ])->extends('layouts.app');
    }
}
