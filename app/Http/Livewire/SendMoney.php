<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SendMoney extends Component
{
    public $receiver;
    public $base_currency;
    public $quote_currency;
    public $base_amount;
    public $quote_amount;
    public $charges = 0;
    public $total;
    public $baserror;
    public $quoteerror;
    public $exchage_rate;
    public $base_symbol;
    public $quote_symbol;
    public $currencies = ['USD','NGN','GBP','EUR'];
    public $disabled = false;
    
    public function getRate($base = 'USD', $quote = 'NGN'){

        $response = Http::get("https://api.twelvedata.com/exchange_rate?symbol=$base/$quote&apikey=5182bd154ffe4591b34c5290bc9fbfb3")['rate'];
        return $response;
    }

    public function mount(){
        $this->base_currency = 'USD';
        $this->quote_currency= 'NGN';
        $this->base_symbol = '$';
        $this->quote_symbol ='₦';
        $this->base_amount = 1000;
        $this->charges = 10; //1 % of the base amount to send
        $this->quote_amount = $this->getRate() * 1000;
        $this->exchage_rate = $this->getRate();
        $this->total = 1000+10;
    }

    public function render()
    {
        return view('livewire.send-money',[
            'users' => User::where('id', '!=', Auth::user()->id)->orderByDesc('id')->get(),
        ])->extends('layouts.app');
    }

    public function changeCurrency(){

        if ($this->quote_currency == 'USD') {
            $this->quote_symbol = '$';
        }elseif ($this->quote_currency == 'NGN') {
            $this->quote_symbol ='₦';
        }elseif ($this->quote_currency == 'GBP') {
            $this->quote_symbol ='£';
        }elseif ($this->quote_currency == 'EUR') {
            $this->quote_symbol ='€';
        }

        if ($this->base_currency == 'USD') {
            $this->base_symbol = '$';
        }elseif ($this->base_currency == 'NGN') {
            $this->base_symbol ='₦';
        }elseif ($this->base_currency == 'GBP') {
            $this->base_symbol ='£';
        }elseif ($this->base_currency == 'EUR') {
            $this->base_symbol ='€';
        }

        // validate user selection to make sure they are not equal eg NGN = NGN
        if($this->base_currency == $this->quote_currency){
            $this->baserror = "It is not possible to send money from $this->base_currency to $this->quote_currency";
            $this->quoteerror = "It is not possible to send money from $this->base_currency to $this->quote_currency";
            $this->exchage_rate = 0;
            $this->quote_amount = 0;
            $this->charges = 0;
            $this->total = 0;
            $this->disabled = true;
        }elseif (empty($this->base_amount) and empty($this->quote_amount)) {
            $this->exchage_rate = 0;
            $this->charges = 0;
            $this->total = 0;
            $this->disabled = true;
        }else{
            $this->baserror = "";
            $this->quoteerror = "";
            $this->disabled = false;
            
            // calculate values based on user currency selection 
            $this->charges = $this->base_amount * 2/100;
            $this->total = $this->charges + $this->base_amount;

            if (($this->base_currency != 'NGN' and $this->quote_currency != 'NGN') or ($this->base_currency != 'NGN'  and $this->quote_currency == 'NGN')) {
                $rate = $this->getRate(base:$this->base_currency, quote:$this->quote_currency);
                $this->quote_amount = $this->base_amount * $rate;
                $this->exchage_rate = round($rate,6);
            }elseif ($this->base_currency == 'NGN' and $this->quote_currency != 'NGN') {
                $rate = $this->getRate(base:$this->quote_currency, quote:$this->base_currency);
                $this->quote_amount = $this->base_amount / $rate;
                $ngnex = 1/$rate;
                $this->exchage_rate = round($ngnex,6);
            }
        }
    }

    public function calculateQuoteValue(){
        // check to see if values are in the amout fields
        if (empty($this->base_amount) or empty($this->quote_amount)) {
            $this->exchage_rate = 0;
            $this->charges = 0;
            $this->total = 0;
            $this->disabled = true;
        }else {
            $this->disabled = false;
            // calculate values based on user currency selection 
            $this->charges = $this->base_amount * 2/100;
            $this->total = $this->charges + $this->base_amount;

            if (($this->base_currency != 'NGN' and $this->quote_currency != 'NGN') or ($this->base_currency != 'NGN'  and $this->quote_currency == 'NGN')) {
                $rate = $this->getRate(base:$this->base_currency, quote:$this->quote_currency);
                $this->quote_amount = $this->base_amount * $rate;
                $this->exchage_rate = round($rate,6);
            }elseif ($this->base_currency == 'NGN' and $this->quote_currency != 'NGN') {
                $rate = $this->getRate(base:$this->quote_currency, quote:$this->base_currency);
                $this->quote_amount = $this->base_amount / $rate;
                $ngnex = 1/$rate;
                $this->exchage_rate = round($ngnex,6);
            }
        }
    }


    public function calculateBaseValue(){
        // check to see if values are in the amout fields
        if (empty($this->base_amount) or empty($this->quote_amount)) {
            $this->exchage_rate = 0;
            $this->charges = 0;
            $this->total = 0;
            $this->disabled = true;
        }else {
            $this->disabled = false;
            // calculate values based on user currency selection 
            $this->charges = $this->base_amount * 2/100;
            $this->total = $this->charges + $this->base_amount;

            if (($this->base_currency != 'NGN' and $this->quote_currency != 'NGN') or ($this->base_currency != 'NGN' and $this->quote_currency == 'NGN')) {
                $rate = $this->getRate(base:$this->base_currency, quote:$this->quote_currency);
                $this->base_amount = $this->quote_amount / $rate;
                $this->exchage_rate = round($rate,6);
            }elseif ($this->base_currency == 'NGN' and $this->quote_currency != 'NGN') {
                $rate = $this->getRate(base:$this->quote_currency, quote:$this->base_currency);
                $this->base_amount = $this->quote_amount * $rate;
                $ngnex = 1/$rate;
                $this->exchage_rate = round($ngnex,6);
            }
        }
    }


    public function chargeAccount(){
        sleep(2);
        $user = Auth::user();
        if ($this->base_currency == 'USD') {
            $balance= $user->usd_balance;
        }elseif ($this->base_currency == 'NGN') {
            $balance= $user->ngn_balance;
        }elseif ($this->base_currency == 'EUR') {
            $balance= $user->eur_balance;
        }elseif ($this->base_currency == 'GBP') {
            $balance= $user->gbp_balance;
        }

        if ($balance < $this->base_amount) {
            session()->flash('message', 'You have insufficient fund in your account.');
        }else {
            session([
                'amount' => $this->base_amount,
                'fees' => $this->charges,
                'total' => $this->total,
                'receiver_email' => $this->receiver,
                'base_currency' => $this->base_currency,
                'quote_currency'=> $this->quote_currency,
            ]);
            return redirect()->route('confirm-send');
        }
    }
}
