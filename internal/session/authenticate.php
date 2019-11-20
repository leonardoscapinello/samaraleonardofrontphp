<?php
require_once("../settings/index.php");
if ($session->isLogged()) {
    header("location: ./");
    die;
}

ob_start("sanitize_output");
?>
<!DOCTYPE html>
<html lang="pt-br">

<!-- begin::Head -->
<head>
    <meta http-equiv="Content-Language" content="pt-br">
    <meta charset="utf-8"/>
    <title>Samara&Leonardo | Login</title>
    <meta name="description" content="S&L Ecossistema | Login">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="manifest" href="/manifest.json?v=2">
    <!--begin::Fonts -->

    <link rel="stylesheet" href="<?=ASSETS?>css/compiled/samaraleonardo.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <style type="text/css">
        .kt-login.kt-login--v4 {
            background-size: cover;
            background-repeat: no-repeat
        }

        .kt-login.kt-login--v4 .kt-login__wrapper {
            padding: 6% 2rem 1rem 2rem;
            margin: 0 auto 2rem auto;
            overflow: hidden
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container {
            width: 430px;
            margin: 0 auto
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__logo {
            text-align: center;
            margin: 0 auto 4rem auto
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__head {
            margin-top: 1rem;
            margin-bottom: 3rem
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__head .kt-login__title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 500;
            color: #595d6e
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__head .kt-login__desc {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 1.1rem;
            font-weight: 400;
            color: #74788d
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form {
            margin: 0 auto
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .input-group {
            padding: 0;
            margin: 0 auto
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control {
            height: 46px;
            border: none;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            border-radius: 46px;
            margin-top: 1.5rem;
            background: rgba(255, 255, 255, .015);
            color: #74788d
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control::-moz-placeholder {
            color: #595d6e;
            opacity: 1
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control:-ms-input-placeholder {
            color: #595d6e
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control::-webkit-input-placeholder {
            color: #595d6e
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control.is-invalid + .invalid-feedback, .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control.is-valid + .valid-feedback {
            font-weight: 500;
            font-size: .9rem;
            padding-left: 1.6rem
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__extra {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #74788d;
            font-size: 1rem;
            padding: 0 1.5rem
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__extra .kt-checkbox {
            font-size: 1rem
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__extra .kt-login__link {
            font-size: 1rem;
            color: #74788d;
            -webkit-transition: color .3s ease;
            transition: color .3s ease
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__extra .kt-login__link:hover {
            color: #374afb;
            -webkit-transition: color .3s ease;
            transition: color .3s ease
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__actions {
            text-align: center;
            margin-top: 7%
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__actions .kt-login__btn-primary, .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__actions .kt-login__btn-secondary {
            height: 50px;
            padding-left: 2.5rem;
            padding-right: 2.5rem
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account {
            text-align: center;
            margin-top: 2rem
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account .kt-login__account-msg {
            font-size: 1rem;
            font-weight: 400;
            color: #74788d
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account .kt-login__account-link {
            font-size: 1rem;
            font-weight: 500;
            color: #595d6e;
            -webkit-transition: color .3s ease;
            transition: color .3s ease
        }

        .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account .kt-login__account-link:hover {
            color: #374afb;
            -webkit-transition: color .3s ease;
            transition: color .3s ease
        }

        .kt-login.kt-login--v4.kt-login--signin .kt-login__signup {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--signin .kt-login__signin {
            display: block
        }

        .kt-login.kt-login--v4.kt-login--signin .kt-login__forgot {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--signup .kt-login__signup {
            display: block
        }

        .kt-login.kt-login--v4.kt-login--signup .kt-login__signin {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--signup .kt-login__forgot {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--signup .kt-login__account {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--forgot .kt-login__signup {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--forgot .kt-login__signin {
            display: none
        }

        .kt-login.kt-login--v4.kt-login--forgot .kt-login__forgot {
            display: block
        }

        @media (max-width: 1024px) {
            .kt-login.kt-login--v4 .kt-login__wrapper {
                padding-top: 5rem;
                width: 100%
            }

            .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container {
                margin: 0 auto
            }

            .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account {
                margin-top: 1rem
            }
        }

        @media (max-width: 768px) {
            .kt-login.kt-login--v4 .kt-login__wrapper {
                width: 100%
            }

            .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container {
                width: 100%;
                margin: 0 auto
            }

            .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form {
                width: 100%;
                margin: 0 auto
            }

            .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account {
                margin-top: 1rem
            }
        }
    </style>
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?=ASSETS?>media/logos/favicon.ico"/>
    <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('./serviceWorker.js').then(function (reg) {
                console.log('Successfully registered service worker', reg);
            }).catch(function (err) {
                console.warn('Error whilst registering service worker', err);
            });
        }
    </script>
    <script>
        window.addEventListener('beforeinstallprompt', function (e) {
            e.userChoice.then(function (choiceResult) {

                console.log(choiceResult.outcome);

                if (choiceResult.outcome === 'dismissed') {
                    console.log('User cancelled home screen install');
                } else {
                    console.log('User added to home screen');
                }
            });
        });
    </script>
    <script>
        fetch();
    </script>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

<!-- begin::Page loader -->

<!-- end::Page Loader -->

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
             style="background-image: url(assets/media/bg/bg-2.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="<?=ASSETS?>media/logos/logo-2.png">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Faça Login em S&L Ecossistema</h3>
                        </div>
                        <form action="" method="POST" class="kt-form">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Email" name="email"
                                       autocomplete="off" value="">
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="Senha" name="password"
                                       value="">
                            </div>

                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary"
                                        type="submit">Entrar
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#374afb",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->
<script src="<?=ASSETS?>plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?=ASSETS?>js/jquery.serializeObject.js" type="text/javascript"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="<?=ASSETS?>plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>


<script src="<?=ASSETS?>plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="<?=ASSETS?>plugins/general/js/global/integration/plugins/bootstrap-notify.init.js"
        type="text/javascript"></script>
<script src="<?=ASSETS?>plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?=ASSETS?>plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="<?=ASSETS?>plugins/general/js/global/integration/plugins/jquery-validation.init.js"
        type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="<?=ASSETS?>js/scripts.bundle.js" type="text/javascript"></script>

<script src="<?=ASSETS?>js/login-general.js?v=1.2" type="text/javascript"></script>
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>