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
                                    <th>Audio</th>
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
                                        $source = 'uploads/audios/' . $music['pre_name'];
                                        $id = "icon" . $music['mid'];
                                ?>

                                        <tr>
                                            <td style="text-align: center; line-height:28px;">
                                                <i id="<?= $id ?>" onclick="playAudio('<?= $id ?>', '<?= $source ?>')" style="font-size: 28px; cursor:pointer;" class="bi bi-play-circle"></i>
                                            </td>
                                            <td><?= htmlspecialchars($music['pre_name']) ?></td>

                                            <td>
                                                <?php
                                                echo $music['duration'];
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


<div class="bottom-div">
    <div class="row">
        <div class="col-1 curr-duration" id="current-time">
            00:00
        </div>
        <div class="col-10">
            <input class="custom-range" id="seek-bar" type="range" min="0" value="0">

        </div>
        <div class="col-1 duration" id="duration">
            00:00
        </div>
    </div>
</div>
</div>
<?php

include('footer.php');

?>