<?php

namespace App\Http\Controllers\API;

use App\Model\Sale;
use App\Model\DeletedSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;

class SaleController extends Controller
{
    // Display a listing of sales
    public function get_by_latest()
    {
        $result = Sale::orderBy('created_at', 'desc')->get();
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function getAllSaleBy10()
    {
        $result = Sale::paginate(10);
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function get_by_id($id)
    {
        $sale = Sale::find($id);

        if ($sale) {
            return response()->json(['status' => 'OK', 'data' => $sale], 200);
        }

        return response()->json(['status' => 'NG', 'message' => 'Sale not found'], 404);
    }
    
    // Store a newly created sale in storage
    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'user_code' => 'required|string|max:50',
            'item_code' => 'required|string',
            'location' => 'required|string|max:10',
            'customer' => 'required|string',
            'payment_type' => 'required|string',
            'currency' => 'required|string|max:10',
            'quantity' => 'required|numeric',
            'discount_and_foc' => 'nullable|numeric',
            'paid' => 'nullable|numeric',
            'total' => 'required|numeric',
            'balance' => 'nullable|numeric',
        ]);

        $sale = Sale::create($request->all());

        return response()->json(['status' => 'OK', 'message' => 'Sale created successfully', 'sale-data' => $sale], 201);
    }

    // Update the specified sale in storage
    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['status' => 'NG', 'message' => 'Sale not found'], 404);
        }

        $request->validate([
            'date' => 'nullable|date',
            'user_code' => 'nullable|string|max:50',
            'item_code' => 'nullable|string',
            'location' => 'nullable|string|max:10',
            'customer' => 'nullable|string',
            'payment_type' => 'nullable|string',
            'currency' => 'nullable|string|max:10',
            'quantity' => 'nullable|numeric',
            'discount_and_foc' => 'nullable|numeric',
            'paid' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
        ]);

        $sale->update($request->all());

        return response()->json(['status' => 'OK', 'message' => 'Sale updated successfully', 'data' => $sale], 200);
    }

    // Remove the specified sale from storage
    public function delete($id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['status' => 'NG', 'message' => 'Sale not found'], 404);
        }

        $sale->delete();

        return response()->json(['status' => 'OK', 'message' => 'Sale deleted successfully'], 200);
    }

    // store the record and Remove the specified sale from storage
    public function softdelete($id)
    {
        $sale = Sale::find($id);    // TODO: Implement soft-delete method. [ insert into deleted_list.tb with type = sale. and del from sale.tb]

        if (!$sale) {
            return response()->json(['status' => 'NG', 'message' => 'Sale not found'], 404);
        }
        DeletedSale::create([
            'sale_id' => $sale->id,
            'date' => $sale->date,
            'user_code' => $sale->user_code,
            'item_code' => $sale->item_code,
            'location' => $sale->location,
            'customer' => $sale->customer,
            'payment_type' => $sale->payment_type,
            'currency' => $sale->currency,
            'quantity' => $sale->quantity,
            'discount_and_foc' => $sale->discount_and_foc,
            'paid' => $sale->paid,
            'total' => $sale->total,
            'balance' => $sale->balance,


        ]);
        $sale->delete();

        return response()->json(['status' => 'OK', 'message' => 'Sale deleted successfully', 'deleted_data' => $sale], 200);
    }
}
