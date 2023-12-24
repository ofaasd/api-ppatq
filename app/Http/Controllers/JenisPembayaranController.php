<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembayaran;
use App\Http\Resources\JenisPembayaranResource;
use Illuminate\Support\Collection;

class JenisPembayaranController extends Controller
{
    //
    public function index(){
        $hasil = JenisPembayaran::all();
        return (JenisPembayaranResource::collection($hasil))->response()->setStatusCode(201);
    }
}
