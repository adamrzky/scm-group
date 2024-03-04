<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product2;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
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
        $unit = Unit::all();
        $product = Product2::where('id', $id)->firstOrFail();

        return view('backend.product2.product_qty', compact('product', 'supplier', 'category', 'unit'));
    } // End Method 

    public function ProductQtyUpdate(Request $request)
    {
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
