<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PubliciteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TailleController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DocumentController;
/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'home'])->name('ACCUEIL');
Route::get('/projets', [FrontendController::class, 'voir_projets'])->name('PROJETS');
Route::get('/moyens', [FrontendController::class, 'voir_moyens'])->name('MOYENS');
Route::get('/equipe', [FrontendController::class, 'voir_equipe'])->name('EQUIPE');
Route::get('/about', [FrontendController::class, 'voir_about'])->name('ABOUT');
Route::get('/projetdetails/{id}', [FrontendController::class, 'voir_details'])->name('blogdetails');
Route::get('/lastcontact', [ContactController::class, 'voir_formcontact'])->name('FORMCONTACT');
Route::post('/contact', [ContactController::class, 'store_contact'])->name('SAVECONTACT');
Route::get('/blog', [FrontendController::class, 'view_blog'])->name('BLOG');


Route::get('/shopdetails/{commerce}', [CommerceController::class, 'details_produit'])->name('DETAILS-PRODUIT');
Route::get('/boutique', [FrontendController::class, 'shop'])->name('BOUTIQUE');
Route::get('/panier', [FrontendController::class, 'buy'])->name('PANIER');
Route::get('/paiement', [FrontendController::class, 'checkout'])->name('PAYER');
Route::get('/shopdetails/{commerce}', [CommerceController::class, 'details_produit'])->name('DETAILS-PRODUIT');
Route::post('/sendnewsletter', [NewsletterController::class, 'ajouter_newsletter'])->name("SENDNEWSLETTER");

/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'connexion'])->name('page-login');
Route::get('/register', [AuthController::class, 'inscription'])->name('page-register');
Route::post('/newuser', [AuthController::class, 'create_account'])->name("NEWUSER");
Route::post('/checkuser', [AuthController::class, 'check_user'])->name("AUTHLOGIN");
Route::get('/logout', [AuthController::class, 'logout'])->name("LOGOUT");
Route::get('/forgot', [AuthController::class, 'check_password'])->name('FORGOT');

/*
|--------------------------------------------------------------------------
| BACKEND ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth','verified', 'CacheControl')->group(function(){
    //Tableau de bord
    Route::get('/tableau', [BackendController::class, 'dashboard'])->name('TABLEAU');
    //Afficher commandes back
    Route::get('/commandes', [BackendController::class, 'voir_commandes'])->name('COMMANDES');
    //Afficher factures back
    Route::get('/facture', [BackendController::class, 'voir_factures'])->name('FACTURE');

    //Formulaire vendre PRODUIT
    Route::get('/vendre', [CommerceController::class, 'ajouter_produit'])->name('AJOUTER-PRODUIT');
    //Créer un PRODUIT back
    Route::post('/creerproduit', [CommerceController::class, 'store_vente'])->name('CREER-PRODUIT');
    //Afficher mes PRODUITS back
    Route::get('/listproduits', [CommerceController::class, 'voir_produits'])->name('VOIR-PRODUITS');
    //Modifié mes PRODUIT back
    Route::put('/editproduits/{id}', [CommerceController::class, 'update_produit'])->name('MODIFIER-PRODUIT');
    //Supprimer mes PRODUIT back

    Route::delete('/SupprimerProduit/{id}', [CommerceController::class, 'delete_produit'])->name('SUPP-PRODUIT');
    //Afficher PUBLICITE back
    Route::get('/publicites', [PubliciteController::class, 'voir_publicite'])->name('VOIR-PUBLICITES');
    //Créer une PUBLICITE back
    Route::post('/sendpub', [PubliciteController::class,'store_publicite'])->name('CREER-PUBLICITE');
    //Supprimer PUBLICITE back
    Route::delete('/SupprimerPublicite/{id}', [PubliciteController::class, 'delete_publicite'])->name('SUPP-PUBLICITE');

    //Afficher DOCUMENT back
    // Route::get('/documents', [DocumentController::class, 'voir_document'])->name('VOIR-DOCUMENT');

    Route::get('/documents', [DocumentController::class, 'voir_document'])->name('VOIR-DOCUMENTS');
    Route::post('/documents/creer', [DocumentController::class, 'store_document'])->name('CREER-DOCUMENT');
    Route::delete('/documents/{id}', [DocumentController::class, 'delete_document'])->name('SUPP-DOCUMENT');



    //Afficher VENDEURS back
    Route::get('/vendeurs', [AuthController::class, 'voir_vendeurs'])->name('VOIR-VENDEURS');
    //Supprimer un VENDEURS back
    Route::delete('/SupprimerVendeur/{id}', [AuthController::class, 'delete_vendeurs'])->name('SUPP-VENDEURS');
    //Afficher NEWSLETTER
    Route::get('/newsletter', [NewsletterController::class, 'afficher_newsletter'])->name("SHOWNEWSLETTER");
    //Afficher CATEGORIES back
    Route::get('/categorie', [CategorieController::class, 'voir_categories'])->name('VOIR-CATEGORIE');
    //Afficher TAILLE back
    Route::get('/taille', [TailleController::class, 'voir_tailles'])->name('VOIR-TAILLE');
    //Afficher COULEUR back
    Route::get('/couleur', [CouleurController::class, 'voir_couleurs'])->name('VOIR-COULEUR');

    //Créer CATEGORIES back
    Route::post('/ajouter-categorie', [CategorieController::class, 'store_categorie'])->name('CREER-CATEGORIE');
    //Créer TAILLES back
    Route::post('/ajouter-taille', [TailleController::class, 'store_taille'])->name('CREER-TAILLE');
    //Créer COULEURS back
    Route::post('/ajouter-couleur', [CouleurController::class, 'store_couleur'])->name('CREER-COULEUR');

    //Supprimer CATEGORIES
    Route::delete('/SupprimerCategorie/{id}', [CategorieController::class, 'delete_categorie'])->name('SUPP-CATEGORIE');
    //Supprimer TAILLES
    Route::delete('/SupprimerTaille/{id}', [TailleController::class, 'delete_taille'])->name('SUPP-TAILLE');
    //Supprimer COULEURS
    Route::delete('/SupprimerCouleur/{id}', [CouleurController::class, 'delete_couleur'])->name('SUPP-COULEUR');

    //Afficher MESSAGES
    Route::get('/messages', [ContactController::class, 'voir_messages'])->name('VOIR-MESSAGE');
    Route::delete('/SupprimerMessage/{id}', [ContactController::class, 'delete_message'])->name('SUPP-MESSAGE');


    //Profil UTILISATEURS back
    Route::get('/profil', [ProfilController::class, 'voir_profil'])->name('PROFIL');
    //Modifié mon PROFIL UTILISATEURS back
    // Route::put('/profil/{id}', [AuthController::class, 'update_profil'])->name('MODIFIER-PROFIL');
    //Supprimer mes messages
    // Route::delete('/SupprimerSms/{id}', [MessagerieController::class, 'destroySms'])->name('deleteMessage');
});
