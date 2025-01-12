@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Update Payment Details </h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Update</li>
                        <li class="breadcrumb-item">Payment</li>
                        <li class="breadcrumb-item active"><a href="#">Details</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->




        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 mt-3">
                <div class="card">
                    <div class="card-content">
                        <div class="col-12 col-lg-12  col-xl-12 mt-3">
                            <div class="card">

                                <!-- form start -->
                                <form method="post" action="https://prmedge.com/dashboard/updateacct">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="bn">Bank Name</label>
                                            <input class="form-control" type="text" name="bank_name" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="an">Account Name</label>
                                            <input class="form-control" type="text" name="account_name" value=""
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="ann">Account Number</label>
                                            <input class="form-control" type="text" name="account_number" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"> Tan Code</label>
                                            <input class="form-control" type="text" name="eth_address" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess"><i
                                                    class="fab fa-bitcoin"></i> Bitcoin Wallet Address</label>
                                            <input class="form-control" type="text" name="btc_address" value=""
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputError" hidden><i
                                                    class="fas fa-lira-sign"></i> Litecoin Address</label>
                                            <input class="form-control" type="text" name="ltc_address" value="" hidden>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <input type="hidden" name="id" value="922">
                                        <input type="hidden" name="_token"
                                            value="pcuBxEFdCYa079Zep8CznP11JRHwk3HONdRzoqFo"><br />
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br>
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
<!-- START: Footer-->
@include('dashboard.footer')