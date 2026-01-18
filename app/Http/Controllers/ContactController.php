<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    // Accéder contact2
    public function voir_formcontact()
    {
        return view('Client.lastcontact');
    }

    // Valider les données du formulaire
    public function store_contact(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sujet' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Enregistrer les données dans la base
        $contact = new Contact();
        $contact->nom = $request->input('nom');
        $contact->email = $request->input('email');
        $contact->sujet = $request->input('sujet');
        $contact->telephone = $request->input('telephone');
        $contact->message = $request->input('message');

        $contact->save();
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }


    // Lire Message Administrateur
    public function voir_messages(){
        $contacts = Contact::all();
        return view('Admin.messages', compact('contacts'));
    }


    // Supprimer un Message
    public function delete_message($id)
    {
      $contact = Contact::find($id);
      if (!$contact) {
        return back()->with('error', 'Le message n\'existe pas.');
      }
      $contact->delete();
      return back()->with("success", "Message supprime");
    }

}