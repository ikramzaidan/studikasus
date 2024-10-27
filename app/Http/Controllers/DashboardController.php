<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\User;
use App\Models\UserFeature;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard.
     */
    public function index()
    {
        $users = User::with(['features'])->get();
        $features = Feature::withCount('users')->orderByDesc('users_count')->get();
        $userFeatures = UserFeature::with(['user', 'feature'])->orderBy('created_at', 'desc')->get();

        return view('dashboard', compact('users', 'features', 'userFeatures'));
    }
}
