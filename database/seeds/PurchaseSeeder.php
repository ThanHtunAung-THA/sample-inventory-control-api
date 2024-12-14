<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert([

            [
                'user_code' => '20001',
                'date' => Carbon::now()->subDays(10), // 10 days ago
                'location' => 'Yangon',
                'item_code' => 'ITEM001',
                'supplier' => 'Mr. Aung',
                'payment_type' => 'Credit Card',
                'currency' => 'Kyats',
                'quantity' => 5,
                'discount_and_foc' => 0,
                'paid' => 50000,
                'total' => 50000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10)

            ],
            [
                'user_code' => '30001',
                'date' => Carbon::now()->subDays(15), // 15 days ago
                'location' => 'Yangon',
                'item_code' => 'ITEM005',
                'supplier' => 'Mr. Zaw',
                'payment_type' => 'Credit Card',
                'currency' => 'Kyats',
                'quantity' => 2,
                'discount_and_foc' => 0,
                'paid' => 20000,
                'total' => 20000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(15)

            ],
            [
                'user_code' => '30002',
                'date' => Carbon::now()->subDays(12), // 12 days ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM006',
                'supplier' => 'Ms. Hla',
                'payment_type' => 'Bank Transfer',
                'currency' => 'Kyats',
                'quantity' => 4,
                'discount_and_foc' => 200,
                'paid' => 38000,
                'total' => 40000,
                'balance' => 200,
                'created_at' => Carbon::now()->subDays(12),
                'updated_at' => Carbon::now()->subDays(12)
            ],
            [
                'user_code' => '30003',
                'date' => Carbon::now()->subDays(8), // 8 days ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM007',
                'supplier' => 'Mr. Min',
                'payment_type' => 'COD',
                'currency' => 'Kyats',
                'quantity' => 7,
                'discount_and_foc' => 500,
                'paid' => 34500,
                'total' => 35000,
                'balance' => 500,
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(8)
            ],
            [
                'user_code' => '20002',
                'date' => Carbon::now()->subDays(5), // 5 days ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM002',
                'supplier' => 'Ms. Su',
                'payment_type' => 'Bank Transfer',
                'currency' => 'Kyats',
                'quantity' => 3,
                'discount_and_foc' => 500,
                'paid' => 29500,
                'total' => 30000,
                'balance' => 500,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5)
            ],
            [
                'user_code' => '30004',
                'date' => Carbon::now()->subDays(6), // 6 days ago
                'location' => 'Yangon',
                'item_code' => 'ITEM008',
                'supplier' => 'Ms. Khin',
                'payment_type' => 'Cash',
                'currency' => 'Kyats',
                'quantity' => 3,
                'discount_and_foc' => 0,
                'paid' => 30000,
                'total' => 30000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(6)
            ],
            [
                'user_code' => '30005',
                'date' => Carbon::now()->subDays(4), // 4 days ago
                'location' => 'Yangon',
                'item_code' => 'ITEM009',
                'supplier' => 'Mr. Htun',
                'payment_type' => 'Credit Card',
                'currency' => 'Kyats',
                'quantity' => 1,
                'discount_and_foc' => 0,
                'paid' => 15000,
                'total' => 15000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4)
            ],
            [
                'user_code' => '30006',
                'date' => Carbon::now()->subDays(3), // 3 days ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM0010',
                'supplier' => 'Ms. Nwe',
                'payment_type' => 'Bank Transfer',
                'currency' => 'Kyats',
                'quantity' => 5,
                'discount_and_foc' => 1000,
                'paid' => 49000,
                'total' => 50000,
                'balance' => 1000,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3)
            ],
            [
                'user_code' => '20003',
                'date' => Carbon::now()->subDays(2), // 2 days ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM003',
                'supplier' => 'Mr. Ko',
                'payment_type' => 'COD',
                'currency' => 'Kyats',
                'quantity' => 10,
                'discount_and_foc' => 1000,
                'paid' => 49000,
                'total' => 50000,
                'balance' => 1000,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2)
            ],
            [
                'user_code' => '30007',
                'date' => Carbon::now()->subDays(2), // 2 days ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM0011',
                'supplier' => 'Mr. Aye',
                'payment_type' => 'COD',
                'currency' => 'Kyats',
                'quantity' => 8,
                'discount_and_foc' => 0,
                'paid' => 80000,
                'total' => 80000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2)
            ],
            [
                'user_code' => '30008',
                'date' => Carbon::now()->subDays(1), // 1 day ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM0012',
                'supplier' => 'Ms. Mya',
                'payment_type' => 'Cash',
                'currency' => 'Kyats',
                'quantity' => 2,
                'discount_and_foc' => 0,
                'paid' => 20000,
                'total' => 20000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1)
            ],
            [
                'user_code' => '20004',
                'date' => Carbon::now()->subDays(1), // 1 day ago
                'location' => 'Mandalay',
                'item_code' => 'ITEM004',
                'supplier' => 'Ms. Nanda',
                'payment_type' => 'Cash',
                'currency' => 'Kyats',
                'quantity' => 1,
                'discount_and_foc' => 0,
                'paid' => 15000,
                'total' => 15000,
                'balance' => 0,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1)
            ],
            [
                'user_code' => '30009',
                'date' => Carbon::now(), // today
                'location' => 'Yangon',
                'item_code' => 'ITEM0013',
                'supplier' => 'Mr. Zaw',
                'payment_type' => 'Credit Card',
                'currency' => 'Kyats',
                'quantity' => 4,
                'discount_and_foc' => 0,
                'paid' => 40000,
                'total' => 40000,
                'balance' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


        ]);
        
    }
}
