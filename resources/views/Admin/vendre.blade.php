@extends('layouts.admin')
@section('content')

	<!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">PUBLIER</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Renseigner le formulaire</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('CREER-PRODUIT') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Titre du projet</label>
                                            <input type="text" class="form-control" name="nom_produit" id="nom_produit" placeholder="Saisissez le titre du projet" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Lieu</label>
                                            <input type="text" class="form-control" name="prix_produit" id="prix_produit" placeholder="Saisissez le lieu" required>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Couleur</label>
                                            <select name="idCouleur" id="couleur" multiple class="form-control">
                                                @foreach ($couleurs as $couleur)
                                                    <option value="{{ $couleur->id }}">{{ $couleur->couleur_produit }}</option>
                                                @endforeach
                                            </select>
                                            <div class="error"></div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Taille</label>
                                            <select name="idTaille" id="taille" multiple class="form-control">
                                                @foreach ($tailles as $taille)
                                                    <option value="{{ $taille->id }}">{{ $taille->taille_produit }}</option>
                                                @endforeach
                                            </select>
                                            <div class="error"></div>
                                        </div>
                                    </div> -->
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="4" name="descript_produit" id="descript_produit" placeholder="Détails précis du produit" required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="formFileSm" class="form-label">Importer une image</label>
                                            <input class="form-control form-control-sm" name="image" id="image" type="file" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Catégorie</label>
                                            <select class="default-select form-control-sm wide" name="idCategorie" required>
                                                <option>Choisir une catégorie</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->produit_categorie }}</option>
                                                @endforeach
                                            </select>
                                            <div class="error"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Publier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection

@section('scripts')
@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}", "Succès", {
        positionClass: "toast-top-right",
        closeButton: true,
        progressBar: true,
        timeOut: 5000,
        extendedTimeOut: 2000,
        tapToDismiss: false,
    });
</script>
@endif
@endsection
