<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingsController extends Controller
{
    public function settings()
    {
        $users = Auth::user();
        $categories = Category::all();

        return view('pages.dashboard-settings', [
            'users' => $users,
            'categories' => $categories,
        ]);
    }
    public function account()
    {
        $users = Auth::user();
        return view('pages.dashboard-account', [
            'users' => $users,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
