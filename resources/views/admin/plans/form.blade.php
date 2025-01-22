<div class="form-group">
    <label for="name" class="text-light">Package Name</label>
    <input type="text" name="name" class="form-control" value="{{ $investmentPackage->name ?? old('name') }}" required>
</div>
<div class="form-group">
    <label for="daily_roi" class="text-light">Daily ROI (%)</label>
    <input type="number" step="0.01" name="daily_roi" class="form-control"
        value="{{ $investmentPackage->daily_roi ?? old('daily_roi') }}" required>
</div>
<div class="form-group">
    <label for="minimum_investment" class="text-light">Minimum Investment</label>
    <input type="number" step="0.01" name="minimum_investment" class="form-control"
        value="{{ $investmentPackage->minimum_investment ?? old('minimum_investment') }}" required>
</div>
<div class="form-group">
    <label for="duration_days" class="text-light">Duration (Days)</label>
    <input type="number" name="duration_days" class="form-control"
        value="{{ $investmentPackage->duration_days ?? old('duration_days') }}" required>
</div>
<div class="form-group">
    <label for="instant_withdrawal" class="text-light">Instant Withdrawal</label>
    <select name="instant_withdrawal" class="form-control" required>
        <option value="1" {{ (isset($investmentPackage) && $investmentPackage->instant_withdrawal) ? 'selected' : ''
            }}>Yes</option>
        <option value="0" {{ (isset($investmentPackage) && !$investmentPackage->instant_withdrawal) ? 'selected' : ''
            }}>No</option>
    </select>
</div>
<div class="form-group">
    <label for="minimum_withdrawal" class="text-light">Minimum Withdrawal</label>
    <input type="number" step="0.01" name="minimum_withdrawal" class="form-control"
        value="{{ $investmentPackage->minimum_withdrawal ?? old('minimum_withdrawal') }}" required>
</div>