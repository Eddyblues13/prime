@include('dashboard.header')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Select Payment</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Select</li>
                        <li class="breadcrumb-item active"><a href="#">Payment</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Display Success and Error Messages -->
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Success!</strong> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>There were some problems with your input:</strong>
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
        <!-- END: Display Success and Error Messages -->

        <br>
        <div class="alert alert-primary" role="alert">
            <center>
                <p> <i class="fas fa-info"></i> Note: You are to make payment of <strong>&#36;{{$amount}}</strong> using
                    your
                    preferred mode of payment below, and please upload proof after payment below.</p>
            </center>
        </div>

        <!-- START: Card Data-->
        <div class="row">

            @foreach ($walletDetails as $wallet)
            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header text-center">
                        <strong>{{ strtoupper($wallet->type) }} @if($wallet->network) ({{ $wallet->network }}) @endif</strong>
                    </div>
                    <div class="card-body">
                        @if($wallet->type !== 'Bank')
                            ADDRESS: <span class="float-right badge">{{ $wallet->address }}</span>
                            @if($wallet->xrp_tag)
                                <hr>
                                XRP TAG: <span class="float-right badge">{{ $wallet->xrp_tag }}</span>
                            @endif
                            <hr>
                            <center class="mb-3">
                                <a href="{{ strtolower($wallet->type) }}:{{ $wallet->address }}"
                                    class="btn btn-secondary btn-lg mb-20"
                                    style="font-size: 20px; font-weight: bold;">
                                    {{ $wallet->type === 'Tether' ? 'Copy Wallet Address' : 'Pay Using ' . strtoupper($wallet->type) . ' Wallet App' }}
                                </a>
                            </center>
                        @else
                            BANK NAME: <span class="float-right badge">{{ $wallet->bank_name }}</span><br>
                            <hr>
                            ACCOUNT HOLDER: <span class="float-right badge">{{ $wallet->account_holder }}</span><br>
                            <hr>
                            ACCOUNT NUMBER: <span class="float-right badge">{{ $wallet->account_number }}</span><br>
                            ACCOUNT TYPE: <span class="float-right badge">{{ $wallet->account_type }}</span><br>
                            <hr>
                            BRANCH NAME: <span class="float-right badge">{{ $wallet->branch_name }}</span><br>
                            <hr>
                            BRANCH CODE: <span class="float-right badge">{{ $wallet->branch_code }}</span><br>
                            <hr>
                            SWIFT CODE: <span class="float-right badge">{{ $wallet->swift_code }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

            <!-- Upload Proof of Payment Card -->
            <div class="col-12 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header justify-content-between align-items-center">
                        <h4 class="card-title">UPLOAD PROOF OF PAYMENT</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead">
                        <form method="POST" action="{{ route('handle.payment') }}" enctype="multipart/form-data"
                            style="padding:20px; margin-top:10px;">
                            @csrf
                            <div class="form-group">
                                <label>Payment Mode</label>
                                <select name="payment_mode" class="form-control select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Payment Mode</option>
                                    <option value="Bitcoin">Bitcoin</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Bitcash">Bitcash</option>
                                    <option value="Tether (USDT)">Tether (USDT)</option>
                                </select>
                                <br>
                                <div class="form-group">
                                    <label>Hash Key (Optional, Cryptocurrency payments only)</label>
                                    <input type="text" class="form-control" name="hashurl" id="hashurl"
                                        value="{{ old('hashurl') }}">
                                    <small class="text-danger">
                                        <i>(All cryptocurrency payments without hash key submission won't be
                                            approved)</i>
                                    </small>
                                </div>

                                <label>Proof of Payment</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('proof') is-invalid @enderror"
                                        name="proof" id="proof" required>
                                    <label class="custom-file-label" for="proof">Choose file</label>
                                    @error('proof')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div> <!-- /.form-group -->

                            <div class="sub_home">
                                <input type="submit" class="btn btn-primary" value="I have Paid">
                                <div class="clearfix"></div>
                            </div>

                            <input type="hidden" name="amount" value="{{ $amount }}">
                            <input type="hidden" name="pay_type" value="">
                            <input type="hidden" name="plan_id" value="">
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</main>
<!-- END: Content-->

<!--Start of Tawk.to Script-->
<style>
    footer {
        background-color: #EAEDD0;
        text-align: center;
        width: 100%;
        position: fixed;
        bottom: 0;
    }
</style>
<!--End of Tawk.to Script-->

<!-- START: Footer-->
@include('dashboard.footer')