<?php
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
        // JavaScript variable
        var myVariable = "Hello PHP!";

        // Make an Ajax request
        $.ajax({
            url: 'about.php', // Replace with the actual path to your PHP script
            type: 'POST',
            data: {
                myVariable: myVariable
            },
            success: function(response) {
                // Handle the response from PHP
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log(error);
            }
        });
        </script>



        <?php
        // Retrieve the variable from the Ajax request
        $myVariable = $_POST['myVariable'];

        // Use the variable in your PHP code
        echo "Received variable: " . $myVariable;
        ?>




    </div>
</div>

</body>

</html>