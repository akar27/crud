<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $idu = Auth::user()->id;
            $taches = DB::table('taches')
            ->join('tache_user', 'user_id',   'tache_user.user_id')
            ->where('user_id', $idu)
            ->get();
            // $taches = Tache::user($idu)->where('user_id', $idu)->get();
            return view('dashboard', ['tashes' => $taches, 'ids' => $idu]);
        } else {
            $projects = Projet::all();
            return view('dashboard2', ['projects' => $projects]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view($id)
    {
        $tashes = DB::table('taches')->where('projet_id', $id)->get();
        return view("taches", ['tashes' => $tashes]);
    }

    public function create()
    {
        return view('addpro');
    }

    public function createtach($id)
    {
        $emp = User::all();
        return view('addtach', ['tacid' => $id, 'emps' => $emp]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pro = new Projet();
        $pro->intitule = $request->input('intitule');
        $pro->Lieu = $request->input('lieu');
        $pro->save();

        return redirect('/home');
    }

    public function storetach(Request $request)
    {
        // dd($request);
        $tach = new Tache();
        $tach->nom_tache = $request->nom;
        $tach->date_debut = $request->date_debut;
        $tach->date_fin = $request->date_fin;
        $tach->cout = $request->cout;
        $tach->projet_id = $request->key;
        $tach->save();
        $tache_id = DB::table('taches')->latest('id')->value('id');
        
        $trav = DB::table('tache_user')->insert(
            [
                'user_id' => $request->employes,
                'tache_id' => $tache_id
            ]
        );


        // $trav->get('user_id') = $request->employes;
        // $trav->get('tache_id') = $tache_id;
        // $trav->save();


        return redirect('/home');
    }


    public function editach($id)
    {
        $tashes = DB::table('taches')->where('id', $id)->get();
        $employes = User::all();
        return view('editach', ['employes' => $employes, 'tashes' => $tashes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function stortach(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $pro = Projet::where('id', $id)->first();
        // $pro->delete();
        Projet::destroy($id);

        return redirect('/home');
    }
}
