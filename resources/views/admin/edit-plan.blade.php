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
                        <div class="form-group">
                            <label for="name" class="text-light">Package Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $investmentPackage->name }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="daily_roi" class="text-light">Daily ROI (%)</label>
                            <input type="number" step="0.01" name="daily_roi" class="form-control"
                                value="{{ $investmentPackage->daily_roi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="minimum_investment" class="text-light">Minimum Investment</label>
                            <input type="number" step="0.01" name="minimum_investment" class="form-control"
                                value="{{ $investmentPackage->minimum_investment }}" required>
                        </div>
                        <div class="form-group">
                            <label for="duration_days" class="text-light">Duration (Days)</label>
                            <input type="number" name="duration_days" class="form-control"
                                value="{{ $investmentPackage->duration_days }}" required>
                        </div>
                        <div class="form-group">
                            <label for="instant_withdrawal" class="text-light">Instant Withdrawal</label>
                            <select name="instant_withdrawal" class="form-control" required>
                                <option value="1" {{ $investmentPackage->instant_withdrawal ? 'selected' : '' }}>Yes
                                </option>
                                <option value="0" {{ !$investmentPackage->instant_withdrawal ? 'selected' : '' }}>No
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="minimum_withdrawal" class="text-light">Minimum Withdrawal</label>
                            <input type="number" step="0.01" name="minimum_withdrawal" class="form-control"
                                value="{{ $investmentPackage->minimum_withdrawal }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')