<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    // 1️⃣ Get a fresh copy of a product (doesn't modify original instance)
    public function freshExample($id)
    {
        $product = Product::findOrFail($id);
        $freshProduct = $product->fresh(); // original $product unchanged
        return response()->json($freshProduct);
    }

    // 2️⃣ Refresh the current product instance (updates instance from DB)
    public function refreshExample($id)
    {
        $product = Product::findOrFail($id);

        // You can manually modify before refresh to see difference
        // $product->name = "Temp Name";

        $product->refresh(); // now $product is synced with DB
        return response()->json($product);
    }

    // 3️⃣ Retrieve first active product
    public function firstActive()
    {
        $product = Product::where('active', 1)->first();
        return response()->json($product);
    }

    // 4️⃣ Create or update product
    public function updateOrCreateExample(Request $request)
    {
        $product = Product::updateOrCreate(
            ['name' => $request->name, 'category_id' => $request->category_id],
            ['price' => $request->price ?? 0, 'discounted' => $request->discounted ?? 0]
        );

        return response()->json($product);
    }

    // 5️⃣ Process large products safely using chunk
    public function processLargeProducts()
    {
        Product::chunk(200, function (Collection $products) {

            foreach ($products as $product) {

                // Example: update product name safely
                $product->name = $product->name . ' (processed)';
                $product->save();

                // Example: firstOrCreate
                $book = Product::firstOrCreate(['name' => 'Book']);

                // Example: firstOrNew
                $londonToParis = Product::firstOrNew(['name' => 'London to Paris']);
                $londonToParis->price = $londonToParis->price ?? 50;
                $londonToParis->save();

                // Count active products
                $activeCount = Product::where('active', 1)->count();

                // Max price
                $maxPrice = Product::where('active', 1)->max('price');
            }
        });

        return response()->json(['message' => 'Processed large products successfully']);
    }

    // 6️⃣ Delete a product safely
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => "Product {$id} deleted"]);
    }

    // 7️⃣ Get all products (simple list)
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
