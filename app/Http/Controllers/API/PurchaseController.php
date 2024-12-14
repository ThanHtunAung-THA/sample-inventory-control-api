<?php

namespace App\Http\Controllers\API;

use App\Model\Purchase;
use App\Model\DeletedPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;

class PurchaseController extends Controller
{
    // Display a listing of purchases
    public function get_by_latest()
    {
        $result = Purchase::orderBy('created_at', 'desc')->get();
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function getAllPurchaseBy10()
    {
        $result = Purchase::paginate(10);
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function get_by_id($id)
    {
        $purchase = Purchase::find($id);

        if ($purchase) {
            return response()->json(['status' => 'OK', 'data' => $purchase], 200);
        }

        return response()->json(['status' => 'NG', 'message' => 'Purchase not found'], 404);
    }
    
    // Store a newly created purchase in storage
    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'user_code' => 'required|string|max:50',
            'item_code' => 'required|string',
            'location' => 'required|string|max:10',
            'supplier' => 'required|string',
            'payment_type' => 'required|string',
            'currency' => 'required|string|max:10',
            'quantity' => 'required|numeric',
            'discount_and_foc' => 'nullable|numeric',
            'paid' => 'nullable|numeric',
            'total' => 'required|numeric',
            'balance' => 'nullable|numeric',
        ]);

        $purchase = Purchase::create($request->all());

        return response()->json(['status' => 'OK', 'message' => 'Purchase created successfully', 'purchase-data' => $purchase], 201);
    }

    // Update the specified purchase in storage
    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['status' => 'NG', 'message' => 'Purchase not found'], 404);
        }

        $request->validate([
            'date' => 'nullable|date',
            'user_code' => 'nullable|string|max:50',
            'item_code' => 'nullable|string',
            'location' => 'nullable|string|max:10',
            'supplier' => 'nullable|string',
            'payment_type' => 'nullable|string',
            'currency' => 'nullable|string|max:10',
            'quantity' => 'nullable|numeric',
            'discount_and_foc' => 'nullable|numeric',
            'paid' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
        ]);

        $purchase->update($request->all());

        return response()->json(['status' => 'OK', 'message' => 'Purchase updated successfully', 'data' => $purchase], 200);
    }

    // Remove the specified purchase from storage
    public function delete($id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['status' => 'NG', 'message' => 'Purchase not found'], 404);
        }

        $purchase->delete();

        return response()->json(['status' => 'OK', 'message' => 'Purchase deleted successfully'], 200);
    }

    // store the record and Remove the specified purchase from storage
    public function softdelete($id)
    {
        $purchase = Purchase::find($id);    // TODO: Implement soft-delete method. [ insert into deleted_list.tb with type = purchase. and del from purchase.tb]

        if (!$purchase) {
            return response()->json(['status' => 'NG', 'message' => 'Purchase not found'], 404);
        }
        DeletedPurchase::create([
            'purchase_id' => $purchase->id,
            'date' => $purchase->date,
            'user_code' => $purchase->user_code,
            'item_code' => $purchase->item_code,
            'location' => $purchase->location,
            'supplier' => $purchase->supplier,
            'payment_type' => $purchase->payment_type,
            'currency' => $purchase->currency,
            'quantity' => $purchase->quantity,
            'discount_and_foc' => $purchase->discount_and_foc,
            'paid' => $purchase->paid,
            'total' => $purchase->total,
            'balance' => $purchase->balance,


        ]);
        $purchase->delete();

        return response()->json(['status' => 'OK', 'message' => 'Purchase deleted successfully', 'deleted_data' => $purchase], 200);
    }
}
