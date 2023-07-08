<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $tacid)
    {
        $tach = new Tache();
        $tach->nom_tache = $request->nom;
        $tach->date_debut = $request->date_debut;
        $tach->date_finDid = $request->date_fin;
        $tach->cout = $request->cout;
        // $tach->projet_id = $tacid;
        $tach->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editach($id)
    {
        $tashes = DB::table('taches')->where('id', $id)->get();
        $employes = User::all();
        return view('editach', ['employes' => $employes, 'tashes' => $tashes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tache $tache)
    {
        //
    }

    public function destroy(Tache $id)
    {
        Tache::destroy($id);

        return redirect()->back();
    }
}
