<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = DB::table('vehicles')->get();
        
        return view('vehicles.index', compact('vehicles'));
    }

    public function create($id = null)
    {
        $vehicle = $id ? DB::table('vehicles')->where('id', $id)->first() : null;

        return view('vehicles.create', compact('vehicle'));
    }

    public function store(Request $request)
    {
        DB::table('vehicles')->insert([
            'model' => $request->input('model'),
            'type' => $request->input('type'),
            'battery_capacity' => $request->input('battery_capacity'),
            'status' => $request->input('status'),
            'hourly_rate' => $request->input('hourly_rate'),
        ]);
        
        return redirect()->route('vehicles.index')->with('success', 'Veicolo aggiunto!');
    }

    public function show($id)
    {
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
        DB::table('vehicles')
            ->where('id', $id)
            ->update([
                'model' => $request->input('model'),
                'type' => $request->input('type'),
                'battery_capacity' => $request->input('battery_capacity'),
                'status' => $request->input('status'),
                'hourly_rate' => $request->input('hourly_rate'),
            ]);
        
        return redirect()->route('vehicles.index')->with('success', 'Veicolo aggiornato!');
    }

    public function destroy($id)
    {
        DB::table('vehicles')->where('id', $id)->delete();
        
        return redirect()->route('vehicles.index')->with('success', 'Veicolo eliminato!');
    }
}
