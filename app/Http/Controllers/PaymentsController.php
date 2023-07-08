<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $payments = Payments::all();
        return view('payments.payments', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Payments $payments)
    {
            $payments = new Payments() ;

            $payments->phone = $request->input('phone');
            $payments->user_id = $request->input('user_id');
            $payments->amount =$request->input('amount');
            $payments->from = $request->input('from');
            $payments->to = $request->input('to');
            $payments->month = $request->input('month');
            $payments->save();

        return view('payments.payments')->with('status' , 'Your amount Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments, $id)
    {
        $payments = Payments::findOrFail($id);
        return view('payments.edit-payments')->with('payments', $payments);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments, $id)
    {
        $payments = Payments::find($id) ;
        $payments->phone = $request->input('phone');
        $payments->user_id = $request->input('user_id');
        $payments->amount =$request->input('amount');
        $payments->from = $request->input('from');
        $payments->to = $request->input('to');
        $payments->month = $request->input('month');
        $payments->update();

        return view('payments.payments')->with('status' , 'Your amount Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments, $id)
    {

        $payments = Payments::findOrFail($id);
        $payments ->delete();
        return view('payments.payments')->with('status', 'Your amount is Deleted');
    }
}
