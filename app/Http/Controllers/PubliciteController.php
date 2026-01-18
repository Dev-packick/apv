<?php

namespace App\Http\Controllers;
use App\Models\Publicite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PubliciteController extends Controller
{

    //Publicite afficher front
    // public function home()
    // {
    //     $publicite  = Publicite::all();
    //     return view('Client.index', compact('publicite'));
    // }


    // Méthode pour afficher toutes les publicités
    public function voir_publicite()
    {
        $publicite = Publicite::all();
        return view('Admin.publicites', compact('publicite'));
    }


    // Méthode pour afficher le formulaire de création de publicité
    public function creer_publicite()
    {
        return view('Admin.sendpub');
    }


    // Méthode pour enregistrer une nouvelle publicité
    public function store_publicite(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Gestion d'image
        $publicite = new Publicite();
        if ($request->hasFile('image')) {
            $file_image = $request->file('image');
            $file_name_image = time() . '_' . $file_image->getClientOriginalName();
            $file_image->move(public_path('articlesImages'), $file_name_image);
            $publicite->image = $file_name_image;
        }

        $publicite->save();
        return back()->with('success', 'Image publiée avec succès');

    }


    // Méthode pour supprimer une publicité spécifique
    public function delete_publicite($id)
    {
        $publicite = Publicite::find($id);
        if (!$publicite) {
            return back()->with('error', 'La publicite n\'existe pas.');
        }
        if ($publicite->image) {
          Storage::delete('public/articlesImages/' . $publicite->image);
        }
        $publicite->delete();
        return back()->with('success', 'Publicité supprimée avec succès');
    }
}
