<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    // Get a fresh copy (does NOT modify original instance)
    public function freshExample($id)
    {
        $product = Product::findOrFail($id);
        return $product->fresh();
    }

    // Refresh the current instance (modifies object)
    public function refreshExample($id)
    {
        $product = Product::findOrFail($id);
        $product->refresh();
        return $product;
    }

    // Retrieve first active product
    public function firstActive()
    {
        return Product::where('active', 1)->first();
    }

    // Create or update product
    public function updateOrCreateExample(Request $request)
    {
        return Product::updateOrCreate(
            [
                'name' => $request->name,
                'category_id' => $request->category_id
            ],
            [
                'price' => $request->price,
                'discounted' => $request->discounted
            ]
        );
    }

    // Process large datasets safely
    public function processLargeProducts()
    {
        Product::chunk(200, function (Collection $products) {
            foreach ($products as $product) {

                // Example processing logic
                if ($product->active) {
                    $product->price += 10;
                    $product->save();
                }
            }
        });

        return response()->json(['status' => 'Products processed']);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Product::class); // ✅

        return Product::create($request->all());
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product); // ✅

        $product->update($request->all());

        return $product;
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product); // ✅

        $product->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
