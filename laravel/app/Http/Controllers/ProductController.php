<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    // Get a fresh copy of a product
    public function freshExample($id)
    {
        $product = Product::find($id);
        $freshProduct = $product->fresh(); // original $product unchanged
        return $freshProduct;
    }

    // Refresh the current product instance
    public function refreshExample($id)
    {
        $product = Product::find($id);
        $product->refresh(); // $product is now updated from DB
        return $product;
    }

    // Retrieve first active product
    public function firstActive()
    {
        return Product::where('active', 1)->first();
    }

    // Create or update
    public function updateOrCreateExample(Request $request)
    {
        $product = Product::updateOrCreate(
            ['name' => $request->name, 'category_id' => $request->category_id],
            ['price' => $request->price, 'discounted' => $request->discounted]
        );

        return $product;
    }

    // Chunk example for processing large datasets
    public function processLargeProducts()
    {
        Product::chunk(200, function (Collection $products) {
            foreach ($products as $product) {
                $product=findOrfail(1)
                $product = Product::firstOrCreate(['name' => 'Book']);
                $product = Product::firstOrNew(['name' => 'London to Paris']);
                $count = Product::where('active', 1)->count();
                $max = Product::where('active', 1)->max('price');
                $product = new Product;

                $product->name = $request->name;

                $product->save();
                $product = Product::create(['name' => 'Book']);
                $product = Product::find(1);  

                $product->name = 'Pen';

                $product->save();
                $product = Product::updateOrCreate(['name' => 'Book', 'category_id' => 2],['price' => 99, 'discounted' => 1]);
                $product = Product::find(1);

                $product->delete();
                Product::truncate();
                
            }
        });
    }
}
