@extends('layouts.admin')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>MEMBRES DE L'ASSOCIATION</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <!-- listes vendeurs début -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tous les membres</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th><strong>Noms</strong></th>
                                        <th><strong>TELEPHONES</strong></th>
                                        <th><strong>E-MAILS</strong></th>
                                        <th><strong>DATE D'INSCRIPTION</strong></th>
                                        <th><strong>ACTION</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt="" />
                                                <span class="w-space-no">{{ $user->nom }} {{ $user->prenom }}</span>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);">{{ $user->telephone }}</a></td>
                                        <td><a href="javascript:void(0);">{{ $user->email }}</a></td>
                                        <td>{{ $user->created_at->translatedFormat('d F Y')}}</td>
                                        <td>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger btn-xs sharp" onclick="confirmDelete('{{ $user->id }}')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="form-{{ $user->id }}" action="{{ route('SUPP-VENDEURS', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- listes vendeurs fin -->
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@endsection

@section('scripts')
<script>
    function confirmDelete(UserId) {
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
                document.getElementById('form-' + UserId).submit();
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
