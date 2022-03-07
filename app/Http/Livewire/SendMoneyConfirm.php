<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMoneyConfirm extends Component
{
    public $description;

    public function render(){

        return view('livewire.send-money-confirm', [
            'amount' => session('amount'),
            'fees' => session('fees'),
            'total' => session('total'),
            'email' => session('receiver_email'),
            'currency' => session('base_currency'),
        ])->extends('layouts.app');
    }

    public function confirm(){
        sleep(2);

        $user = Auth::user();
        $base = session('base_currency');
        $quote = session('quote_currency');
        $amount = session('amount');
        $transation_id = rand(123123,787926);

        // Transaction atomicity derivation
        $number = rand(1,6);
        $response = $this->check($number);
        if ($response == 'Even') {
            $status = 'success';
        }else {
            $status = 'error';
        }

        // Users or user to receive payment
        if (session('receiver_email') == 'Every User') {
            $receivers = User::where('id', '!=', $user->id)->get();
        }else {
            $receivers = User::where('email', session('receiver_email'))->get();
        }
        

        foreach ($receivers as $key => $value) {
            // Perform Debiting and Crediting when transaction is successful
            if ($status == 'success') {
                // Debit Sender
                if ($base == 'USD') {
                    User::where('id', $user->id)->update([
                        'usd_balance' => $user->usd_balance - $amount,
                    ]);
                }elseif($base == 'NGN') {
                    User::where('id', $user->id)->update([
                        'ngn_balance' => $user->ngn_balance - $amount,
                    ]);
        
                }elseif($base == 'GBP') {
                    User::where('id', $user->id)->update([
                        'gbp_balance' => $user->gbp_balance - $amount,
                    ]);
                }elseif($base == 'EUR') {
                    User::where('id', $user->id)->update([
                        'eur_balance' => $user->eur_balance - $amount,
                    ]);
                }

                // Credit Receiver
                if ($quote == 'USD') {
                    User::where('id', $value->id)->update([
                        'usd_balance' => $value->usd_balance + $amount,
                    ]);
                }elseif($quote == 'NGN') {
                    User::where('id', $value->id)->update([
                        'ngn_balance' => $value->ngn_balance + $amount,
                    ]);
        
                }elseif($quote == 'GBP') {
                    User::where('id', $value->id)->update([
                        'gbp_balance' => $value->gbp_balance + $amount,
                    ]);
                }elseif($quote == 'EUR') {
                    User::where('id', $value->id)->update([
                        'eur_balance' => $value->eur_balance + $amount,
                    ]);
                }
            }
            

            $newtran = new Transaction();
            $newtran->user_id = $value->id;
            $newtran->sender_id = $user->id;
            $newtran->transation_id = $transation_id;
            $newtran->description = $this->description;
            $newtran->value = $amount;
            $newtran->quote_currency = $quote;
            $newtran->status = $status;
            $newtran->save();

            if ($status == 'success') {
                $newtran = new Transaction();
                $newtran->user_id = $user->id;
                $newtran->sender_id = $user->id;
                $newtran->transation_id = $transation_id;
                $newtran->description = $this->description;
                $newtran->value = $amount;
                $newtran->quote_currency = $base;
                $newtran->status = $status;
                $newtran->save();
            } 
        }

        

        if ($status == 'success') {
            return redirect()->route('transfer-success');
        }else {
            return redirect()->route('transfer-error');
        }

    }

    public function check($number){
        if($number % 2 == 0){
            return "Even"; 
        }
        else{
            return "Odd";
        }
    }
}
