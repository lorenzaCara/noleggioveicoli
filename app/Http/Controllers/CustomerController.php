<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa la facciata DB per eseguire query

class CustomerController extends Controller
{
    public function index()
    {
        // Recupera tutti i clienti dalla tabella
        $customers = DB::table('customers')->get();
        
        // Passa i clienti alla vista
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Esegui una query per inserire un nuovo cliente
        DB::table('customers')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'license_number' => $request->input('license_number'),
        ]);
        
        // Reindirizza alla lista clienti
        return redirect()->route('customers.index')->with('success', 'Cliente registrato!');
    }

    public function show($id)
    {
        // Recupera il cliente specifico
        $customer = DB::table('customers')->where('id', $id)->first();
        
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        // Recupera il cliente da modificare
        $customer = DB::table('customers')->where('id', $id)->first();
        
        return view('customers.create', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Esegui una query per aggiornare i dettagli del cliente
        DB::table('customers')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'license_number' => $request->input('license_number'),
            ]);
        
        // Reindirizza alla lista clienti
        return redirect()->route('customers.index')->with('success', 'Cliente aggiornato!');
    }

    public function destroy($id)
    {
        // Esegui una query per eliminare il cliente
        DB::table('customers')->where('id', $id)->delete();
        
        // Reindirizza alla lista clienti
        return redirect()->route('customers.index')->with('success', 'Cliente eliminato!');
    }
}


