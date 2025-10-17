<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StoreApprovalController extends Controller
{
    /**
     * Display store approval requests
     */
    public function index()
    {
        $pendingStores = User::whereNotNull('store_name')
            ->where('store_status', 'pending')
            ->latest('store_submitted_at')
            ->paginate(20);

        $approvedStores = User::whereNotNull('store_name')
            ->where('store_status', 'approved')
            ->latest('store_approved_at')
            ->take(10)
            ->get();

        $rejectedStores = User::whereNotNull('store_name')
            ->where('store_status', 'rejected')
            ->latest('updated_at')
            ->take(10)
            ->get();

        $stats = [
            'pending_count' => User::whereNotNull('store_name')->where('store_status', 'pending')->count(),
            'approved_count' => User::whereNotNull('store_name')->where('store_status', 'approved')->count(),
            'rejected_count' => User::whereNotNull('store_name')->where('store_status', 'rejected')->count(),
            'today_submissions' => User::whereNotNull('store_name')
                ->whereDate('store_submitted_at', today())
                ->count(),
        ];

        return view('admin.store-approvals.index', compact(
            'pendingStores', 
            'approvedStores', 
            'rejectedStores', 
            'stats'
        ));
    }

    /**
     * Show store details for approval
     */
    public function show(User $user)
    {
        if (!$user->store_name) {
            abort(404, 'المتجر غير موجود');
        }

        return view('admin.store-approvals.show', compact('user'));
    }

    /**
     * Approve a store
     */
    public function approve(Request $request, User $user)
    {
        if (!$user->store_name || !in_array($user->store_status, ['pending', 'rejected'])) {
            return response()->json(['success' => false, 'message' => 'لا يمكن الموافقة على هذا المتجر']);
        }

        $user->approveStore();

        return response()->json([
            'success' => true,
            'message' => 'تم الموافقة على المتجر بنجاح',
            'store_name' => $user->store_name
        ]);
    }

    /**
     * Reject a store
     */
    public function reject(Request $request, User $user)
    {
        $request->validate([
            'reason' => 'required|string|max:500'
        ]);

        if (!$user->store_name || !in_array($user->store_status, ['pending', 'approved'])) {
            return response()->json(['success' => false, 'message' => 'لا يمكن رفض هذا المتجر']);
        }

        $user->rejectStore($request->reason);

        return response()->json([
            'success' => true,
            'message' => 'تم رفض المتجر',
            'store_name' => $user->store_name
        ]);
    }

    /**
     * Show rejected store requests
     */
    public function rejected()
    {
        $rejectedStores = User::whereNotNull('store_name')
            ->where('store_status', 'rejected')
            ->latest('updated_at')
            ->paginate(20);

        $stats = [
            'total' => $rejectedStores->total(),
            'this_week' => User::whereNotNull('store_name')
                ->where('store_status', 'rejected')
                ->where('updated_at', '>=', now()->subWeek())
                ->count(),
            'today' => User::whereNotNull('store_name')
                ->where('store_status', 'rejected')
                ->whereDate('updated_at', today())
                ->count(),
            'pending' => User::whereNotNull('store_name')
                ->where('store_status', 'pending')
                ->count(),
            'approved' => User::whereNotNull('store_name')
                ->where('store_status', 'approved')
                ->count(),
        ];

        return view('admin.store-approvals.rejected', compact('rejectedStores', 'stats'));
    }

    /**
     * Bulk approve stores
     */
    public function bulkApprove(Request $request)
    {
        $request->validate([
            'store_ids' => 'required|array',
            'store_ids.*' => 'exists:users,id'
        ]);

        $approvedCount = 0;
        $errors = [];

        foreach ($request->store_ids as $storeId) {
            $user = User::find($storeId);
            
            if ($user && $user->store_name && $user->store_status === 'pending') {
                $user->approveStore();
                $approvedCount++;
            } else {
                $errors[] = "المتجر ID: {$storeId} غير قابل للموافقة";
            }
        }

        if ($approvedCount > 0) {
            return response()->json([
                'success' => true,
                'message' => "تم الموافقة على {$approvedCount} متجر بنجاح",
                'approved_count' => $approvedCount,
                'errors' => $errors
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم الموافقة على أي متجر',
                'errors' => $errors
            ]);
        }
    }

    /**
     * Bulk reject stores
     */
    public function bulkReject(Request $request)
    {
        $request->validate([
            'store_ids' => 'required|array',
            'store_ids.*' => 'exists:users,id',
            'reason' => 'required|string|max:1000'
        ]);

        $rejectedCount = 0;
        $errors = [];

        foreach ($request->store_ids as $storeId) {
            $user = User::find($storeId);
            
            if ($user && $user->store_name && $user->store_status === 'pending') {
                $user->rejectStore($request->reason);
                $rejectedCount++;
            } else {
                $errors[] = "المتجر ID: {$storeId} غير قابل للرفض";
            }
        }

        if ($rejectedCount > 0) {
            return response()->json([
                'success' => true,
                'message' => "تم رفض {$rejectedCount} متجر بنجاح",
                'rejected_count' => $rejectedCount,
                'errors' => $errors
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم رفض أي متجر',
                'errors' => $errors
            ]);
        }
    }

    /**
     * Get stores by status for AJAX requests
     */
    public function getStores(Request $request)
    {
        $status = $request->get('status', 'all');
        $query = User::whereNotNull('store_name');

        if ($status !== 'all') {
            $query->where('store_status', $status);
        }

        $stores = $query->latest('store_submitted_at')->paginate(20);

        return response()->json([
            'stores' => $stores->items(),
            'pagination' => [
                'current_page' => $stores->currentPage(),
                'last_page' => $stores->lastPage(),
                'total' => $stores->total()
            ]
        ]);
    }
}
