<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
	<meta name="title" content="Amis De La Planète Vivable">
	<meta name="description" content="l’association les amis de la planète vivable (APV) est une communauté de jeunes dédiés à la lutte contre les problèmes environnementaux qui menacent notre planète.">
	<meta content="keywords" name="association, environnement, biodiversité, changement climatique, pollution, protection de l'environnement, jeunes engagés, APV, Amis de la Planète Vivable">
	<meta name="language" content="French">
	<meta name="robots" content="index, follow">
	<meta name="msapplication-TileImage" content="client/assets/img/LG_ASS.png">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <title>APV - Inscription</title>

    <link rel="apple-touch-icon" href="client/assets/img/LGA.jpg"/>
	<link rel="icon" href="client/assets/img/LGA.jpg" sizes="32x32"/>
	<link rel="icon" href="client/assets/img/LGA.jpg" sizes="192x192"/>
    <link rel="canonical" href="https://www.amisdelaplanetevivables.com/apv">
    <link rel="shortcut icon" type="image/png" href="client/assets/img/LGA.jpg"/>
    <link href="admin/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="admin/assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="admin/assets/css/style.css" rel="stylesheet">
</head>
<body class="vh-100">
    <div class="authincation h-100" style="font-family: Arial, sans-serif; background-color: #0E3500;">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="results">
                                        @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                        @endif
                                        @if(session::get('echec'))
                                        <div class="alert alert-danger">
                                            {{ session::get('echec') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="text-center mb-3 d-flex justify-content-center align-items-center">
                                        <a href="{{route('TABLEAU')}}" class="d-flex align-items-center" style="text-transform: uppercase; font-weight: bold; color: black; font-size: 24px;">
                                            <img src="admin/assets/images/LG_ASS.png" alt="Logo" style="height: 80px; margin-right: 10px;">
                                        </a>
                                    </div>

                                    <h3 class="text-center mb-4" style="text-transform: italic;">INSCRIPTION</h3>
                                    <form action="{{ route('NEWUSER') }}" method="POST" class="form-horizontal">
                                        @method('POST')
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-label form-label" for="nom">Nom</label>
                                                <div class="input-group">
												    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                    <input type="nom" name="nom" id="nom" class="form-control" placeholder="saississez votre nom" required>
												    <div class="invalid-feedback">Nom requis.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-1 text-label form-label" for="prenom">Prénom</label>
                                                <div class="input-group">
												    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                    <input type="prenom" name="prenom" id="prenom" class="form-control" placeholder="saississez votre prenom" required>
												    <div class="invalid-feedback">Prenom requis.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-label form-label" for="email">Email</label>
                                                <div class="input-group">
												    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="saississez votre email" required>
												    <div class="invalid-feedback">Email requis.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-1 text-label form-label" for="password">Mot de passe *</label>
                                                <div class="input-group transparent-append">
                                                    <span class="input-group-text"><i class="fa fa-lock"></i> </span>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="saississez votre mot de passe" required>
                                                    <div class="invalid-feedback">Mot de passe requis.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-label form-label" for="email">Téléphone</label>
                                                <div class="input-group">
												    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                                    <input type="telephone" name="telephone" id="telephone" class="form-control" placeholder="saississez votre nulero de télephone" required>
												    <div class="invalid-feedback">Telephone requis.</div>
                                                </div>
                                            </div>

                <!--                            <div class="col-md-6">-->
                <!--                                <label class="mb-1 text-label form-label" for="email">Type de compte</label>-->
                <!--                                <div class="input-group">-->
                <!--                                        <select id="role" name="role" required style="width: 100%; padding: 12px; border: 5px solid #ddd; box-sizing: border-box;">-->
                <!--                                            <option value="USER">Membre</option>-->
                <!--                                            <option value="MEMBRE">Bénévole</option>-->
                <!--                                            <option value="MEMBRE">Partenaire</option>-->
                <!--                                            <option value="MEMBRE">Donateur</option>-->
                <!--                                            <option value="ADMIN">Admin</option>-->
                <!--                                        </select>-->
												    <!--<div class="invalid-feedback">Choississez un profil.</div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                                        </div>
                                        <!--<div style="text-align: center;">-->
                                        <!--    <button type="submit" style="background-color: #0E3500; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">-->
                                        <!--        S'inscrire-->
                                        <!--    </button>-->
                                        <!--</div>-->
                                        <div style="text-align: center; margin-top: 15px;">
                                            <a href="{{ route('page-login') }}" style="color: #5cb85c; text-decoration: none;"><h6></h6>Déjà un compte? Connectez-vous</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/assets/vendor/global/global.min.js"></script>
    <script src="admin/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="admin/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="admin/assets/js/custom.min.js"></script>
    <script src="admin/assets/js/deznav-init.js"></script>
    <script src="admin/assets/js/demo.js"></script>
    <script src="admin/assets/js/styleSwitcher.js"></script>
</body>
</html>
