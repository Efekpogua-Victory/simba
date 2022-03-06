<div>
    @section('title', 'Transfer Error')
    @section('content')
       
        <div class="row">
            <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                <!-- Request Money Success
              ============================================= -->
                <div class="bg-white text-center shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                    <div class="my-4">
                        <p class="text-danger text-20 lh-1"><i class="fas fa-times"></i></p>
                        <p class="text-danger text-8 fw-500 lh-1">Error!</p>
                        <p class="lead">Transaction not Complete</p>
                    </div>
                    <p class="text-3 mb-4">There was an error sending your money</p>
                    <div class="d-grid">
                        <a href="{{route('sendmoney')}}" class="btn btn-primary">Roll Back and try Again</a>
                    </div>
                    
                </div>
                <!-- Request Money Success end -->
            </div>
        </div>
    @endsection
</div>
