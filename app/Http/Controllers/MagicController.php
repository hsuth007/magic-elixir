<?php

namespace App\Http\Controllers;

use App\Magic;
//use App\Models\Magic;
use App\Http\Resources\Magic as MagicResource;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;

class MagicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $magic;


    public function index()
    {
//        $this->magic = DB::table(DB::raw('customers, customer_addresses, addresses, orders, payments'))
//                         ->leftJoin('cid', 'customer_id.street1');
        $this->magic = DB::table('customers')
                         ->join('customer_addresses','customers.cid', '=', 'customer_addresses.customer_id')
                         ->join('addresses', 'customers.cid', '=', 'addresses.customer_id')
                         ->join('orders', 'customers.cid', '=', 'orders.customer_id')
                         ->join('payments', 'customers.cid', '=', 'payments.customer_id')
                         ->select('customers.first_name', 'customers.last_name', 'customers.email')
                         ->select('addresses.*', 'orders.*', 'payments.*')
                         ->get();
        return response()->json($this->magic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name'    => 'required|max:64',
            'last_name'     => 'required|max:64',
            'email'         => 'required|max:256',
            'address'       => [
                                'street1'       => 'required',
                                'street2'       => 'required',
                                'city'          => 'required',
                                'state'         => 'required',
                                'zip'           => 'required'
                               ], 
            'phone'         => 'required',
            'payment'       => [
                                'cc_num'        => 'required',
                                'exp'           => 'required'
                               ],
            'quantity'      => 'required',
            'total'         => 'required'
        ];
        $messages = [];
        $request->validate($rules);
        $this->magic = Magic::create($request->all());
        return response()->json(['message' => 'id', 'magic' => $this->magic]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $result = DB::table('customers')
                    ->join('customer_addresses','customers.' + $id, '=', 'customer_addresses.customer_id')
                    ->join('addresses', 'customers.' + $id, '=', 'addresses.customer_id')
                    ->join('orders', 'customers.' + $id, '=', 'orders.customer_id')
                    ->join('payments', 'customers.' + $id, '=', 'payments.customer_id')
                    ->select('customers.first_name', 'customers.last_name', 'customers.email')
                    ->select('addresses.*', 'orders.*', 'payments.*')
                    ->get();
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function edit(Magic $magic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magic $magic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magic $id)
    {
        $magic = Magic::findOrFail($id);
        $magic->delete();
        return response()->json(null, 204);

    }
}
