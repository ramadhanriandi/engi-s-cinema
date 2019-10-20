<?php
/**
 * Register
 *
 * View of register
 * 
 * php version 7.2.19
 *
 * @category   View
 * @package    Register
 * @subpackage None
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */
?>

<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/assets/css/layout.css">
</head>
<body>
    <div class="container wrapper">
        <form action="" method="POST" enctype="multipart/form-data" novalidate>
            <div class="form__wrapper form__register">
                <div class="form__title">
                    Welcome to <span>Engi</span>ma!
                </div>
                <div class="form__input-group">
                    <div class="form__input-label">
                        Username
                    </div>
                    <input
                        class="form__input-box"
                        type="text"
                        name="username"
                        id="username"
                        placeholder="joe.johndoe"
                        onchange="showUsernameMessage()"
                        required
                    >
                    <div id="input__username-message"></div>
                </div>
                <div class="form__input-group">
                    <div class="form__input-label">
                        Email Address
                    </div>
                    <input 
                        class="form__input-box" 
                        type="text" 
                        name="email" 
                        id="email"
                        placeholder="joe@email.com"
                        onchange="showEmailMessage()"
                        required
                    >
                    <div id="input__email-message"></div>
                </div>
                <div class="form__input-group">
                    <div class="form__input-label">
                        Phone Number
                    </div>
                    <input
                        class="form__input-box" 
                        type="text" 
                        name="phone" 
                        id="phone"                        
                        placeholder="+62813xxxxxxxx"
                        onchange="showPhoneMessage()"
                        required
                    >
                    <div id="input__phone-message"></div>
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
                        placeholder="make as strong as possible"
                        required
                    >
                </div>
                <div class="form__input-group">
                    <div class="form__input-label">
                        Confirm Password
                    </div>
                    <input 
                        class="form__input-box" 
                        type="password" 
                        name="confirm_password" 
                        id="confirm_password"                        
                        placeholder="same as above"
                        onchange="showPasswordMessage()"
                        required
                    >
                    <div id="input__password-message"></div>
                </div>
                <div class="form__input-group form__flex-group">
                    <div>
                        <div class="form__input-label">
                            Profile Picture
                        </div>
                        <input 
                            class="form__input-box form__input-box--half" 
                            type="text" 
                            name="filename"
                            id="filename"
                            readonly
                        >
                    </div>
                    <div>
                        <button
                            class="btn form__btn-browse" 
                            type="button"
                            onclick="browseFile()"
                        >
                            Browse
                        </button>
                        <input 
                            class="form__input-file" 
                            id="fileInput"
                            type="file" 
                            name="profile_picture"
                            id="profile_picture"                        
                            accept="image/*" 
                            onchange="putFilename()"
                            required
                        >
                    </div>
                </div>
                <button
                    class="btn form__btn" 
                    name="register" 
                    type="button"
                    onclick="submitRegisterForm()"
                >
                    Register
                </button>
                <div class="form__footer">
                    Already have account? 
                    <a class="form__footer-link" href="/login">Login here</a>
                </div>
            </div>
        </form>
    </div>
    
    <script type="text/javascript" src="../public/assets/js/register.js"></script>
</body>
</html>