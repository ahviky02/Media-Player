<?php
include('header.php');
require_once './api/dbcon.php';

?>

<!-- <script>
    var toggle = true;
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
            toggle = false;
        } else {
            audio.pause();
            storedTime = audio.currentTime; // Store the current time
            isPlaying = false;
            console.log("Audio is now paused.");
            toggle = true;
        }
    }
</script> -->


<div class="row">
    <div>
        <?php
        // Define the active page variable based on the current page
        $active_page = basename($_SERVER['PHP_SELF'], ".php");
        // Include the navbar.php file
        include('side-bar.php');
        ?>
    </div>

    <div class="main-content" style="width:80%; ">
        <div class="container mt-2 ml-3">
            <h2>Music Library</h2>
            <div class="row">
                <div>
                    <div class="table-container pd-2" style="overflow-x: scroll;">
                        <table class="table table-borderless pd-5">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Video</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM video ORDER BY created_at";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_execute($stmt);
                                $query_result = mysqli_stmt_get_result($stmt);

                                if (mysqli_num_rows($query_result) > 0) {
                                    while ($video = mysqli_fetch_assoc($query_result)) {
                                        $source = 'uploads/audios/' . $video['pre_name'];
                                        $id = "icon" . $video['vid'];
                                ?>

                                        <tr>
                                            <td style="text-align: center; line-height:28px;">
                                                <?php
                                                $data = $video['vid'];
                                                $url = "ground.php?data=" . urlencode($data);
                                                echo '<a href="' . $url . '">';
                                                echo '<i style="font-size: 28px; cursor:pointer;"
                                                class="bi bi-play-circle"></i>';
                                                echo '</a>';

                                                ?>
                                            </td>
                                            <td><?= htmlspecialchars($video['pre_name']) ?></td>

                                            <td>
                                                <?php
                                                echo $video['duration'];
                                                ?>
                                            </td>
                                    <?php
                                    }
                                }
                                    ?>
                                        </tr>
                            </tbody>


                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>



<?php

include('footer.php');

?>