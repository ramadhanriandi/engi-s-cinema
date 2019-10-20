
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

            <div class="layout__wrapper-inner container history__wrapper">
                <div class="history__title">
                    Transaction History
                </div>
                <div class="history__film-wrapper">
                    <?php foreach ($data as $data1) : ?>
                        <div class="history__film-item">
                            <div class="history__film-item-img" >

                            </div>
                            <div class="history__film-item-detail">
                                <div class="history__film-item-title">
                                    <?= $data1->movie_name ?>
                                </div>
                                <div class="history__film-item-schedule">
                                    Schedule:<span class="history__film-item-schedule-time"><?= $data1->show_date . " " . $data1->show_time ?></span>
                                </div>

                                <?php
                                    if ($data1->reviewed == 1) {
                                        echo "<span class=\"history__film-item-reviewstatus\" >
                                    Your review has been submitted
                                </span>";
                                    }?>
                                <div class="history__film-button">
                                    <?php
                                        date_default_timezone_set("Asia/Jakarta");
                                       
                                        if ($data1->show_date > date("Y-m-s")) { } 
                                        else if ($data1->show_date == date("Y-m-d") and $data1->show_date < date("h-i-s")) {

                                        } else {
                                            if ($data1->reviewed == 1) {
                                                echo "<a  href=\"/review?movie_id=" . $data1->movie_id . "&transaction_id=" . $data1->transaction_id .  "&reviewed=" . $data1->reviewed . "\"" . "class=\"history__film-button-edit\" >Edit Review </a>
                                                <a onclick=\"submitDeleteForm(this)\" class=\"history__film-button-delete\" value=\"".$data1->transaction_id."\">Delete Review </a>";
                                            } else {
                                                echo "<a  href=\"/review?movie_id=" . $data1->movie_id . "&transaction_id=" . $data1->transaction_id . "&reviewed=" . $data1->reviewed . "\"" . "class=\"history__film-button-add\"  >Add Review
                                                 </a>";
                                            }
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <script type="text/javascript" src="../public/assets/js/review.js"></script>
</body>

</html>