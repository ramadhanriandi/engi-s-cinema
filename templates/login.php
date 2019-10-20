<?php
/**
 * Login
 *
 * View of login
 * 
 * php version 7.2.19
 *
 * @category   View
 * @package    Login
 * @subpackage None
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

// require $_SERVER['DOCUMENT_ROOT'].'/src/auth.php';

// checkCookie();
?>

<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/assets/css/layout.css">
</head>
<body>
    <div class="container wrapper">
        <form method="POST" action="">
            <div class="form__wrapper form__login">
                <div class="form__title">
                    Welcome to <span>Engi</span>ma!
                </div>
                <div class="form__input-group">
                    <div class="form__input-label">
                        Email
                    </div>
                    <input 
                        class="form__input-box" 
                        type="text" 
                        name="email" 
                        id="email"
                        placeholder="john@doe.com"
                        required
                    >
                </div>
                <div class="form__input-group">
                    <div class="form__input-label">
                        Password
                    </div>
                    <input 
                        class="form__input-box" 
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="place here"
                        required
                    >
                </div>
                <button
                    class="btn form__btn" 
                    name="login" 
                    type="button"
                    onclick="submitLoginForm()"
                >
                    Login
                </button>
                <div class="form__footer">
                    Don't have an account? 
                    <a class="form__footer-link" href="/register">Register here</a>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../public/assets/js/login.js"></script>
</body>
</html>