<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        // Sample orders data - replace with real database queries later
        $orders = [
            [
                'id' => 'ORD-2024-001',
                'date' => '2024/10/17',
                'status' => 'processing',
                'status_text' => 'قيد التجهيز',
                'total' => 500,
                'items' => [
                    [
                        'name' => 'منتج تجريبي',
                        'quantity' => 2,
                        'price' => 250
                    ]
                ]
            ],
            [
                'id' => 'ORD-2024-002',
                'date' => '2024/10/16',
                'status' => 'shipped',
                'status_text' => 'تم الشحن',
                'total' => 750,
                'items' => [
                    [
                        'name' => 'منتج آخر',
                        'quantity' => 1,
                        'price' => 750
                    ]
                ]
            ],
            [
                'id' => 'ORD-2024-003',
                'date' => '2024/10/15',
                'status' => 'delivered',
                'status_text' => 'تم التوصيل',
                'total' => 320,
                'items' => [
                    [
                        'name' => 'منتج مُسلم',
                        'quantity' => 1,
                        'price' => 320
                    ]
                ]
            ]
        ];
        
        return view('orders.index', compact('orders'));
    }
}
