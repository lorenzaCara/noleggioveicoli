<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa la facciata DB per eseguire query

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->get();
        
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        DB::table('customers')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'license_number' => $request->input('license_number'),
        ]);
        
        return redirect()->route('customers.index')->with('success', 'Cliente registrato!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        DB::table('customers')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'license_number' => $request->input('license_number'),
            ]);
        
        return redirect()->route('customers.index')->with('success', 'Cliente aggiornato!');
    }

    public function destroy($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        
        return redirect()->route('customers.index')->with('success', 'Cliente eliminato!');
    }
}


