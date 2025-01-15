<?php

namespace Database\Seeders;

use App\Models\WalletDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalletDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $wallets = [
            [
                'type' => 'Bitcoin',
                'network' => 'Bitcoin-Network',
                'address' => '1PVpfMtwqQtWDWE7umYTfJb2JtohSPpfQw',
            ],
            [
                'type' => 'Ethereum',
                'network' => 'ERC20',
                'address' => '0x5664e5b71ac6da8f9040f098bd6c0afa46a9dbdc',
            ],
            [
                'type' => 'Tether',
                'network' => 'TRC20',
                'address' => 'TWZ5EERKYS1h2d6U7z4fj1F7D4FnppojeW',
            ],
            [
                'type' => 'XRP',
                'network' => 'Ripple',
                'address' => 'rJn2zAPdFA193sixJwuFixRkYDUtx3apQh',
                'xrp_tag' => '500437859',
            ],
            [
                'type' => 'Bank',
                'bank_name' => 'FIRST NATIONAL BANK',
                'account_holder' => 'MORRIS MASIMBA CHAKANYUK',
                'account_number' => '62268885682',
                'account_type' => 'SAVINGS',
                'branch_name' => 'Boksburg',
                'branch_code' => '250655',
                'swift_code' => 'FIRNZAJJ',
            ],
        ];

        foreach ($wallets as $wallet) {
            WalletDetail::create($wallet);
        }
    }
}
