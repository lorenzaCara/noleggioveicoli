<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa la facciata DB per eseguire query

class RentalController extends Controller
{
    public function index()
    {
        // Recupera tutti i noleggi dalla tabella, includendo i dati del veicolo e del cliente
        $rentals = DB::table('rentals')
                    ->join('vehicles', 'rentals.vehicle_id', '=', 'vehicles.id')
                    ->join('customers', 'rentals.customer_id', '=', 'customers.id')
                    ->select('rentals.*', 'vehicles.model as vehicle_model', 'customers.name as customer_name')
                    ->get();

        // Passa i noleggi alla vista
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $vehicles = DB::table('vehicles')->get();  // Recupera i veicoli
        $customers = DB::table('customers')->get();  // Recupera i clienti
        return view('rentals.create', compact('vehicles', 'customers'));  // Passa i veicoli e i clienti alla vista
    }

    public function store(Request $request)
    {
        // Esegui una query per inserire un nuovo noleggio
        DB::table('rentals')->insert([
            'vehicle_id' => $request->input('vehicle_id'),
            'customer_id' => $request->input('customer_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => null,  // end_time è null inizialmente
            'total_cost' => $request->input('total_cost'),
            'status' => 'active',
        ]);

        // Reindirizza alla lista noleggi
        return redirect()->route('rentals.index')->with('success', 'Noleggio registrato!');
    }

    public function show($id)
    {
        // Recupera il noleggio specifico
        $rental = DB::table('rentals')
                    ->join('vehicles', 'rentals.vehicle_id', '=', 'vehicles.id')
                    ->join('customers', 'rentals.customer_id', '=', 'customers.id')
                    ->where('rentals.id', $id)
                    ->select('rentals.*', 'vehicles.model as vehicle_model', 'customers.name as customer_name')
                    ->first();
        
        return view('rentals.show', compact('rental'));
    }

    public function edit($id)
    {
        // Recupera il noleggio da modificare
        $rental = DB::table('rentals')->where('id', $id)->first();
        
        // Recupera tutti i veicoli e clienti per il form di modifica
        $vehicles = DB::table('vehicles')->get();
        $customers = DB::table('customers')->get();
        
        return view('rentals.create', compact('rental', 'vehicles', 'customers'));
    }

    public function update(Request $request, $id)
    {
        // Esegui una query per aggiornare il noleggio
        DB::table('rentals')
            ->where('id', $id)
            ->update([
                'vehicle_id' => $request->input('vehicle_id'),
                'customer_id' => $request->input('customer_id'),
                'total_cost' => $request->input('total_cost'),
            ]);
        
        // Reindirizza alla lista noleggi
        return redirect()->route('rentals.index')->with('success', 'Noleggio aggiornato!');
    }

    public function destroy($id)
    {
        // Esegui una query per eliminare il noleggio
        DB::table('rentals')->where('id', $id)->delete();
        
        // Reindirizza alla lista noleggi
        return redirect()->route('rentals.index')->with('success', 'Noleggio eliminato!');
    }

    public function complete($id)
    {
        // Esegui una query per aggiornare lo stato del noleggio a 'completed'
        DB::table('rentals')
            ->where('id', $id)
            ->update([
                'status' => 'completed',
                'end_time' => now(),
            ]);
        
        // Reindirizza alla lista noleggi
        return redirect()->route('rentals.index')->with('success', 'Noleggio completato!');
    }
}
