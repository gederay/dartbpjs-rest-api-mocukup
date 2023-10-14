<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function place_order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // validating request
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        }

        $order_details = [];

        $order = new Order();
        $order->id = 100000 + Order::all()->count() + 1;
        $order->transaction_id = $order->id;

        if (Order::find($order->id)) {
            $order->id = Order::orderBy('id', 'desc')->first()->id + 1;
            $order->transaction_id = $order->id;
        }

        $order->user_id = $request->user()->id;
        $order->order_amount = $request['order_amount'];

        $order->created_at = now();
        $order->updated_at = now();

        $or_d = [
            "id" => $request['id'],
            "transactionId" => $request['transactionId'],
            "faskesName" => $request['faskesName'],
            "faskesAddress" => $request['faskesAddress'],
            "faskesCoordinate" => $request['faskesCoordinate'],
            "patientName" => $request['patientName'],
            "phoneNumber" => $request['phoneNumber'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $order_details[] = $or_d;

        try {
            $order->save();

            foreach ($order_details as $key => $item) {
                $order_details[$key]['id'] = $order->id;
            }

            try {
                OrderDetail::insert($order_details);
            } catch (\Exception $e) {
                return response()->json($e, 501);
            }
            $customer = $request->user();
            $customer->save();

            return response()->json([
                'message' => trans('messages.order_placed_successfully'),
                'order_id' => $order->id,
                'order' => $order,
                'order details' => $order_details
            ], 200);
        } catch (\Exception $e) {
            info($e);
            return response()->json([$e], 500);
        }


        return response()->json([
            'errors' => [
                ['code' => 'order_time', 'message' => trans('messages.failed_to_place_order')]
            ]
        ], 403);
    }

    public function get_order_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transactionId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => "No data"], 403);
        }

        $details = OrderResource::collection(
            OrderDetail::whereHas('order', function ($query) use ($request) {
                return $query->where('user_id', $request->user()->id);
            })->where(['transactionId' => $request['transactionId']])->get()
        );

        if ($details->count() > 0) {
            return response()->json(
                $details,
                200
            );
        } else {
            return response()->json([
                'errors' => [
                    ['code' => 'order', 'message' => trans('messages.not_found')]
                ]
            ], 404);
        }
    }
}
