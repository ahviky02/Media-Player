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

    <h2>Music Library</h2>
    <table>
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
<?php

include('footer.php');

?>