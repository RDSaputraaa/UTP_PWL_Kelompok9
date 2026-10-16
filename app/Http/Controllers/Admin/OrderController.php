<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
  
public function index()
{
    try {
        $orders = Order::with(['user', 'menu'])->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    } catch (Exception $e) {
        return back()->with('error', 'Gagal memuat data pesanan: ' . $e->getMessage());
    }
}

   public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:masuk,diproses,selesai',
    ]);

    try {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')
                       ->with('success', 'Status pesanan berhasil diperbarui.');
    } catch (Exception $e) {
        return back()->with('error', 'Gagal memperbarui status pesanan: ' . $e->getMessage());
    }
}
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('admin.orders.index')
                             ->with('success', 'Pesanan berhasil dihapus.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menghapus pesanan: ' . $e->getMessage());
        }
    }
}