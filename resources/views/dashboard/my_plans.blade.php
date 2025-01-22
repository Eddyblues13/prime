@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Your Investments</h4><br>
                        <p>Your current Trading Package: <font color="Red">{{ count($investments) > 0 ?
                                count($investments) : '0' }}</font>
                        </p>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Investments</li>
                        <li class="breadcrumb-item active"><a href="#">Details</a></li>
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

        <div class="row">
            @foreach($investments as $investment)
            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header text-uppercase text-center">
                        {{ $investment->plan_name }}
                    </div>
                    <div class="card-body">
                        <i class="fa fa-check" aria-hidden="true"></i> {{ $investment->plan_percent }}% ROI<br><br>
                        <i class="fa fa-check" aria-hidden="true"></i> Plan Duration: {{ $investment->plan_duration }}
                        days<br><br>
                        <i class="fa fa-check" aria-hidden="true"></i> Amount Invested: ${{
                        number_format($investment->amount, 2) }}<br><br>
                        <i class="fa fa-check" aria-hidden="true"></i> Status: <strong>{{ ucfirst($investment->status)
                            }}</strong><br><br>
                        <form style="padding:3px;" role="form" method="post" action="">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $investment->id }}">
                            <center>
                                @if($investment->status !== 'completed')
                                <input type="submit" class="btn btn-primary" value="Update Plan">
                                @else
                                <button type="button" class="btn btn-secondary" disabled>Completed</button>
                                @endif
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br><br><br>
    </div>
</main>
@include('dashboard.footer')