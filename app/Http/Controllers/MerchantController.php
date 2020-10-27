<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "ok";
        $merchants = Merchant::select('nama_merchant as name', 'kategori_objek_pajak as tax_category' , 'jam_buka as daily_open' , 'jam_tutup as daily_close' , 'nop' , 'alamat as address' , 'kota as city' , 'kontak as contact' , 'email' , 'lattitude' , 'longitude' , 'status')->get();

        foreach ($merchants as $key => $merchant) {
            $body = [
                "name" => $merchant->name,
                "tax_category" => $merchant->tax_category,
                "daily_open" => $merchant->daily_open,
                "daily_close" => $merchant->daily_close,
                "nop" => $merchant->nop,
                "address" => $merchant->address,
                "city" => $merchant->city,
                "contact" => $merchant->contact,
                "email" => $merchant->email,
                "lattitude" => $merchant->lattitude,
                "longitude" => $merchant->longitude,
                "status" => $merchant->status
            ];

            $response = Http::post('http://192.168.2.34:3000/api/v3/merchants' , $body);
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
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
