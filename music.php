<?php
include('header.php');
require_once './api/dbcon.php';

?>



<script>
    var toogle = true;
    var audio = new Audio();
    var isPlaying = false;
    var storedTime = 0;
    var oldSource = "";

    function playAudio(source) {
        if (oldSource !== source) {
            oldSource = source;
            storedTime = 0; // Reset storedTime to 0 when audio source is changed
            isPlaying = false;
        }

        if (!isPlaying) {
            audio.src = source; // Set the source path dynamically
            audio.currentTime = storedTime; // Set the stored time
            audio.play();
            isPlaying = true;
            console.log("Audio is now playing.");
            toogle = false;

        } else {
            audio.pause();
            storedTime = audio.currentTime; // Store the current time
            isPlaying = false;
            console.log("Audio is now paused.");
            toogle = true;
        }
    }
</script>




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
            <h2>Music Library</h2>


            <div class="row">
                <div class="col-sm-6 col-md-4">


                    <div class="table-container" style="width:auto; height:70vh; overflow: scroll;">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM music ORDER BY created_at";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_execute($stmt);
                                $query_result = mysqli_stmt_get_result($stmt);

                                if (mysqli_num_rows($query_result) > 0) {
                                    while ($music = mysqli_fetch_assoc($query_result)) {
                                ?>

                                        <tr>
                                            <td style="text-align: center;">
                                                <i onclick="playAudio('<?php echo $music['pre_name']; ?>')" style="font-size: 28px; cursor:pointer;" class="bi bi-play-circle"></i>

                                            </td>

                                            <td><?= htmlspecialchars($music['pre_name']) ?></td>
                                            <td>

                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

</body>

</html>