@extends('layouts.admin')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>ABONNES NEWSLETTER</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <!-- listes vendeurs début -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tous les abonnés</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th><strong>E-MAILS</strong></th>
                                        <th><strong>DATE D'INSCRIPTION</strong></th>
                                        <th><strong>ACTION</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($newsletter as $newsletter)
                                    <tr>
                                        <td><a href="javascript:void(0);">{{$newsletter->email}}</a></td>
                                        <td>{{ $newsletter->created_at->translatedFormat('d F Y')}}</td>
                                        <td>
                                            {{-- <a href="javascript:void(0);">{{$newsletter->email}}</a> --}}
                                            <a href="mailto:{{ $newsletter->email }}" class="btn btn-success btn-sm">
                                                Répondre
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 0C4.50742 0 0 4.50742 0 10C0 15.4926 4.50742 20 10 20C15.4926 20 20 15.4926 20 10C20 4.50742 15.4926 0 10 0ZM8.7898 14.5484L4.4107 10.1694L6.06781 8.51227L8.86648 11.3109L14.485 6.20344L16.062 7.93723L8.7898 14.5484Z" fill="white"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <p>Aucun Abonnné Newsletter.</p>
                                    @endforelse
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
