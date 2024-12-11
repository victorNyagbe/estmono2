<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CNX - ESTMONO2</title>
    <link rel="stylesheet" href="{{ asset('styles/mdb/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/mdb/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/mdb/css/mdb.lite.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fontawesome/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'MontSerrat', sans-serif;
        }
        .container-custom {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #333;
        }

        .login-panel {
            border: 2px solid white;
            background-color: #eff;
            padding: 12px 15px;
            border-radius: 15px;
        }

        .panel-logo {
            justify-content: center;
            text-align: center;
        }

        .img-fluid {
            width: 30%;
            border-radius: 50%;
        }

        .panel-text {
            font-size: 1.6rem;
        }
    </style>
</head>
<body>

    <div class="container-custom">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                            {{ $message }}
                            <button type="button" class="close" aria-label="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="panel-logo mb-3">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="" class="img-fluid">
                    </div>
                    <h5 class="text-center text-white panel-text">ADMINISTRATION ESTMONO2</h5>
                    <div class="login-panel">
                        <h5 class="text-danger text-center text-uppercase mb-4"><i class="fa fa-user-lock"></i> Connexion</h5>
                        <form action="{{ route('admin.user.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="login_mail" id="login_mail" class="form-control @error('login_mail') is-invalid @enderror" placeholder="Saisir votre email...">
                                @error('login_mail')
                                    <small class="invalid-feedback">{{ $errors->first('login_mail') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="login_pass" id="login_pass" class="form-control @error('login_pass') is-invalid @enderror" placeholder="Saisir votre mot de passe...">
                                @error('login_pass')
                                    <small class="invalid-feedback">{{ $errors->first('login_pass') }}</small>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="showPassword">
                                <label class="form-check-label" for="showPassword">Afficher le mot de passe</label>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-green text-white">Se connecter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/popper.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#showPassword').change(function () {
                if ($(this).is(':checked')) {
                    $('#login_pass').attr('type', 'text')
                } else {
                    $('#login_pass').attr('type', 'password')
                }
            });
        });
    </script>
</body>
</html>
