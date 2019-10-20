<?php
session_start();
if ($_SESSION['id'] == null) {
    header("Location: login");
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/assets/css/layout.css">
    <script type="text/javascript" src="../public/assets/js/home.js"></script>
</head>

<body>
<div class="navbar__wrapper">
        <nav class="navbar layout__wrapper">
            <div class="navbar__group">
                <div class="navbar__logo">
                    <span>Engi</span>ma
                </div>
                <div class="navbar__search">
                    <img 
                        src="../public/assets/img/search.png" 
                        class="navbar__search-img" 
                        aria-hidden="true"
                    >
                    <input 
                        class="navbar__search-bar" 
                        id="navbar__search-bar" 
                        type="text" 
                        name="movie_name" 
                        placeholder="Search movie"
                    >
                </div>
            </div>
            <div class="navbar__group">
                <div class="navbar__item" onclick="location.href = '/history'">
                    Transactions
                </div>
                <div class="navbar__item" onclick="location.href = '/logout'">
                    Logout
                </div>
            </div>
        </nav>
    </div>
    <div class="container__outer">
        <div class="container__inner layout__wrapper">
            <div class="layout__wrapper-inner container review__wrapper">
                <div class="review__title">
                    <a href="/history" >
                    <img src="../public/assets/img/angle-pointing-to-left.svg" class="review__title-img" aria-hidden="true">
                    </a>
                    <span class="review__title-name">Avenger</span>
                </div>
                <div class="review__film-wrapper">
                    <form id="form1" class="review__film-star" method="POST">
                        <div class="review__film-star-wrapper">
                            <div class="review__film-star-add-rating">Add Rating</div>
                            <div class="review__film-star-label">
                                <input type="radio" name="rating" id="ten" value="10">
                                <label for="ten">&starf;</label>
                                <input type="radio" name="rating" id="nine" value="9">
                                <label for="nine">&starf;</label>
                                <input type="radio" name="rating" id="eight" value="8">
                                <label for="eight">&starf;</label>
                                <input type="radio" name="rating" id="seven" value="7">
                                <label for="seven">&starf;</label>
                                <input type="radio" name="rating" id="six" value="6">
                                <label for="six">&starf;</label>
                                <input type="radio" name="rating" id="five" value="5">
                                <label for="five">&starf;</label>
                                <input type="radio" name="rating" id="four" value="4">
                                <label for="four">&starf;</label>
                                <input type="radio" name="rating" id="three" value="3">
                                <label for="three">&starf;</label>
                                <input type="radio" name="rating" id="two" value="2">
                                <label for="two">&starf;</label>
                                <input type="radio" name="rating" id="one" value="1">
                                <label for="one">&starf;</label>
                            </div>
                        </div>
                        <?php 
                        echo "<input type='hidden' id='userid' value='" . $_SESSION['id'] . "'/>";
                        ?>
                        <?php echo "<input type='hidden' id='movie_id' value='" . $_GET['movie_id'] . "'/>";
                        ?>
                        <?php echo "<input type='hidden' id='transaction_id' value='" . $_GET['transaction_id'] . "'/>";
                        ?>
                        <div class="review__film-star-add-review-wrapper">
                            <div class="review__film-star-add-review">Add review</div>
                            <div class="review__film-star-add-review-form">
                                <textarea rows="5" id="textArea"></textarea>
                            </div>

                        </div>
                        <div class="review__film-star-button">
                        <?php if($_GET['reviewed']==1){
                            echo "<button type=\"submit\" value=\"Submit\" onclick=\"submitEditForm()\" form=\"form1\" class=\"review__film-star-button-submit\">Edit</button>";
                        }
                            else{
                                echo "<button type=\"submit\" value=\"Submit\" onclick=\"submitReviewForm()\" form=\"form1\" class=\"review__film-star-button-submit\">Submit</button>";
                            }
                            ?>
                        <a value=Submit href= "/history"class=review__film-star-button-cancel>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../public/assets/js/review.js"></script>
</body>

</html>