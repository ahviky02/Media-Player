<div class="d-flex flex-column flex-shrink-0 p-3 bg-light mt-5" style="width: 60mm; text-align:center;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a href="index.php" <?php if ($active_page === 'index') {
                                                        echo
                                                        'class="nav-link active"';
                                                    } else {
                                                        echo 'class="nav-link link-dark"';
                                                    }  ?>><i class="bi bi-house pr-2"></i> Home</a></li>

        <li><a href="music.php" <?php if ($active_page === 'music') {
                                    echo
                                    'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link link-dark"';
                                } ?>><i class="bi bi-music-note-list pr-2"></i></i>Music Library</a></li>

        <li><a href="upload.php" <?php if ($active_page === 'upload') {
                                        echo
                                        'class="nav-link active"';
                                    } else {
                                        echo 'class="nav-link link-dark"';
                                    } ?>><i class="bi bi-upload pr-2"></i>Upload Audio</a></li>
        <li><a href="about.php" <?php if ($active_page === 'about') {
                                    echo
                                    'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link link-dark"';
                                } ?>><i class="bi bi-camera-video pr-2"></i>Video Library</a></li>
    </ul>
</div>