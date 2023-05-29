<?php
include('header.php');
require_once './api/dbcon.php';

?>

<div class="row">
    <div>
        <?php
        // Define the active page variable based on the current page
        $active_page = basename($_SERVER['PHP_SELF'], ".php");
        // Include the navbar.php file
        include('side-bar.php');
        ?>
    </div>

    <div class="main-content col-md-9 col-sm-7">


        <div class="container m-5">
            <h2>Home</h2>


            <!-- <?php

                    ?>
            <div class="row">
                <div class="col-sm-6 col-md-4">

                    <li><?= htmlspecialchars($music['pre_name']) ?></li>
                    <?php
                    ?> -->


            <div class="table-container" style="width:auto; height:70vh; overflow: scroll;">

            </div>
        </div>


    </div>
</div>

</div>
</div>

</body>

</html>