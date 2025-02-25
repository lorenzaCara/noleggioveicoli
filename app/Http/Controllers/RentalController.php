<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class RentalController extends Controller
{
    public function index()
    {
        $rentals = DB::table('rentals')
                    ->join('vehicles', 'rentals.vehicle_id', '=', 'vehicles.id')
                    ->join('customers', 'rentals.customer_id', '=', 'customers.id')
                    ->select('rentals.*', 'vehicles.model as vehicle_model', 'customers.name as customer_name')
                    ->get();

        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $vehicles = DB::table('vehicles')->get();  
        $customers = DB::table('customers')->get();  
        return view('rentals.create', compact('vehicles', 'customers'));  
    }

    public function store(Request $request)
    {
        DB::table('rentals')->insert([
            'vehicle_id' => $request->input('vehicle_id'),
            'customer_id' => $request->input('customer_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => null, 
            'total_cost' => $request->input('total_cost'),
            'status' => 'active',
        ]);

        return redirect()->route('rentals.index')->with('success', 'Noleggio registrato!');
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
        DB::table('rentals')
            ->where('id', $id)
            ->update([
                'vehicle_id' => $request->input('vehicle_id'),
                'customer_id' => $request->input('customer_id'),
                'total_cost' => $request->input('total_cost'),
            ]);
        
        return redirect()->route('rentals.index')->with('success', 'Noleggio aggiornato!');
    }

    public function destroy($id)
    {
        DB::table('rentals')->where('id', $id)->delete();
        
        return redirect()->route('rentals.index')->with('success', 'Noleggio eliminato!');
    }

    public function complete($id)
    {
        DB::table('rentals')
            ->where('id', $id)
            ->update([
                'status' => 'completed',
                'end_time' => now(),
            ]);
        
        return redirect()->route('rentals.index')->with('success', 'Noleggio completato!');
    }
}
