<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $transactions = Transaction::with('product')
                        ->latest()
                        ->get();

        return view(
            'transactions.transaksi',
            compact(
                'products',
                'transactions'
            )
        );
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail(
            $request->product_id
        );

        if ($request->qty > $product->stok) {

            return back()->with(
                'error',
                'Stok tidak mencukupi!'
            );
        }

        $total = $product->harga * $request->qty;

        Transaction::create([
            'product_id' => $product->id,
            'qty' => $request->qty,
            'total' => $total,
        ]);

        $product->update([
            'stok' => $product->stok - $request->qty
        ]);

        return redirect()
            ->route('transactions.index')
            ->with(
                'success',
                'Transaksi berhasil ditambahkan'
            );
    }
}