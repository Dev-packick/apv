@extends('layouts.admin')
@section('content')
	<!--**********************************
        Content body start
    ***********************************-->
        <div class="content-body">
        	<!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="mt-3 mt-sm-0 d-inline-block d-sm-flex align-items-center justify-content-between mb-5">
						<div class="coin-tabs">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item" role="presentation">
								<button class="nav-link active" id="all-status-tab" data-bs-toggle="tab" data-bs-target="#all-status" type="button" role="tab" aria-controls="all-status" aria-selected="true">Utilisateurs site</button>
							  </li>
							</ul>
						</div>
					</div>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="all-status" role="tabpanel" aria-labelledby="all-status-tab">
							<div class="card">
							@if($contacts->isNotEmpty())
								@foreach($contacts as $contact)
									<div class="card-body">
										<div class="row">
											<div class="col-xl-3 col-lg-3">
												<div class="review-bx d-flex align-items-center">
													<div class="review-img">
														<img src="admin/assets/images/user4.png" alt="Image de l'utilisateur" loading="lazy">
													</div>
													<div class="review-content">
														<h2 class="font-w500">{{$contact->nom}}</h2>
														<h5 class="font-w500">{{$contact->email}}</h5>
														<p class="font-w400 m-0">{{$contact->telephone}}</p>
													</div>
												</div>
												<p class="review-date font-w400">{{$contact->created_at->translatedFormat('d F Y')}}</p>
											</div>
											<div class="col-xl-9 col-lg-9">
												<div class="description-bx d-inline-block d-sm-flex align-items-center">
													<div class="description-content">
														<h3 class="font-w500">{{$contact->sujet}}</h3>
														<p class="sub-title font-w400 lh-2">{{$contact->message}}</p>
														<div class="d-inline-block d-xl-flex align-items-center justify-content-between">
															<div class="button-bx mt-2 mt-xl-0">
																<a href="mailto:{{ $contact->email }}" class="btn btn-success">
																	Répondre
																	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M10 0C4.50742 0 0 4.50742 0 10C0 15.4926 4.50742 20 10 20C15.4926 20 20 15.4926 20 10C20 4.50742 15.4926 0 10 0ZM8.7898 14.5484L4.4107 10.1694L6.06781 8.51227L8.86648 11.3109L14.485 6.20344L16.062 7.93723L8.7898 14.5484Z" fill="white"/>
																	</svg>
																</a>
																<button class="btn btn-danger ms-sm-3 ms-0" onclick="confirmDelete('{{ $contact->id }}')">Supprimer
																	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M10 0C4.50742 0 0 4.50742 0 10C0 15.4926 4.50742 20 10 20C15.4926 20 20 15.4926 20 10C20 4.50742 15.4926 0 10 0ZM14.9719 13.3148L13.3148 14.9719L10 11.6571L6.68523 14.9719L5.02812 13.3148L8.34289 10L5.02812 6.68523L6.68523 5.02812L10 8.34289L13.3148 5.02812L14.9719 6.68523L11.6571 10L14.9719 13.3148Z" fill="white"/>
																	</svg>
																</button>
																<form id="form-{{ $contact->id }}" action="{{route('SUPP-MESSAGE', $contact->id) }}" method="post" novalidate>
																	@csrf
																	@method('DELETE')
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr> <!-- Séparation entre les messages -->
								@endforeach
							@else
								<p>Aucun contact trouvé.</p>
							@endif
							</div>
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
		<script>
			function confirmDelete(contactId) {
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
						document.getElementById('form-' + contactId).submit();
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
				tapToDismiss: false,
			});
		</script>
		@endif
		@endsection
