<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function PurchaseAll()
    {

        // $customer = Customer::findOrFail($id);
        $allData = Transaction::where('status_trx', 1)
            ->orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        // dd($allData);
        return view('backend.transaction.purchase_all', compact('allData'));
    }

    public function purchaseDetail($systemBatch)
    {
        $batch = $systemBatch ;
        $allData = Transaction::whereHas('product2', function ($query) use ($systemBatch) {
            $query->where('SystemBatch', $systemBatch);
        })->orderBy('date', 'desc')
          ->orderBy('id', 'desc')
          ->get();
    
        return view('backend.transaction.purchase_detail', compact('allData','batch'));
    }
    


    public function PurchaseInAll()
    {

        // $customer = Customer::findOrFail($id);
        $allData = Transaction::where('status_trx', 0)
            ->orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return view('backend.transaction.purchase_all_inbound', compact('allData'));
    } // End Method 


    public function PurchaseAdd()
    {

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.transaction.purchase_add', compact('supplier', 'unit', 'category'));
    } // End Method 


    public function PurchaseStore(Request $request)
    {

        if ($request->category_id == null) {

            $notification = array(
                'message' => 'Sorry you do not select any item',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {

            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];

                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];

                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            } // end foreach
        } // end else 

        $notification = array(
            'message' => 'Data Save Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.all')->with($notification);
    } // End Method 


    public function PurchaseDelete($id)
    {

        Transaction::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Purchase Iteam Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method 


    public function PurchasePending()
    {

        $allData = Transaction::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.purchase.purchase_pending', compact('allData'));
    } // End Method 


    public function PurchaseApprove($id)
    {

        $purchase = Transaction::findOrFail($id);
        $product = Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
        $product->quantity = $purchase_qty;

        if ($product->save()) {

            Transaction::findOrFail($id)->update([
                'status' => '1',
            ]);

            $notification = array(
                'message' => 'Status Approved Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('purchase.all')->with($notification);
        }
    } // End Method 


    public function DailyPurchaseReport()
    {
        return view('backend.purchase.daily_purchase_report');
    } // End Method 


    public function DailyPurchasePdf(Request $request)
    {

        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));
        $allData = Transaction::whereBetween('date', [$sdate, $edate])->where('status', '1')->get();


        $start_date = date('Y-m-d', strtotime($request->start_date));
        $end_date = date('Y-m-d', strtotime($request->end_date));
        return view('backend.pdf.daily_purchase_report_pdf', compact('allData', 'start_date', 'end_date'));
    } // End Method 




}
