<div class="side-bar">
    <ul>
        <li><a href="index.php" <?php if ($active_page === 'index') {
                                    echo
                                    'class="active"';
                                } else {
                                    echo 'class="link-dark"';
                                }  ?>><i class="bi bi-house pr-2"></i> Home</a></li>

        <li><a href="music.php" <?php if ($active_page === 'music') {
                                    echo
                                    'class="active"';
                                } else {
                                    echo 'class="link-dark"';
                                } ?>><i class="bi bi-music-note-list pr-2"></i></i>Music Library</a></li>

        <li><a href="video.php" <?php if ($active_page === 'video') {
                                    echo
                                    'class="active"';
                                } else {
                                    echo 'class="link-dark"';
                                } ?>><i class="bi bi-camera-video pr-2"></i>Video Library</a></li>

        <li><a href="upload.php" <?php if ($active_page === 'upload') {
                                        echo
                                        'class="active"';
                                    } else {
                                        echo 'class="link-dark"';
                                    } ?>><i class="bi bi-upload pr-2"></i>Upload Audio</a></li>

        <li><a href="upload-video.php" <?php if ($active_page === 'upload-video') {
                                            echo
                                            'class="active"';
                                        } else {
                                            echo 'class="link-dark"';
                                        } ?>><i class="bi bi-upload pr-2"></i>Upload Video</a></li>

        <li><a href="about.php" <?php if ($active_page === 'about') {
                                    echo
                                    'class="active"';
                                } else {
                                    echo 'class="link-dark"';
                                }  ?>><i class="bi bi-person-circle"></i> About Us</a></li>

    </ul>
</div>