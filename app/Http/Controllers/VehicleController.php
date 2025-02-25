<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa la facciata DB per eseguire query

class VehicleController extends Controller
{
    public function index()
    {
        // Esegui una query per recuperare tutti i veicoli
        $vehicles = DB::table('vehicles')->get();
        
        // Passa i veicoli alla vista
        return view('vehicles.index', compact('vehicles'));
    }

    public function create($id = null)
    {
        $vehicle = $id ? DB::table('vehicles')->where('id', $id)->first() : null;

        return view('vehicles.create', compact('vehicle'));
    }

    public function store(Request $request)
    {
        // Esegui una query per inserire un nuovo veicolo
        DB::table('vehicles')->insert([
            'model' => $request->input('model'),
            'type' => $request->input('type'),
            'battery_capacity' => $request->input('battery_capacity'),
            'status' => $request->input('status'),
            'hourly_rate' => $request->input('hourly_rate'),
        ]);
        
        // Reindirizza alla lista veicoli
        return redirect()->route('vehicles.index')->with('success', 'Veicolo aggiunto!');
    }

    public function show($id)
    {
        // Recupera il veicolo specifico con una query
        $vehicle = DB::table('vehicles')->where('id', $id)->first();
        
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = DB::table('vehicles')->where('id', $id)->first();

        return view('vehicles.create', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        // Esegui una query per aggiornare il veicolo
        DB::table('vehicles')
            ->where('id', $id)
            ->update([
                'model' => $request->input('model'),
                'type' => $request->input('type'),
                'battery_capacity' => $request->input('battery_capacity'),
                'status' => $request->input('status'),
                'hourly_rate' => $request->input('hourly_rate'),
            ]);
        
        // Reindirizza alla lista veicoli
        return redirect()->route('vehicles.index')->with('success', 'Veicolo aggiornato!');
    }

    public function destroy($id)
    {
        // Esegui una query per eliminare il veicolo
        DB::table('vehicles')->where('id', $id)->delete();
        
        // Reindirizza alla lista veicoli
        return redirect()->route('vehicles.index')->with('success', 'Veicolo eliminato!');
    }
}
