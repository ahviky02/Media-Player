<?php
session_start(); // Start the session

require_once './api/dbcon.php';
include('header.php');
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



        <div class="upload">

            <form action="./api/upload_music.php" method="post" enctype="multipart/form-data">
                <h2 style="text-align: center;">Audio File Upload</h2>

                <div class="mb-3">
                    <span class="text-success"><?php
                                                // Display the message if it exists
                                                if (isset($_SESSION['Music_Upload'])) {
                                                    echo $_SESSION['Music_Upload'];
                                                    unset($_SESSION['Music_Upload']); // Clear the message
                                                }
                                                ?></span>
                </div>

                <div class="mb-3">
                    <label for="music_name" class="form-label">Audio Name</label>
                    <input type="text" name="music_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Music</label>
                    <input type="file" class="form-control" id="f" name="file">
                </div>
                <br>
                <button class="btn btn-success" name="upload_music" type="submit">Submit</button>
            </form>
        </div>

    </div>
</div>


</body>

</html>