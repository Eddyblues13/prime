@include('admin.header')

<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Investment Packages</h1>
            </div>
            <a href="{{ route('investment-packages.create') }}" class="btn btn-primary mb-4">Add New Package</a>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Daily ROI (%)</th>
                            <th>Minimum Investment</th>
                            <th>Duration (Days)</th>
                            <th>Instant Withdrawal</th>
                            <th>Minimum Withdrawal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investmentPackages as $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->daily_roi }}</td>
                            <td>{{ $package->minimum_investment }}</td>
                            <td>{{ $package->duration_days }}</td>
                            <td>{{ $package->instant_withdrawal ? 'Yes' : 'No' }}</td>
                            <td>{{ $package->minimum_withdrawal }}</td>
                            <td>
                                <a href="{{ route('investment-packages.edit', $package->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('investment-packages.destroy', $package->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')