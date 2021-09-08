<!-- container -->
<div class="container">

    <div class="page-header">
        <h1><?php echo API_NAME; ?></h1>
    </div>
    <?php
    if (isset($_SESSION['name'])) {
      echo '<div class="alert alert-success">
        Welcome '.$_SESSION['name'].'</div>';
    }
    ?>
    <!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $page_title=="LOGOUT" ? "class='active'" : ""; ?> >
                   <a href="<?php echo BASE_URL; ?>/logout">
                        LOGOUT
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->

    </div>
</div>
<!-- /navbar -->
