<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $orders = DB::table('orders')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('countries', 'orders.country_id', '=', 'countries.id')
            ->select(
                'orders.id',
                'users.name as username',
                'orders.name',
                'orders.email',
                'orders.mobile',
                'orders.address',
                'orders.city',
                'orders.state',
                'countries.name as country',
                'orders.pincode',
                'orders.shipping_cart',
                'orders.coupon_code',
                'orders.coupon_amount',
                'orders.status',
                'orders.payment_method',
                'orders.payment_gateway',
                'orders.grand_amount',
                'order_products.product_name',
                'order_products.product_code',
                'order_products.product_color',
                'order_products.product_size',
                'order_products.product_price',
                'order_products.product_quantity'
            )
            ->orderBy('id', 'desc')
            ->get();

        return $orders;
    }

    public function headings(): array
    {
        return [
            'id',
            'username',
            'customer name',
            'customer email',
            'customer mobile',
            'customer address',
            'customer city',
            'customer state',
            'country',
            'pincode',
            'shipping_cart',
            'coupon code',
            'coupon amount',
            'status',
            'payment method',
            'payment gateway',
            'grand amount',
            'product name',
            'product code',
            'product color',
            'product size',
            'product price',
            'product quantity',
        ];
    }
}