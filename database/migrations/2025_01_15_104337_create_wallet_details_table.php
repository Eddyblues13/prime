<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wallet_details', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Bitcoin, Ethereum, Tether, XRP, Bank
            $table->string('network')->nullable(); // Blockchain network
            $table->string('address')->nullable(); // Wallet address
            $table->string('xrp_tag')->nullable(); // XRP tag
            $table->string('bank_name')->nullable(); // For bank details
            $table->string('account_holder')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('swift_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_details');
    }
};
