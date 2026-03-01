<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $categoryId = $request->query('category');
        $low = $request->boolean('low');

        $products = Product::with('category')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%{$q}%")
                        ->orWhere('sku', 'like', "%{$q}%");
                });
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($low, function ($query) {
                $query->whereColumn('stock', '<=', 'low_stock');
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        $categories = \App\Models\Category::orderBy('name')->get();

        return view('inventory.index', compact('products','q','categories','categoryId','low'));
    }

    public function edit(Product $product)
    {
        $logs = InventoryTransaction::with('product')
            ->where('product_id', $product->id)
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get();

        return view('inventory.edit', compact('product','logs'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'qty_change' => ['required','integer','not_in:0'],
            'note' => ['nullable','string','max:255'],
        ]);

        $change = (int)$data['qty_change'];
        $newStock = $product->stock + $change;

        if ($newStock < 0) {
            return back()->withErrors(['qty_change' => 'Tồn kho không đủ để trừ'])->withInput();
        }

        $product->update(['stock' => $newStock]);

        InventoryTransaction::create([
            'product_id' => $product->id,
            'qty_change' => $change,
            'note' => $data['note'] ?? null,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('inventory.edit', $product->id);
    }
}