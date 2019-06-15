<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;
use App\StockProduct;
use App\Log;
use App\Product;

class MainController extends Controller
{
    private function fetchStockProductRelation($stock_id, $product_id) {
        return StockProduct::where('stock_id', $stock_id)->where('product_id', $product_id)->first();
    }

    public function index() {
        $stocks = Stock::all();
        $products = Product::all();

        return view('welcome', compact('stocks', 'products'));
    }

    public function history(Stock $stock) {
        $stocks = Stock::all();
        $products = Product::all();

        return view('history', compact('stock', 'stocks', 'products'));
    }

    public function addLog(Request $request) {
        $item = StockProduct::where('stock_id', $request->stock_id)->where('product_id', $request->product_id)->first();

        if($request->balance < 0) {
            $request->note = 'Utgående balans';
        } else {
            $request->note = 'Ingående balans';
        }

        $this->logAction($request);

        $item->balance += $request->balance;
        $item->save();

        return back();
    }

    public function removeProduct(Request $request, Stock $stock, Product $product) {
        $relation = $this->fetchStockProductRelation($stock->id, $product->id);

        $relation->delete();

        Log::create([
            'stock_id' => $stock->id,
            'product_id' => $product->id,
            'quantity' => 0,
            'author' => $request->author,
            'note' => 'Borttagen produkt',
        ]);

        return back();
    }

    public function addNewProduct(Request $request) {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_nr' => $request->product_nr,
        ]);

        return back();
    }

    public function addExistingProduct(Request $request) {

        $product = StockProduct::firstOrCreate([
            'stock_id' => $request->stock_id,
            'product_id' => $request->product_id,
        ]);

        if(isset($product->quantity)) {
            $product->balance += $request->balance;

            if($request->balance < 0 ) {
                $request->note = 'Utgående balans';
            } else {
                $request->note = 'Ingående balans';
            }
        } else {
            $product->balance = $request->balance;

            $request->note = 'Tillagd produkt';
        }

        $product->save();

        $this->logAction($request);

        return back();
    }

    private function logAction($request) {
        Log::create([
            'stock_id' => $request->stock_id,
            'product_id' => $request->product_id,
            'quantity' => $request->balance,
            'author' => $request->author,
            'note' => isset($request->note) ? $request->note : NULL,
        ]);
    }

    public function editProduct(Request $request, Product $product) {
        $product->name = $request->name;
        $product->product_nr = $request->product_nr;
        $product->price = $request->price;
        $product->save();

        return back();
    }

    public function editStock(Request $request, Stock $stock) {
        $stock->city = $request->city;
        $stock->save();

        return back();
    }

    public function removeStock(Stock $stock) {
        StockProduct::where('stock_id', $stock->id)->delete();
        $stock->delete();

        return back();
    }

    public function addStock(Request $request) {
        Stock::create([
            'city' => $request->city,
        ]);

        return back();
    }

    public function removeLog(Log $log) {
        $log->delete();

        return back();
    }

    public function removeProductTotal(Product $product) {
        Log::where('product_id', $product->id)->delete();

        StockProduct::where('product_id', $product->id)->delete();

        $product->delete();

        return back();
    }

    public function editLog(Log $log) {


        return back();
    }
}
