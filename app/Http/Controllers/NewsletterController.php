<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class NewsletterController extends Controller
{
    // Ajouter une newsletter
    public function ajouter_newsletter(Request $request)
    {

        $existingEmail = Newsletter::where('email', $request->email)->first();

        if ($existingEmail) {
            return redirect()->back()->with('failure', 'Cet email est déjà enregistré.');
        }

        Newsletter::create([
            'email' => $request->email,
        ]);
            return redirect()->back()->with('success', 'votre email à bien été enregistré');
    }


    // Afficher une newsletter
    public function afficher_newsletter()
    {
        $abonnes = Newsletter::all();
        return view('Admin.newsletter', ['newsletter' => $abonnes]);
    }


    // Supprimer une newsletter
    public function delete(Request $request, $id)
    {
        $abonnes = Newsletter::find($id);

        if($abonnes){
            $abonnes-> email = $request->email;
            $abonnes->save();
        }
    }
}
