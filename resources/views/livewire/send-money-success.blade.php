@section('title', 'Transfer Successful')
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
                    <span class="step-dot"></span>
                </div>
                <div class="col-4 step complete">
                    <div class="step-name">Confirm</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="step-dot"></span>
                </div>
                <div class="col-4 step complete">
                    <div class="step-name">Success</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="step-dot"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
            <!-- Request Money Success
            ============================================= -->
            <div class="bg-white text-center shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                <div class="my-4">
                    <p class="text-success text-20 lh-1"><i class="fas fa-check-circle"></i></p>
                    <p class="text-success text-8 fw-500 lh-1">Success!</p>
                    <p class="lead">Transaction Complete</p>
                </div>
                <p class="text-3 mb-4">You've successfully sent <span class="text-4 fw-500">{{number_format($amount, '2','.','')}}{{$currency}} to {{$email}}</span>.
                    See transaction details under <a class="btn-link" href="{{route('dashboard')}}">Activity</a>.</p>
                <div class="d-grid">
                    <a href="{{route('sendmoney')}}" class="btn btn-primary">Transfer Money Again</a>
                </div>
                
            </div>
            <!-- Request Money Success end -->
        </div>
    </div>
</div>
