@section('title', 'Transfer Money')
@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/currency-flags/css/currency-flags.min.css') }}">
@endsection
<div>

    <div class="row mt-4 mb-5">
        <div class="col-lg-11 mx-auto">
            <div class="row widget-steps">
                <div class="col-4 step active">
                    <div class="step-name">Details</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="step-dot"></a>
                </div>
                <div class="col-4 step disabled">
                    <div class="step-name">Confirm</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="step-dot"></a>
                </div>
                <div class="col-4 step disabled">
                    <div class="step-name">Success</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="step-dot"></a>
                </div>
            </div>
        </div>
    </div>
    <h2 class="fw-400 text-center mt-3">Send Money</h2>
    <p class="lead text-center mb-4">Send your money anytime, anywhere in the world.</p>
    <div class="row">
        <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
            <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                
                <!-- Send Money Form
            ============================ -->
                <form id="form-send-money" method="post">
                    <div class="mb-3">
                        <label for="emailID" class="form-label">Recipient</label>
                        <select class="form-control bg-transparent" required=""
                            wire:model='receiver' required>
                            <option></option>
                            @foreach ($users as $user)
                                <option>{{ $user->email }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="youSend" class="form-label">You Send</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ $base_symbol }}</span>
                            <input type="number" wire:keyup='calculateQuoteValue' class="form-control" wire:model='base_amount' required>
                            <span class="input-group-text p-0">
                                <select wire:model='base_currency' wire:change='changeCurrency'
                                    class="form-control bg-transparent" required>
                                    @foreach ($currencies as $item)
                                        <option>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <small class="text-danger">{{$baserror}}</small>
                    </div>
                    <div class="mb-3">
                        <label for="recipientGets" class="form-label">Recipient Gets</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ $quote_symbol }}</span>
                            <input type="number" wire:keyup='calculateBaseValue' wire:model="quote_amount" class="form-control" required>
                            <span class="input-group-text p-0">
                                <select id="recipientCurrency" data-style="form-select bg-transparent border-0"
                                    wire:model='quote_currency' wire:change='changeCurrency' data-container="body" data-live-search="true"
                                    class="form-control bg-transparent" required>
                                    @foreach ($currencies as $item)
                                        <option>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <small class="text-danger">{{$quoteerror}}</small>
                    </div>
                    <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="changeCurrency" >
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="calculateQuoteValue"> 
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="calculateBaseValue"> 
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted text-center">The current exchange rate is <span class="fw-500">1
                            {{ $base_currency }} =
                            {{ $exchage_rate }} {{ $quote_currency }}</span>
                    </p>
                    <hr>
                    <p>Total Fees<span class="float-end">{{ $charges }}{{ $base_currency }}</span></p>
                    <hr>
                    <p class="text-4 fw-500">Total To Pay<span
                            class="float-end">{{ number_format($total) }}{{ $base_currency }}</span></p>
                    <div class="d-grid">
                        <button class="btn btn-primary" {{$disabled ? 'disabled' : ''}}>Continue</button></div>
                </form>
                <!-- Send Money Form end -->
            </div>
        </div>
    </div>
</div>
@section('scripts')
    @parent
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
@endsection
