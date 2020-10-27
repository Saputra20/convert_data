<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::with('devices')->get();

        foreach ($merchants as $key => $merchant) {
            $merchantResponse = Http::get('http://192.168.2.34:3000/api/v3/merchants/by-name/'.$merchant->nama_merchant);
            $merchant_value = $merchantResponse['data'];

            $merchant_array = [
                "_id" => $merchant_value['_id'],
                "nop" => $merchant->nop,
                "name" => $merchant->nama_merchant,
                "tax_category" => $merchant->kategori_objek_pajak,
                "daily_open" => $merchant->jam_buka,
                "daily_close" => $merchant->jam_tutup,
                "lattitude" => $merchant->lattitude,
                "longtitude" => $merchant->longitude,
                "status" => $merchant->status
            ];

            $device_array = [];
            foreach ($merchant->devices as $key => $device) {
                array_push($device_array , [
                    "name" => strtolower($device->nama_device),
                    "kode" => '-',
                    "pmt" => ($device->pmt == "Databox") ? "server" : strtolower($device->pmt),
                    "status" => $device->status,
                    "merchant" => $merchant_array
                ]);

            }

            $body = [
                "merchant_id" => $merchant_value['_id'],
                "devices" => $device_array
            ];

            $bodyMerchant = [
                "merchant_id" => $merchant_value['_id'],
                "merchant_name" => $merchant->nama_merchant,
                "tax_category" => $merchant->kategori_objek_pajak,
                "nop" => $merchant->nop,
                "year" => date('Y'),
                "address" => $merchant->alamat,
                "status" => $merchant->status
            ];

            Http::post("http://192.168.2.34:3000/api/v3/devices" , $body);
            Http::post("http://192.168.2.34:3000/api/v3/merchants/create-summary" , $bodyMerchant);
        }

        return "oks";
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
