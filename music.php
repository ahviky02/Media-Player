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
    <h2>Audios</h2>
    <table class="song-table">
        <thead style="height:15mm;">
            <tr>
                <th style="width:10mm; ">Action</th>
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

            <tr style="height:15mm;">
                <td>
                    <i id="<?= $id ?>" onclick="playAudio('<?= $id ?>', '<?= $source ?>')"
                        style="font-size: 28px; cursor:pointer;" class="bi bi-play-circle"></i>
                </td>
                <td><?= htmlspecialchars($music['pre_name']) ?></td>

                <td>
                    <?php
                            echo $music['duration'];
                            ?>
                </td>
                <?php
                }
            } ?>
            </tr>
        </tbody>
    </table>
</div>

<!-- <div class="part-3">
    <div class="curr-duration" id="current-time">
        00:00
    </div>
    <div class="">
        <input class="custom-range" id="seek-bar" type="range" min="0" value="0">

    </div>
    <div class="duration" id="duration">
        00:00
    </div>
</div> -->
<?php

include('footer.php');

?>