<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function dashboard()
    {
        // Statistics
        $stats = [
            'total_users' => User::where('is_admin', false)->count(),
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_vendors' => User::whereNotNull('store_name')->count(),
            'active_products' => Product::where('is_active', true)->count(),
            'pending_products' => Product::where('is_active', false)->count(),
            'users_today' => User::whereDate('created_at', today())->count(),
            'products_today' => Product::whereDate('created_at', today())->count(),
        ];

        // Recent activities
        $recent_users = User::where('is_admin', false)
            ->latest()
            ->take(5)
            ->get();

        $recent_products = Product::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        // Charts data
        $user_growth = [];
        $product_growth = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $user_growth[] = [
                'date' => $date->format('Y-m-d'),
                'count' => User::whereDate('created_at', $date)->count()
            ];
            $product_growth[] = [
                'date' => $date->format('Y-m-d'),
                'count' => Product::whereDate('created_at', $date)->count()
            ];
        }

        return view('admin.dashboard', compact(
            'stats', 
            'recent_users', 
            'recent_products', 
            'user_growth', 
            'product_growth'
        ));
    }

    public function users()
    {
        $users = User::where('is_admin', false)
            ->withCount(['products'])
            ->latest()
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function products()
    {
        $products = Product::with(['user', 'category'])
            ->latest()
            ->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::withCount(['products'])
            ->latest()
            ->paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    public function vendors()
    {
        $vendors = User::whereNotNull('store_name')
            ->where('store_status', 'approved')
            ->withCount(['products'])
            ->latest()
            ->paginate(20);

        return view('admin.vendors.index', compact('vendors'));
    }

    public function rejectedVendors()
    {
        $rejectedVendors = User::whereNotNull('store_name')
            ->where('store_status', 'rejected')
            ->withCount(['products'])
            ->latest('updated_at')
            ->paginate(20);

        return view('admin.vendors.rejected', compact('rejectedVendors'));
    }

    public function settings()
    {
        return view('admin.settings.index');
    }

    public function logs()
    {
        // This would typically come from a logs table
        $logs = [
            [
                'id' => 1,
                'user' => 'أحمد محمد',
                'action' => 'تسجيل دخول',
                'ip' => '192.168.1.1',
                'time' => '2024/10/17 08:30:00',
                'status' => 'success'
            ],
            [
                'id' => 2,
                'user' => 'فاطمة علي',
                'action' => 'إضافة منتج',
                'ip' => '192.168.1.2',
                'time' => '2024/10/17 08:25:00',
                'status' => 'success'
            ],
            [
                'id' => 3,
                'user' => 'محمد حسن',
                'action' => 'محاولة تسجيل دخول فاشلة',
                'ip' => '192.168.1.3',
                'time' => '2024/10/17 08:20:00',
                'status' => 'failed'
            ]
        ];

        return view('admin.logs.index', compact('logs'));
    }
}
