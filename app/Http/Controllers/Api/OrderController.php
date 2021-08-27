<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderCollection;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order){
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            new OrderCollection($this->orders->orderBy('id','desc')->get())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return false
     */
    public function store(OrderRequest $request)
    {
        $existFood = $this->validateFood($request->user_id, $request->food_id);
        if($existFood > 0) {
            return response()->json("false");
        }else{
            $order = $this->order->create($request->all());
            return response()->json(new OrderResource($order), 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Order $order): JsonResponse
    {
        $order->delete();
        return response()->json(null, 204);
    }

    public function getOrder($user_id): JsonResponse
    {
        $orders = Order::with('food')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return response()->json($orders);
    }

    public function validateFood($user_id, $food_id) {
        $orders = Order::where('user_id', $user_id)->where('food_id',$food_id)->count();
        return $orders;
    }
}
