<?php

namespace App\Http\Controllers\Api;

use App\Events\ProductUpdated;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        $sortBy  = in_array($request->sort_by, ['name', 'price', 'stock', 'category', 'created_at'])
            ? $request->sort_by : 'created_at';
        $sortDir = $request->sort_dir === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $sortDir);

        return response()->json(['products' => $query->get()], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'stock'    => 'required|integer|min:0',
            'price'    => 'required|numeric|min:0',
            'img'      => 'nullable|string|max:10',
        ]);

        $product = Product::create([
            'name'     => $request->name,
            'category' => $request->category,
            'stock'    => (int) $request->stock,
            'price'    => (float) $request->price,
            'img'      => $request->img ?? '📦',
            'trend'    => '+0%',
        ]);

        broadcast(new ProductUpdated('created', $product))->toOthers();

        return response()->json(['message' => 'Product added!', 'product' => $product], 201);
    }

    public function show($id)
    {
        return response()->json(['product' => Product::findOrFail($id)], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'     => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:100',
            'stock'    => 'sometimes|integer|min:0',
            'price'    => 'sometimes|numeric|min:0',
            'img'      => 'nullable|string|max:10',
            'trend'    => 'nullable|string|max:20',
        ]);

        $product->update($request->only(['name', 'category', 'stock', 'price', 'img', 'trend']));

        broadcast(new ProductUpdated('updated', $product))->toOthers();

        return response()->json(['message' => 'Product updated!', 'product' => $product], 200);
    }

    public function destroy($id)
    {
        $product   = Product::findOrFail($id);
        $productId = $product->id;
        $product->delete();

        broadcast(new ProductUpdated('deleted', null, $productId))->toOthers();

        return response()->json(['message' => 'Product deleted.'], 200);
    }
}
