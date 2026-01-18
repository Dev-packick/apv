@extends('layouts.admin')
@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a>Listes de publicités</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
							<div class="card-header">
								<h4 class="card-title">Photos publiées</h4>
								<button type="button" class="btn btn-rounded btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
									<span class="btn-icon-start text-black"><i class="fa fa-upload color-success"></i></span>
									Importer
								</button>
								<!-- Modal start-->
								<div class="modal fade" id="exampleModalCenter">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Importer une photo</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal">
												</button>
											</div>
											<form action="{{route('CREER-PUBLICITE')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="modal-body">
													<input type="file" name="image">
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Validé <span class="btn-icon-end"><i class="fa fa-check"></i></span></button>
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fermer</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							<!-- Modal end-->
							</div>
							<div class="card-body pb-1">
                                <div id="lightgallery" class="row">
                                    @foreach ($publicite as $publicite)
                                        <div class="col-lg-3 col-md-6 mb-4" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; height: 280px; overflow: hidden; position: relative;">
                                            <a href="{{ asset('/articlesImages/'.$publicite->image) }}" data-exthumbimage="{{ asset('/articlesImages/'.$publicite->image) }}" data-src="{{ asset('/articlesImages/'.$publicite->image) }}">
                                                <img src="{{ asset('/articlesImages/'.$publicite->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                            </a>
                                            <!-- Icône de suppression -->
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger btn-xs sharp" onclick="confirmDelete('{{ $publicite->id }}')" style="position: absolute; top: 10px; right: 10px; background: rgba(255, 0, 0, 0.7); color: white; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; cursor: pointer;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="form-{{ $publicite->id }}" action="{{route('SUPP-PUBLICITE', $publicite->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialiser LightGallery sur le conteneur avec l'ID 'lightgallery'
        lightGallery(document.getElementById('lightgallery'), {
            selector: 'a' // Sélectionne les liens <a> comme déclencheurs pour la galerie
        });
    });

    // Fonction de confirmation de suppression
    function confirmDelete(publiciteId) {
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
                document.getElementById('form-' + publiciteId).submit();
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
