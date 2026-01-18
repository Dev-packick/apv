<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\Categorie;
use App\Models\Document;
use App\Models\Publicite;

class FrontendController extends Controller
{
    /*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/

    // Accéder à la page d'accueil
    public function home()
    {
        $commerce = Commerce::with('categorie')->get();
        $categories = Categorie::all();
        $publicite = Publicite::all();
        return view('Client.home', compact('commerce', 'categories','publicite'));
    }

    // Accéder à la page projets
    public function voir_projets()
    {
        $commerce = Commerce::with('categorie')->get();
        $categories = Categorie::all();
        return view('Client.projets', compact('commerce', 'categories'));
    }

    // Accéder à la page détails projet
    public function voir_details($id)
    {
        // Récupérer le commerce avec sa catégorie
        $commerce = Commerce::with('categorie')->find($id);
        // Récupérer trois autres articles (vous pouvez adapter la requête selon vos besoins)
        $autresCommerce = Commerce::where('id', '!=', $id)->latest()->take(2)->get();

        // Passer les deux variables à la vue
        return view('Client.projetdetails', compact('commerce', 'autresCommerce'));
    }


    // Accéder à la page moyens d'action
    public function voir_moyens()
    {
        return view('Client.moyens');
    }

    // Accéder à la page a propos
    public function voir_about()
    {
        return view('Client.about');
    }

    // Accéder à la equipe
    public function voir_equipe()
    {
        return view('Client.equipe');
    }

    // Accéder à contact 1
    public function voir_contact()
    {
        return view('Client.contact');
    }

    // Accéder à la page blog(documents)
    public function view_blog()
    {
        $documents = Document::all();
        return view('Client.blog', compact('documents'));
    }




    // Accéder à la page boutique
    public function shop()
    {
        return view('Client.boutique');
    }


    // Accéder à la page contact
    public function info(){
        return view('Client.contact');
    }

    // Accéder à la page panier
    public function buy(){
        return view('Client.panier');
    }

    // Accéder à la page paiement
    public function checkout(){
        return view('Client.paiement');
    }

}
