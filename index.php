<?php
include('header.php');
require_once './api/dbcon.php';

?>
<div class="part-1">

    <?php
    // Define the active page variable based on the current page
    $active_page = basename($_SERVER['PHP_SELF'], ".php");
    // Include the navbar.php file
    include('side-bar.php');
    ?>

</div>
<div class="part-2">

    <h2>Home</h2>

    <h4>Recents Audios</h4>

    <div class="m-recents">

        <?php
        $query = "SELECT * FROM music ORDER BY created_at DESC";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
        $query_result = mysqli_stmt_get_result($stmt);

        for ($i = 1; $i <= 3; $i++) {
            $music = mysqli_fetch_assoc($query_result);
            if ($music) {

        ?>
                <div class="m-part">
                    <i class="bi bi-music-note-beamed"></i>
                    <div><?= $music['pre_name'] ?></div>
                </div>

        <?php
            }
        }

        ?>



    </div>
    <br>
    <br>
    <br><br>

    <h4>Recents Videos</h4>


    <div class="m-recents">

        <?php
        $query = "SELECT * FROM video ORDER BY created_at DESC";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
        $query_result = mysqli_stmt_get_result($stmt);

        for ($i = 1; $i <= 3; $i++) {
            $video = mysqli_fetch_assoc($query_result);
            if ($video) {

        ?>
                <div class="v-part">
                    <i class="bi bi-camera-reels"></i>
                    <div><?= $video['pre_name'] ?></div>

                </div>

        <?php
            }
        }

        ?>



    </div>

</div>
</body>

</html>