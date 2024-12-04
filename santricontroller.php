<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class santricontroller extends Controller
{
    public function datasantri(){
        $mhs1 = 'fawaz'; $asal1 ='jakarta';
        $mhs2 = 'inaya'; $asal2 = 'jombang';
        $mhs3 = 'zidan'; $asal3 = 'binjai';
        $mhs4 = 'bambang'; $asal4 = 'mojokerto';
        $mhs5 = 'unyil'; $asal5 = 'bangdung';
        return view('data_santri',
        compact('mhs1','mhs2','mhs3','mhs4','mhs5','asal1','asal2','asal3','asal4','asal5')
    ); 
    }
}
