<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // Méthode pour afficher tous les documents
    public function voir_document()
    {
        $documents = Document::all();
        return view('Admin.documents', compact('documents'));
    }

    // Méthode pour enregistrer un nouveau document
    public function store_document(Request $request)
    {
        // Validation des données d'entrée
        $this->validate($request, [
            'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:51200', // Limité à 50MB
            'titre' => 'required|string|max:255',
        ]);

        // Enregistrement du document
        $document = new Document();
        $document->titre = $request->input('titre');

        // Gérer le téléchargement du fichier
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/documentsFiles', $filename);
            $document->file = $filename; // Enregistrer seulement le nom du fichier
        }

        // Sauvegarder le document
        $document->save();

        return back()->with('success', 'Document publié avec succès');
    }

    // Méthode pour supprimer un document
    public function delete_document($id)
    {
        $document = Document::find($id);
        if (!$document) {
            return back()->with('error', 'Le document n\'existe pas.');
        }

        // Suppression du fichier s'il existe
        if ($document->file) {
            Storage::delete('public/documentsFiles/' . $document->file);
        }

        // Suppression du document dans la base de données
        $document->delete();
        return back()->with('success', 'Document supprimé avec succès');
    }
}
