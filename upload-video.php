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
    <h2>Upload Video </h2>
    <form action="./api/upload_video.php" method="post" enctype="multipart/form-data">

        <div class="form-1">
            <div class="control-form">
                <label for="music_name">Video Name</label>
                <input type="text" name="video_name">
            </div>


            <div class="control-form">
                <label>Upload Music</label>
                <input type="file" accept="video/mp4, video/webm" id="f" name="file">
            </div>

            <input name="upload_video" type="submit" />


        </div>
    </form>
</div>


</body>

</html>