<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        //menampilkan distributor
        $distributor = Distributor::all();
        return view('distributor.index', [
        'distributor' => $distributor
        ]);
    }

    public function create()
    {
        //menampilkan form tambah user
        return view('distributor.create');
    }

    public function store(Request $request)
    {
        //Menyimpan Data distributor baru
    $request->validate([
    'nama_distributor' => 'required',
    'alamat' => 'required',
    'notelepon' => 'required'

    ]);
    $array = $request->only([
    'nama_distributor',
     'alamat', 
     'notelepon'
    ]);

        Distributor::create($array);
        return redirect()->route('distributor.index') 
        ->with('success_message', 'Berhasil menambah distributor baru');
        }

public function edit($id)
    {
        //Menampilkan Form Edit
        $distributor = Distributor::find($id);
        if (!$distributor) return redirect()->route('distributor.index')
        ->with('error_message', 'distributor dengan id'.$id.' tidak
        ditemukan');
        return view('distributor.edit', [
        'distributor' => $distributor
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Distributor
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required'
            ]);
            $distributor = Distributor::find($id);
            $distributor->nama_distributor = $request->nama_distributor;
            $distributor->alamat = $request->alamat;
            $distributor->notelepon = $request->notelepon;
            $distributor->save();
            return redirect()->route('distributor.index')
            ->with('success_message', 'Berhasil mengubah distributor');
    }

    public function destroy($id)
    {
        //Menghapus distributor
        $distributor = Distributor::find($id);

        // if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri
        // sendiri.');
        if ($distributor) $distributor->delete();
        return redirect()->route('distributor.index')->with('success_message', 'Berhasil menghapus distributor');
    }
}