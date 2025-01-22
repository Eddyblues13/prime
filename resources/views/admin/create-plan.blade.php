@include('admin.header')

<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Add New Investment Package</h1>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('investment-packages.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-light">Package Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Package Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="daily_roi" class="text-light">Daily ROI (%)</label>
                            <input type="number" step="0.01" name="daily_roi" class="form-control"
                                placeholder="Enter Daily ROI (e.g. 1.5)" required>
                        </div>
                        <div class="form-group">
                            <label for="minimum_investment" class="text-light">Minimum Investment</label>
                            <input type="number" step="0.01" name="minimum_investment" class="form-control"
                                placeholder="Enter Minimum Investment Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="duration_days" class="text-light">Duration (Days)</label>
                            <input type="number" name="duration_days" class="form-control"
                                placeholder="Enter Duration in Days" required>
                        </div>
                        <div class="form-group">
                            <label for="instant_withdrawal" class="text-light">Instant Withdrawal</label>
                            <select name="instant_withdrawal" class="form-control" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="minimum_withdrawal" class="text-light">Minimum Withdrawal</label>
                            <input type="number" step="0.01" name="minimum_withdrawal" class="form-control"
                                placeholder="Enter Minimum Withdrawal Amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')