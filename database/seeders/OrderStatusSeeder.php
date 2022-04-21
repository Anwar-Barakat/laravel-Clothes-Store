<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->delete();
        $statusRecords = [
            [
                'name'              => 'new',
                'status'            => 1
            ],
            [
                'name'              => 'pending',
                'status'            => 1
            ],
            [
                'name'              => 'hold',
                'status'            => 1
            ],
            [
                'name'              => 'cancelled',
                'status'            => 1
            ],
            [
                'name'              => 'in process',
                'status'            => 1
            ],
            [
                'name'              => 'paid',
                'status'            => 1
            ],
            [
                'name'              => 'shipped',
                'status'            => 1
            ],
            [
                'name'              => 'deliverd',
                'status'            => 1
            ],
        ];
        OrderStatus::insert($statusRecords);
    }
}