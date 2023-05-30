<?php
session_start(); // Start the session

require_once './api/dbcon.php';
include('header.php');
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
    <h2>Upload Audio </h2>



    <form action="./api/upload_music.php" method="post" enctype="multipart/form-data">

        <div class="form-1">

            <div class="message">
                <?php
                if (isset($_SESSION['Music_Upload'])) {
                    echo $_SESSION['Music_Upload'];
                    unset($_SESSION['Music_Upload']);
                }
                ?>
            </div>

            <div class="control-form">
                <label for="music_name">Audio Name</label>
                <input type="text" name="music_name">
            </div>

            <div class="control-form">
                <label class="form-label">Upload Music</label>
                <input type="file" accept="audio/mp3, audio/wav" class="form-control" id="f" name="file">
            </div>

            <div class="control-form">
                <input name="upload_music" type="submit" />
            </div>
    </form>
</div>

</div>
</div>


</body>

</html>