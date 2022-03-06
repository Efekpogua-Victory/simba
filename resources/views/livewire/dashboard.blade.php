@section('title', 'Money Transfer and Online Payments')

<div>
<div class="row">
          <div class="col-lg-10 offset-lg-1">

        <div class="bg-white shadow-sm rounded p-4 mb-4">
            <div class="row gy-4 profile-completeness">
                <div class="col-sm-3">
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <h3 class="text-9 fw-400">$ {{number_format(Auth::user()->usd_balance, 2, '.', ' ')}}</h3>
                        <p class="mb-2 text-muted opacity-8">USD Balance</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <h3 class="text-9 fw-400">&#8358;{{number_format(Auth::user()->ngn_balance, 2, '.', ' ')}}</h3>
                        <p class="mb-2 text-muted opacity-8">NGN Balance</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <h3 class="text-9 fw-400">&euro;{{number_format(Auth::user()->eur_balance, 2, '.', ' ')}}</h3>
                        <p class="mb-2 text-muted opacity-8">EUR Balance</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <h3 class="text-9 fw-400">&#163;{{number_format(Auth::user()->gbp_balance, 2, '.', ' ')}}</h3>
                        <p class="mb-2 text-muted opacity-8">GBP Balance</p>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Recent Activity
        =============================== -->
        <div class="bg-white shadow-sm rounded py-4 mb-4">
            <div class="px-4 mb-4">
                <div class="d-inline">
                    <span class="text-5">Transactions</span>
                </div>
                <div class="d-inline">
                    <a href="{{route('sendmoney')}}" class="btn btn-primary float-right btn-sm">New Transaction</a>
                </div>
            </div>
            
            
            
            <!-- Title
          =============================== -->
            <div class="transaction-title py-2 px-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SENDER</th>
                                <th>AMOUNT</th>
                                <th>STATUS</th>
                                <th>DATE CREATED</th>
                                <th>UPDATED AT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $txn)
                            <tr>
                                <td scope="row">#{{$txn->transation_id}}</td>
                                <td>
                                    @if (empty($txn->sender_id))
                                        System default
                                    @else
                                        {{$txn->sender->name}}
                                    @endif
                                </td>
                                <td>{{number_format($txn->value)}} ({{$txn->quote_currency}})</td>
                                <td>
                                    @if ($txn->status == 'success')
                                    <span class="badge bg-success">Success</span>
                                    @else
                                    <span class="badge bg-danger">Error</span>
                                    @endif
                                </td>
                                <td>{{$txn->created_at->diffForHumans()}}</td>
                                <td>{{$txn->updated_at->diffForHumans()}}</td>
                                <td>

                                </td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="7">No Transaction History</td>
                            </tr> 
                            @endforelse
                        </tbody>
                    </table>   
                </div>
                {{ $transactions->links() }}
            </div>
            <!-- Title End -->

            

            <!-- Transaction Item Details Modal
          =========================================== -->
            <div id="transaction-detail" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row g-0">
                                <div class="col-sm-5 d-flex justify-content-center bg-primary rounded-start py-4">
                                    <div class="my-auto text-center">
                                        <div class="text-17 text-white my-3"><i class="fas fa-building"></i></div>
                                        <h3 class="text-4 text-white fw-400 my-3">Envato Pty Ltd</h3>
                                        <div class="text-8 fw-500 text-white my-4">$557.20</div>
                                        <p class="text-white">15 March 2021</p>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <h5 class="text-5 fw-400 m-3">Transaction Details
                                        <button type="button" class="btn-close text-2 float-end" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </h5>
                                    <hr>
                                    <div class="px-3">
                                        <ul class="list-unstyled">
                                            <li class="mb-2">Payment Amount <span
                                                    class="float-end text-3">$562.00</span></li>
                                            <li class="mb-2">Fee <span class="float-end text-3">-$4.80</span>
                                            </li>
                                        </ul>
                                        <hr class="mb-2">
                                        <p class="d-flex align-items-center fw-500 mb-0">Total Amount <span
                                                class="text-3 ms-auto">$557.20</span></p>
                                        <hr class="mb-4 mt-2">
                                        <ul class="list-unstyled">
                                            <li class="fw-500">Paid By:</li>
                                            <li class="text-muted">Envato Pty Ltd</li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li class="fw-500">Transaction ID:</li>
                                            <li class="text-muted">26566689645685976589</li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li class="fw-500">Description:</li>
                                            <li class="text-muted">Envato March 2021 Member Payment</li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li class="fw-500">Status:</li>
                                            <li class="text-muted">Completed<span class="text-success text-3 ms-1"><i
                                                        class="fas fa-check-circle"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Transaction Item Details Modal End -->
        </div>
        <!-- Recent Activity End -->
    </div>
    <!-- Middle Panel End -->              
</div>

</div>
