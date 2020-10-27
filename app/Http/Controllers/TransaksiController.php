<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::connection('mysql2')->table('transaksi_2020_08_aug')->get();
        foreach ($transactions as $key => $value) {
            try {
                $devicename = strtolower($value->DeviceId);
                
                $deviceResponse = http::get('http://192.168.2.34:3000/api/v3/devices/by-name/' . $devicename);
                $idMerchant = $deviceResponse['data']['merchant']['_id'];
                $body = array(
                    "deviceId" => $devicename,
                    "trxId" => $value->TrxId,
                    "trxDate" => $value->TrxDate,
                    "trxAmount" => $value->TrxAmount,
                    "trxService" => $value->TrxService,
                    "trxTax" => $value->TrxTax,
                    "taxType" => $value->TaxType,
                    "rawData" => $value->RawData,
                    "status" => $value->status,
                    "idMerchant" => $idMerchant
                );

                Http::post('http://192.168.2.34:3000/api/v3/transactions', $body);
                print_r($key . " Inserted Aug\n");
                DB::connection('mysql2')->table('transaksi_2020_08_aug')->delete($value->id);
            } catch (\Throwable $th) {
                print_r($th->getMessage());
                print_r("Eren hela cape koplok\n");
                exit;
            }
        }
    }

    public function sep(){
        $transactions = DB::connection('mysql2')->table('transaksi_2020_09_sep')->get();
        foreach ($transactions as $key => $value) {
            try {
                $devicename = strtolower($value->DeviceId);
                
                $deviceResponse = http::get('http://192.168.2.34:3000/api/v3/devices/by-name/' . $devicename);
                $idMerchant = $deviceResponse['data']['merchant']['_id'];
                $body = array(
                    "deviceId" => $devicename,
                    "trxId" => $value->TrxId,
                    "trxDate" => $value->TrxDate,
                    "trxAmount" => $value->TrxAmount,
                    "trxService" => $value->TrxService,
                    "trxTax" => $value->TrxTax,
                    "taxType" => $value->TaxType,
                    "rawData" => $value->RawData,
                    "status" => $value->status,
                    "idMerchant" => $idMerchant
                );

                Http::post('http://192.168.2.34:3000/api/v3/transactions', $body);
                print_r($key . " Inserted Sep\n");
                DB::connection('mysql2')->table('transaksi_2020_09_sep')->delete($value->id);
            } catch (\Throwable $th) {
                print_r($th->getMessage());
                print_r("Eren hela cape koplok\n");
                exit;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
