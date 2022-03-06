<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard', [
            'transactions' =>  Transaction::where('user_id', Auth::user()->id)->with(['sender'])->paginate(10),
        ])->extends('layouts.app');
    }
}
