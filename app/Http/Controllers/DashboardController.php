<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $item = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
        ];
        return view('dashboard.pages.dashboard', [
            'items' => $item, 
            'income' => $income, 
            'sales' => $sales, 
            'pie' => $pie
        ]);
    }
}
