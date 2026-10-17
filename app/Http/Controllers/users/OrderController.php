<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public const MAX_QUANTITY = 20;
    private const CANCELLABLE_STATUS = ['masuk'];

    public function index()
    {
        $orders = Order::with('menu')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('user.orders.index', [
            'orders' => $orders,
            'cancellable' => self::CANCELLABLE_STATUS,
        ]);
    }

    public function create(Menu $menu)
    {
        return view('user.orders.create', [
            'menu' => $menu,
            'maxQuantity' => self::MAX_QUANTITY,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id'  => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1|max:' . self::MAX_QUANTITY,
            'notes'    => 'nullable|string|max:255',
        ], [
            'menu_id.required'  => 'Menu belum dipilih.',
            'menu_id.exists'    => 'Menu yang kamu pilih tidak ditemukan.',
            'quantity.required' => 'Jumlah porsi wajib diisi.',
            'quantity.integer'  => 'Jumlah porsi harus berupa angka.',
            'quantity.min'      => 'Pesan minimal 1 porsi.',
            'quantity.max'      => 'Pesan maksimal ' . self::MAX_QUANTITY . ' porsi per pesanan.',
            'notes.max'         => 'Catatan maksimal 255 karakter.',
        ]);

        $menu = Menu::findOrFail($data['menu_id']);
        $quantity = (int) $data['quantity'];

        Order::create([
            'user_id'     => auth()->id(),
            'menu_id'     => $menu->id,
            'quantity'    => $quantity,
            'total_price' => $menu->harga * $quantity,
            'notes'       => $data['notes'] ?? null,
            'status'      => 'masuk',
        ]);

        return redirect()
            ->route('user.orders.index')
            ->with('success', 'Pesanan ' . $menu->nama_menu . ' berhasil dibuat.');
    }

    public function destroy(Order $order)
    {
        abort_unless((int) $order->user_id === (int) auth()->id(), 403);

        if (! in_array($order->status, self::CANCELLABLE_STATUS, true)) {
            return redirect()
                ->route('user.orders.index')
                ->with('error', 'Pesanan sudah diproses penjual, jadi tidak bisa dibatalkan lagi.');
        }

        $order->delete();

        return redirect()
            ->route('user.orders.index')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
