<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Pemesan;
use DB;

class TiketController extends Controller
{
    //

    public function index()
    {
        return view("booking");
    }

    public function store(Request $request)
    {

        $request->validate([
    		'email' => 'required|unique:pemesan|max:255',
    		'nik' => 'required|unique:pemesan|max:255',
        ], [
		    'nik.unique' => 'NIK sudah digunakan.',
		    'email.unique' => 'Email sudah digunakan.',
		]);

        $pemesan = new Pemesan;
        $pemesan->name = $request->nama;
        $pemesan->email = $request->email;
        $pemesan->nik = $request->nik;
        $pemesan->save();

		$id_pemesan = $pemesan->id;

        $id_ticket = Tiket::generateTiketId();

        $tiket = new Tiket;
        $tiket->id_ticket = $id_ticket;
        $tiket->id_pemesan = $id_pemesan;
        $tiket->status = 0;
        $tiket->save();

        $id_ticket = base64_encode($id_ticket);

        return redirect('/pemesanan-success/'.$id_ticket);

    }

    public function pesananSukes($id)
    {

    	$id = base64_decode($id);

        $tikets = Tiket::where('id_ticket', $id)->first();

        return view("booking_sucess", compact("tikets"));
    }

    public function daftarPemesan()
    {
        $tikets = Tiket::All();
        return view("tiket/daftar_pemesan", compact("tikets"));
    }

    public function checkIn()
    {
        return view("tiket/check_in");
    }

    public function laporan()
    {
        $tikets = Tiket::All();
        return view("tiket/laporan", compact("tikets"));
    }

    public function checkInStore(Request $request)
    {
        $id_ticket = $request->id_ticket;
        $tiket = Tiket::where('id_ticket', $id_ticket)->first();

        $status = '';

        if(!empty($tiket)) {

        	if($tiket->status == 1) {

	        	return redirect('/admin/check-in')->withErrors(['msg' => 'ID Tiket telah digunakan.']);

        	} else {

		        Tiket::where('id_ticket', $id_ticket)
		            ->update([
		                'status' => 1
		            ]);

	        	$pemesan = Pemesan::where('id', $tiket->id_pemesan)->first();
		        $id_pemesan = base64_encode($tiket->id_pemesan);

		        return redirect('/admin/checked-in/'.$id_pemesan)->withSuccess(['msg' => 'ID Tiket ditemukan.']);

        	}

        } else {

			return redirect('/admin/check-in')->withErrors(['msg' => 'ID Tiket tidak ditemukan/salah.']);

        }
    }

    public function checkedIn($id)
    {
		$id = base64_decode($id);
	    $pemesan = Pemesan::where('id', $id)->first();

        return view("tiket/checked_in", compact("pemesan"));
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
	    $pemesan = Pemesan::findOrFail($tiket->id_pemesan);
        return view('tiket.edit_tiket', compact('tiket', 'pemesan'));
    }

    public function update(Request $request, $id)
    {

        $tiket = Tiket::findOrFail($id);

        Tiket::where('id', $id)
            ->update([
                'status' => $request->status_tiket,
            ]);
        
        Pemesan::where('id', $tiket->id_pemesan)
            ->update([
                'name' => $request->nama
            ]);

			return redirect('/admin/daftar-pemesan');

    }

    public function destroy($id)
    {
        $tikets = Tiket::where('id', $id)->first();
        $pemesanan = Pemesan::find($tikets->id_pemesan);
        $pemesanan->delete();

        $tiket = Tiket::find($id);
        $tiket->delete();
		
		return redirect('/admin/daftar-pemesan');
    }

}