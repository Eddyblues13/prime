@include('admin.header')

<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Edit Investment Package</h1>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('investment-packages.update', $investmentPackage->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.plans.form', ['investmentPackage' => $investmentPackage])
                        <button type="submit" class="btn btn-primary">Update Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>