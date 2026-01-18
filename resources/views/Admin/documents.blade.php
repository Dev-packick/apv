@extends('layouts.admin')

@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Listes de documents</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Documents publiées</h4>
                            <button type="button" class="btn btn-rounded btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                <span class="btn-icon-start text-black"><i class="fa fa-upload color-success"></i></span>
                                Importer
                            </button>
                            <!-- Modal start-->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterLabel">Importer un document</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('CREER-DOCUMENT') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <!-- Affichage des erreurs de validation -->
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="titre" class="form-label">Titre :</label>
                                                    <input type="text" name="titre" id="titre" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Fichier (PDF, Word, PowerPoint) :</label>
                                                    <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.ppt,.pptx" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success">Publier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->
                        </div>

                        <div class="card-body pb-1">
                            <!-- Tableau des documents -->
                            @if($documents->isEmpty())
                                <p>Aucun document trouvé.</p>
                            @else
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Titre</th>
                                            <th>Fichier</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $document->id }}</td>
                                                <td>
                                                    @php
                                                        $ext = pathinfo($document->file, PATHINFO_EXTENSION);
                                                        $adminIcon = match($ext) {
                                                            'pdf' => 'admin/assets/images/pdficon.png',
                                                            'doc', 'docx' => 'admin/assets/images/wordicon.png',
                                                            default => 'admin/assets/images/file2.jpeg',
                                                        };
                                                    @endphp
                                                    <img src="{{ asset($adminIcon) }}" alt="icon" style="max-width: 40px;">
                                                </td>
                                                <td>{{ $document->titre }}</td>
                                                <td>
                                                    @if($document->file)
                                                        <a href="{{ asset('documentsFiles/' . $document->file) }}" target="_blank" class="badge badge-primary">Voir / Télécharger</a>
                                                    @else
                                                        <span class="badge badge-secondary">Aucun fichier</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $document->id }})">Supprimer</button>
                                                    <form action="{{ route('SUPP-DOCUMENT', $document->id) }}" method="POST" id="form-{{ $document->id }}" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection



@section('scripts')
<script>
    function confirmDelete(documentId) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: 'Cette action est irréversible!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, soumettre le formulaire de suppression
                document.getElementById('form-' + documentId).submit();
            }
        });
    }
</script>
@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}", "Succès", {
        positionClass: "toast-top-right",
        closeButton: true,
        progressBar: true,
        timeOut: 5000,
        extendedTimeOut: 2000,
        tapToDismiss: false, // Optionnel : empêche la fermeture en cliquant sur la notification
    });
</script>
@endif
@endsection
