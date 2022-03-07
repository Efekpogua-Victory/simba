<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SendMoneyError extends Component
{
    public function render()
    {
        return view('livewire.send-money-error')->extends('layouts.app');
    }
}
