<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product2;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Customer;
use App\Models\Transaction;
use Auth;
use Illuminate\Support\Carbon;

class Product2Controller extends Controller
{
    public function ProductAll()
    {

        $product = Product2::latest()->get();
        // $ss = Supplier::latest()->get();
        // dd($ss);

        return view('backend.product2.product_all', compact('product'));
    } // End Method 


    public function ProductAdd()
    {

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product2.product_add', compact('supplier', 'category', 'unit'));
    } // End Method 


    public function ProductStore(Request $request)
    {

        // dd($request);

        // Menyimpan data ke dalam tabel Product2
        $product2 = new Product2();
        $product2->SLoc = $request->SLoc;
        $product2->MaterialNo = $request->MaterialNo;
        $product2->MaterialDesscription = $request->MaterialDesscription;
        $product2->Qty = $request->Qty;
        $product2->Uom = $request->Uom;
        $product2->SystemBatch = $request->SystemBatch;
        $product2->VendorBatch = $request->VendorBatch;
        $product2->created_by = Auth::user()->id;
        $product2->created_at = now();
        $product2->save();

        // Menggunakan ID yang baru saja dimasukkan ke dalam tabel Product2 untuk menyimpan data ke dalam tabel Transaction
        $transaction = new Transaction();
        $transaction->status_trx = $request->status_trx;
        $transaction->date = now();
        $transaction->qty_in = $request->Qty;
        $transaction->product_id = $product2->id; // Menggunakan ID dari data yang baru saja dimasukkan ke dalam Product2
        $transaction->description = $request->description;
        $transaction->created_by = Auth::user()->id;
        $transaction->status = '0';
        $transaction->status_trx = '0';
        $transaction->save();



        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product2.all')->with($notification);
    } // End Method 


    public function ProductBatchStore(Request $request)
    {

        // dd($request);

        Product2::insert([

            'SLoc' => $request->SLoc,
            'MaterialNo' => $request->MaterialNo,
            'MaterialDesscription' => $request->MaterialDesscription,
            'Qty' => $request->Qty,
            'Uom' => $request->Uom,
            'SystemBatch' => $request->SystemBatch,
            'VendorBatch' => $request->VendorBatch,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product2.all')->with($notification);
    } // End Method 



    public function ProductEdit($id)
    {

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product2::where('id', $id)->firstOrFail();

        return view('backend.product2.product_edit', compact('product', 'supplier', 'category', 'unit'));
    } // End Method 

    public function ProductBatch($id)
    {

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product2::where('id', $id)->firstOrFail();

        return view('backend.product2.product_batch', compact('product', 'supplier', 'category', 'unit'));
    } // End Method 

    public function ProductQty($id)
    {

        $supplier = Supplier::all();
        $category = Category::all();
        $costomer = Customer::all();
        $unit = Unit::all();
        $product = Product2::where('id', $id)->firstOrFail();

        return view('backend.product2.product_qty', compact('product', 'supplier', 'category', 'unit', 'costomer'));
    } // End Method 


    //pengurangan qty produk
    public function ProductQtyUpdate(Request $request)
    {

        // dd($request);
        try {
            $product = Product2::findOrFail($request->id);

            // Validasi jika reduce_qty lebih besar dari qty
            $reduceQty = $request->reduce_qty;
            if ($reduceQty > $product->Qty) {
                $notification = [
                    'message' => 'Reduce Qty cannot be greater than Qty.',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }

            // Mengurangi qty dengan nilai yang diberikan pada form pengurangan qty
            $product->Qty -= $reduceQty;

            // Update data di database
            $product->update([
                // Field lainnya yang tidak diubah
                'SLoc' => $request->SLoc,
                'MaterialNo' => $request->MaterialNo,
                'MaterialDesscription' => $request->MaterialDesscription,
                'Uom' => $request->Uom,
                'SystemBatch' => $request->SystemBatch,
                'VendorBatch' => $request->VendorBatch,
                'created_by' => $request->created_by,
                'updated_by' => Auth::user()->id,
                'created_at' => $request->created_at,
                'updated_at' => now(),
            ]);


            //historyTran

            $request->validate([
                'customer_id' => 'required',
            ]);

            $transaction = new Transaction();
            $transaction->date = date('Y-m-d', strtotime($request->date));
            $transaction->purchase_no = $request->purchase_no;
            // $transaction->supplier_id = $request->supplier_id;
            // $transaction->category_id = $request->category_id;
            $transaction->customer_id = $request->customer_id;

            $transaction->product_id = $request->id;
            $transaction->buying_qty = $request->reduce_qty;
            $transaction->qty_out = $request->reduce_qty;
            // $transaction->unit_price = $request->unit_price;
            // $transaction->buying_price = $request->buying_price;
            $transaction->description = $request->description;

            $transaction->created_by = Auth::user()->id;
            $transaction->status = '1';
            $transaction->status_trx = '1';
            $transaction->save();


            $notification = [
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('product2.all')->with($notification);
        } catch (\Illuminate\Database\QueryException $e) {
            $notification = [
                'message' => 'Product not found or could not be updated.',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }




    public function ProductUpdate(Request $request)
    {
        try {
            // $product = Product2::where('SystemBatch', $request->SystemBatch)->firstOrFail();

            // $product->update([

            $product_id = $request->id;

            // dd($request);

            Product2::findOrFail($product_id)->update([


                'SLoc' => $request->SLoc,
                'MaterialNo' => $request->MaterialNo,
                'MaterialDesscription' => $request->MaterialDesscription,
                'Qty' => $request->Qty,
                'Uom' => $request->Uom,
                'SystemBatch' => $request->SystemBatch,
                'VendorBatch' => $request->VendorBatch,
                // 'created_by' => $request->created_by,
                // 'updated_by' => Auth::user()->id,
                // 'created_at' => $request->created_at, // Pastikan format tanggal sesuai dengan format yang diterima oleh database Anda
                // 'updated_at' => now(),
            ]);

            $notification = [
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('product2.all')->with($notification);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $notification = [
                'message' => 'Product not found.',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }


    public function ProductDelete($id)
    {

        Product2::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 



}
