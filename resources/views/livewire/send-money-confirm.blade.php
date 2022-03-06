<div>
    @section('title', 'Confirm Transfer')
    @section('styles')
        @parent
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/currency-flags/css/currency-flags.min.css') }}">
    @endsection
    @section('content')
        <!-- Steps Progress bar -->
        <div class="row mt-4 mb-5">
            <div class="col-lg-11 mx-auto">
                <div class="row widget-steps">
                    <div class="col-4 step complete">
                        <div class="step-name">Details</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="send-money.html" class="step-dot"></a>
                    </div>
                    <div class="col-4 step active">
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
        <p class="lead text-center mb-4">You are sending money to <span class="fw-500">demo@gmail.com</span></p>
        <div class="row">
            <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                    <h3 class="text-5 fw-400 mb-3 mb-sm-4">Payment Description</h3>
                    <hr class="mx-n3 mx-sm-n5 mb-4">
                    <!-- Send Money Confirm
                ============================================= -->
                    <form id="form-send-money" method="post">
                        <div class="mb-4 mb-sm-5">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="description" required=""
                                placeholder="Payment Description"></textarea>
                        </div>
                        <hr class="mx-n3 mx-sm-n5 mb-3 mb-sm-4">
                        <h3 class="text-5 fw-400 mb-3 mb-sm-4">Confirm Details</h3>
                        <hr class="mx-n3 mx-sm-n5 mb-4">
                        <p class="mb-1">Send Amount <span class="text-3 float-end">1,000.00 USD</span></p>
                        <p class="mb-1">Total fees <span class="text-3 float-end">7.21 USD</span></p>
                        <hr>
                        <p class="text-4 fw-500">Total<span class="float-end">1,007.21 USD</span></p>
                        <div class="d-grid"><button class="btn btn-primary">Send Money</button></div>
                    </form>
                    <!-- Send Money Confirm end -->
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @parent
        <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    @endsection
</div>
