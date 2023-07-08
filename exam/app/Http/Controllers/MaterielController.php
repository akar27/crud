<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterielController extends Controller
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
    public function create($id)
    {
        return view('addmat', ['idu' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tach = new Materiel();
        $tach->libelle = $request->libelle;
        $tach->cout = $request->cout;
        $tach->tache_id = $request->key;
        $tach->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matrs = DB::table('materiels')->where('tache_id', $id)->get();

        return view('mater', ['matrs' =>$matrs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiel $materiel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materiel $materiel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Materiel::destroy($id);

        return redirect('/home');
    }
}
