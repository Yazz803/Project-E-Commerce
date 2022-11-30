<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MethodPayment;
use RealRashid\SweetAlert\Facades\Alert;

class MethodPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.methodPayments.index', [
            'title' => 'Method Payments',
            'methodPayments' => MethodPayment::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.methodPayments.create', [
            'title' => 'Add Method Payment',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $validateData['no_rek'] = $request->no_rek;

        MethodPayment::create($validateData);

        Alert::success('Success', 'Method Payment has been added');

        return redirect()->route('method-payments.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MethodPayment  $methodPayment
     * @return \Illuminate\Http\Response
     */
    public function show(MethodPayment $methodPayment)
    {
        return view('admin.methodPayments.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MethodPayment  $methodPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(MethodPayment $methodPayment)
    {
        return view('admin.methodPayments.edit', [
            'title' => 'Edit Method Payment',
            'methodPayment' => $methodPayment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MethodPayment  $methodPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MethodPayment $methodPayment)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $validateData['no_rek'] = $request->no_rek;

        $methodPayment->update($validateData);

        Alert::success('Success', 'Method Payment has been updated');

        return redirect()->route('method-payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MethodPayment  $methodPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(MethodPayment $methodPayment)
    {
        $methodPayment->where('id', $methodPayment->id)->delete();
        Alert::success('Success', 'Method Payment has been deleted');
        return back();
    }
}
