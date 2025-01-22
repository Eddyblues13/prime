<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InvestmentPackage;
use App\Http\Controllers\Controller;

class InvestmentPackageController extends Controller
{
    public function index()
    {
        $investmentPackages = InvestmentPackage::all();
        return view('admin.plans.index', compact('investmentPackages'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'daily_roi' => 'required|numeric|min:0',
            'minimum_investment' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'instant_withdrawal' => 'required|boolean',
            'minimum_withdrawal' => 'required|numeric|min:0',
        ]);

        InvestmentPackage::create($validated);

        return redirect()->route('investment-packages.index')->with('success', 'Investment package created successfully.');
    }

    public function edit(InvestmentPackage $investmentPackage)
    {
        return view('admin.plans.edit', compact('investmentPackage'));
    }

    public function update(Request $request, InvestmentPackage $investmentPackage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'daily_roi' => 'required|numeric|min:0',
            'minimum_investment' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'instant_withdrawal' => 'required|boolean',
            'minimum_withdrawal' => 'required|numeric|min:0',
        ]);

        $investmentPackage->update($validated);

        return redirect()->route('investment-packages.index')->with('success', 'Investment package updated successfully.');
    }

    public function destroy(InvestmentPackage $investmentPackage)
    {
        $investmentPackage->delete();
        return redirect()->route('investment-packages.index')->with('success', 'Investment package deleted successfully.');
    }
}
