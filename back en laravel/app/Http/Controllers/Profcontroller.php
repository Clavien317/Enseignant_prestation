<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Enseignant;
use Exception;

class Profcontroller extends Controller
{
    public function liste()
    {
        $profs = Enseignant::all();
        // return view("listeProf",compact('profs','min','max'));
        return response()->json(
            [
                'profs'=> $profs,
                'Message'=>'profs',
                'code'=>200
            ]
        );
    }

    public function minPrestation()
    {
        $min = Enseignant::min("prestation");
        return response()->json($min);
    }

    public function sommePrest()
    {
        $somme = Enseignant::sum("prestation");
        return response()->json($somme);
    }

    public function maxPrestation()
    {
        $max=Enseignant::max("prestation");

        return response()->json($max);
    }


    public function ajout()
    {
        return view('ajout');
    }

    public function ajout_traitement(Request $request)
    {
        
        $request->validate(
            [
                'matricule'=>'required',
                'nom'=>'required',
                'tauxH'=>'required',
                'nbH'=>'required',
            ]);

            $result= new Enseignant();
            $result->matricule= $request->matricule;
            $result->nom= $request->nom;
            $result->tauxH= $request->tauxH;
            $result->nbH=$request->nbH;
            $result->prestation=($request->tauxH)*($request->nbH);
            $result->save();


            return response()->json(
                [
                    "message"=>"Ajouter avec succes","code"=>200
                ]);
            // return redirect("/api/listeProf")->with('status', 'Ajoutée avec succes ....');
    }

    public function delEnseign($id)
    {
        $films = Enseignant::find($id);
        $films->delete();
        return response()->json(
            [
                "message"=>"supprimer avec succes","code"=>200
            ]);
        // return redirect("/api/listeProf")->with('status', 'Film est supprimée avec succes ....');
    }

    public function modifier($id)
    {
        $data=Enseignant::find($id);
        return response()->json($data);
        // return view('modifier',compact('data'));
    }

    public function modifier_traitement( Request $request)
    {
        $request->validate(
            [
                'matricule'=>'required',
                'nom'=>'required',
                'tauxH'=>'required',
                'nbH'=>'required',
            ]);
            $result= Enseignant::find($request->id);
            $result->matricule= $request->matricule;
            $result->nom= $request->nom;
            $result->tauxH= $request->tauxH;
            $result->nbH= $request->nbH;
            $result->prestation=($request->tauxH*$request->nbH);
            $result->update();
            return response()->json(
                [
                    "message"=>"Modifiee avec succes","code"=>200
                ]);
        // return redirect("/api/listeProf")->with('status', 'Modifiée avec succes ....');
    }

}
