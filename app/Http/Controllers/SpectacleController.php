<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;

class SpectacleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spectacles = spectacle::all();
        return $spectacles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $spectacle = new Spectacle([
            
            'datespectacle' => $request->input('datespectacle'),
            
            'salleID' => $request->input('salleID'),
            ]);
            $spectacle->save();
            return response()->json($spectacle,201);
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Spectacle $spectacle)
    {
        $spectacle = Spectacle::find($id);
        return response()->json($spectacle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spectacle $spectacle)
    {
        $spectacle = Spectacle::find($id);
        $spectacle->update($request->all());
        return response()->json($spectacle,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spectacle $spectacle)
    {
        $spectacle = Spectacle::find($id);
        $spectacle->delete();
        return response()->json('Spectacle supprimée !');
    }

    public function showSpectacleBySAL($idsal)
{
 $Spectacle= Spectacle::where('salleID', $idsal)->with('salles')->get();
return response()->json($Spectacle);
}
}
