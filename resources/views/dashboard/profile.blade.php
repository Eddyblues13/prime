@include('dashboard.header')
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Profile </h4>
                    </div>

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

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Personal</li>
                        <li class="breadcrumb-item active"><a href="#">Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->



        <!-- Main content -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row">
                    <div class="col-12 col-md-3 mt-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <center> <img class="d-flex img-fluid rounded-circle" src="/profilep.png"
                                            width="300" alt="User profile picture">
                                </div>
                                </center>

                                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                <p class="text-muted text-center"> <a>
                                        <font color="red"></font>
                                    </a><br> <a href="#" data-toggle="modal" data-target="#verifyModal">
                                        <font color="red">CLICK VERIFY ACCOUNT</font>
                                    </a>
                                </p>
                                <hr>
                                <center>
                                    <div class="toggle"></div><strong>ACTIVATE DARK MODE</strong>
                                </center>
                                <hr>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Country</b> <a class="float-right">{{Auth::user()->country}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Current Plan</b> <a class="float-right">{{Auth::user()->acct_form}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone Number</b> <a class="float-right">{{Auth::user()->phone}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Balance</b> <a
                                            class="float-right">{{Auth::user()->currency}}{{number_format($total_sum, 2)
                                            }}(USD{{
                                            number_format($amountsInUSD['balance'], 2) }})</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Status</b> <a class="float-right"> <a>
                                                <font color="red"></font>
                                            </a><br> <a href="#" data-toggle="modal" data-target="#verifyModal">
                                                <font color="red">CLICK VERIFY ACCOUNT</font>
                                            </a>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Profit</b> <a
                                            class="float-right">{{Auth::user()->currency}}{{number_format($profit_sum,
                                            2) }} (USD{{
                                            number_format($amountsInUSD['profit'], 2) }})</a>
                                    </li>
                                </ul>

                                <a href="https://prmedge.com/dashboard/deposits"
                                    class="btn btn-primary btn-block"><b>Deposit</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->


                    <!-- /.col -->

                    <div class="col-12 col-md-9 mt-3">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Payment Details</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <!-- form start -->
                                        <!-- Payment Details Form -->
                                        <form method="post" action="{{ route('profile.updatePaymentDetails') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="bn">Bank Name</label>
                                                <input class="form-control" type="text" name="bank_name"
                                                    value="{{ $profile->bank_name ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="an">Account Name</label>
                                                <input class="form-control" type="text" name="account_name"
                                                    value="{{ $profile->account_name ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ann">Account Number</label>
                                                <input class="form-control" type="text" name="account_number"
                                                    value="{{ $profile->account_number ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="eth_address">Ethereum Wallet Address</label>
                                                <input class="form-control" type="text" name="eth_address"
                                                    value="{{ $profile->eth_address ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="btc_address">Bitcoin Wallet Address</label>
                                                <input class="form-control" type="text" name="btc_address"
                                                    value="{{ $profile->btc_address ?? '' }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Payment
                                                Details</button>
                                        </form>

                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <div class="col-12 col-md-12 mt-3">

                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                                        data-toggle="tab">CHANGE PASSWORD BELOW</a></li>
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="activity">
                                                    <!-- Post -->
                                                    <!-- form start -->
                                                    <form method="post" action="{{ route('profile.changePassword') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="old_password">Enter Old Password</label>
                                                            <input type="password" name="old_password" required
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">New Password</label>
                                                            <input type="password" name="password" required
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_confirmation">Confirm Password</label>
                                                            <input type="password" name="password_confirmation" required
                                                                class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Change
                                                            Password</button>
                                                    </form>


                                                </div>
                                            </div>

                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->

                    <!-- /.content -->
                </div>


                <br><br><br>





            </div>










        </div>
    </div>
    </div>
    </div>
    <!-- END: Card DATA-->
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

@include('dashboard.footer')