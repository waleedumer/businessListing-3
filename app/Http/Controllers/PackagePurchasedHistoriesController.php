<?php

namespace App\Http\Controllers;

use App\Package;
use App\PackagePurchasedHistory;
use App\PackageUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackagePurchasedHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data=['page_name'=>'payment_history','page_title'=>'Report'];
        $purchase_histories=PackageUser::all();

        return view('admin.index',compact(['page_data','purchase_histories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data=['page_name'=>'offline_payments','page_title'=>'Offline_payments'];
        $users=User::all();
        $packages=Package::all();
        return view('admin.index',compact(['page_data','users','packages']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validity_in_days=Package::find($request['package_id'])->validity;
        $request['purchase_date']=now();
        $date_of_expiry=Carbon::createFromTimeString($request['purchase_date'])->addDays($validity_in_days);
        Package::find($request['package_id'])->user()->attach([
            1=>[
            'user_id'=>$request['user_id'],
            'purchase_date'=>$request['purchase_date'],
            'amount_paid'=>$request['amount_paid'],
            'payment_method'=>$request['payment_method'],
                'expired_date'=>$date_of_expiry,
            ]
        ]);
        return redirect(route('offline_payment.index'));
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
        $page_data=['page_name'=>'packages_invoice','page_title'=>'Invoice'];
        $purchase_history=PackageUser::find($id);
        return view('admin.index',compact(['page_data','purchase_history']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter_by_date(Request $request){

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        $get_all_user = PackagePurchasedHistory::whereDate('date','<=',$end->format('m-d-y'))
            ->whereDate('date','>=',$start->format('m-d-y'));
        $page_data=['page_name'=>'payment_history','page_title'=>'Report'];
        return view('admin.index', compact(['get_all_user','page_data']));

    }
}
