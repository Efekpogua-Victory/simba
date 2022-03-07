@section('title', 'Confirm Transfer')
<div>
    <!-- Steps Progress bar -->
    <div class="row mt-4 mb-5">
        <div class="col-lg-11 mx-auto">
            <div class="row widget-steps">
                <div class="col-4 step complete">
                    <div class="step-name">Details</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route('sendmoney')}}" class="step-dot"></a>
                </div>
                <div class="col-4 step active">
                    <div class="step-name">Confirm</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="step-dot"></a>
                </div>
                <div class="col-4 step disabled">
                    <div class="step-name">Status</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="step-dot"></a>
                </div>
            </div>
        </div>
    </div>
    <h2 class="fw-400 text-center mt-3">Send Money</h2>
    <p class="lead text-center mb-4">You are sending money to <span class="fw-500">{{$email}}</span></p>
    <div class="row">
        <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
            <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                <h3 class="text-5 fw-400 mb-3 mb-sm-4">Payment Description</h3>
                <hr class="mx-n3 mx-sm-n5 mb-4">
                <!-- Send Money Confirm
            ============================================= -->
                <form id="form-send-money" method="post" wire:submit.prevent='confirm'>
                    <div class="mb-4 mb-sm-5">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" wire:model.defer='description' rows="4" id="description" required=""
                            placeholder="Payment Description"></textarea>
                    </div>
                    <hr class="mx-n3 mx-sm-n5 mb-3 mb-sm-4">
                    <h3 class="text-5 fw-400 mb-3 mb-sm-4">Confirm Details</h3>
                    <hr class="mx-n3 mx-sm-n5 mb-4">
                    <p class="mb-1">Send Amount <span class="text-3 float-end">{{number_format($amount, '2','.','')}}{{$currency}}</span></p>
                    <p class="mb-1">Total fees <span class="text-3 float-end"> {{number_format($fees, '2','.','')}} {{$currency}}</span></p>
                    <hr>
                    <p class="text-4 fw-500">Total<span class="float-end">{{number_format($total, '2','.','')}} {{$currency}}</span></p>
                    <div class="d-grid">
                        <button class="btn btn-primary">
                            <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="confirm"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span wire:loading.remove wire:target="confirm">Send Money</span>
                        </button>
                    </div>
                </form>
                <!-- Send Money Confirm end -->
            </div>
        </div>
    </div>
</div>
