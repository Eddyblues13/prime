@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Withdrawal</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Make</li>
                        <li class="breadcrumb-item active"><a href="#">Withdrawal</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- Display Success and Error Messages -->
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Whoops! Something went wrong.</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <!-- End: Messages -->

        <div class="alert alert-primary text-center" role="alert">
            Payment will be sent through your selected method.
        </div>

        <div class="row">
            <!-- Bitcoin Withdrawal Card -->
            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header text-uppercase text-center">
                        Bitcoin WITHDRAWAL
                    </div>
                    <div class="card-body">
                        <p>MINIMUM: <span class="float-right">$50</span></p>
                        <hr>
                        <p>MAXIMUM: <span class="float-right">$100,000</span></p>
                        <hr>
                        <p>CHARGES (VAT): <span class="float-right">$2</span></p>
                        <hr>
                        <p>CHARGES (%): <span class="float-right">3%</span></p>
                        <hr>
                        <p>DURATION: <span class="float-right">1-12 hours</span></p>
                        <hr>
                        <div class="text-center mb-3">
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#withdrawalModal"
                                data-payment-mode="Bitcoin" data-method-id="18">
                                <i class="fa fa-plus"></i> Request Withdrawal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- XRP Withdrawal Card -->
<div class="col-12 col-lg-6 col-xl-4 mt-3">
    <div class="card text-auto bg-default">
        <div class="card-header text-uppercase text-center">
            XRP WITHDRAWAL
        </div>
        <div class="card-body">
            <p>MINIMUM: <span class="float-right">$50</span></p>
            <hr>
            <p>MAXIMUM: <span class="float-right">$100,000</span></p>
            <hr>
            <p>CHARGES (VAT): <span class="float-right">$2</span></p>
            <hr>
            <p>CHARGES (%): <span class="float-right">3%</span></p>
            <hr>
            <p>DURATION: <span class="float-right">1-12 hours</span></p>
            <hr>
            <div class="text-center mb-3">
                <button class="btn btn-secondary" data-toggle="modal" data-target="#withdrawalModal"
                    data-payment-mode="XRP" data-method-id="20">
                    <i class="fa fa-plus"></i> Request Withdrawal
                </button>
            </div>
        </div>
    </div>
</div>


            <!-- Tether (USDT) Withdrawal Card -->
            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header text-uppercase text-center">
                        TETHER (USDT) WITHDRAWAL
                    </div>
                    <div class="card-body">
                        <p>MINIMUM: <span class="float-right">$50</span></p>
                        <hr>
                        <p>MAXIMUM: <span class="float-right">$100,000</span></p>
                        <hr>
                        <p>CHARGES (VAT): <span class="float-right">$2</span></p>
                        <hr>
                        <p>CHARGES (%): <span class="float-right">3%</span></p>
                        <hr>
                        <p>DURATION: <span class="float-right">1-12 hours</span></p>
                        <hr>
                        <div class="text-center mb-3">
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#withdrawalModal"
                                data-payment-mode="TETHER (USDT)" data-method-id="19">
                                <i class="fa fa-plus"></i> Request Withdrawal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdrawals Table -->
        <div class="row">
            <div class="col-12 col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mb-2">
                            <strong>PROCESSED/PENDING WITHDRAWALS</strong>
                        </div>

                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>REQUESTED AMOUNT</th>
                                        <th>AMOUNT + CHARGES</th>
                                        <th>RECEIVING MODE</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{ $withdrawal->id }}</td>
                                        <td>${{ number_format($withdrawal->amount, 2) }}</td>
                                        <td>${{ number_format($withdrawal->total_amount, 2) }}</td>
                                        <td>{{ $withdrawal->account }}</td>
                                        <td>{{ $withdrawal->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @if($withdrawal->status == 0)
                                            Pending
                                            @elseif($withdrawal->status == 1)
                                            Approved
                                            @else
                                            Unknown Status
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdrawal Modal -->
        <div id="withdrawalModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center w-100">ENTER AMOUNT BELOW</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('withdrawal.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" step="0.01" min="50" max="100000" class="form-control" id="amount"
                                    name="amount" placeholder="Enter amount here" required>
                            </div>
                            <div class="form-group">
                                <label for="payment_mode">Payment Mode</label>
                                <input type="text" class="form-control" id="payment_mode_display" disabled>
                                <input type="hidden" name="payment_mode" id="payment_mode">
                            </div>
                            <input type="hidden" name="method_id" id="method_id">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Withdrawal Modal -->

        <br><br><br>
    </div>
</main>
<!-- END: Content-->

<!-- Footer Styles -->
<style>
    footer {
        background-color: #EAEDD0;
        text-align: center;
        width: 100%;
        position: fixed;
        bottom: 0;
    }
</style>

<!-- START: Footer-->
@include('dashboard.footer')

<!-- Script to Populate Modal with Correct Data -->
<script>
    $('#withdrawalModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var paymentMode = button.data('payment-mode');
        var methodId = button.data('method-id');
        
        var modal = $(this);
        modal.find('#payment_mode_display').val(paymentMode);
        modal.find('#payment_mode').val(paymentMode);
        modal.find('#method_id').val(methodId);
    });
</script>