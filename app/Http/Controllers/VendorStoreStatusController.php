<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorStoreStatusController extends Controller
{
    // Remove constructor middleware since it's already handled in routes

    public function storePending()
    {
        $user = Auth::user();
        
        // Check if user is a vendor
        if (!$user || $user->user_type !== 'vendor') {
            return redirect()->route('home')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        // If user doesn't have store_status, set it to pending
        if (is_null($user->store_status) && $user->store_name) {
            $user->update([
                'store_status' => 'pending',
                'store_submitted_at' => $user->store_created_at ?? now()
            ]);
            $user->refresh();
        }

        return view('vendor.store-pending', compact('user'));
    }
}
