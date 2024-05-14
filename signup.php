
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function (event) {
            event.preventDefault();
            this.submit();
        });

    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $food_pref = $_POST['food-preferences'];
        $cooking_skill = $_POST['cooking-skill'];

        $servername = "localhost";
        $username = "root";
        $db_password = ""; 
        $database = "useraccount";

        $conn = mysqli_connect($servername, $username, $db_password, $database);
      
        
        if (!$conn) {
            die("Sorry we failed to connect: " . mysqli_connect_error());
        } else {
           
            $sql = "INSERT INTO `users` (`FullName`, `Email`, `Password`, `Food_Preference`, `Cooking_Skill`, `timestamp`) VALUES ( '$fullname', '$email', '$password', '$food_pref', '$cooking_skill', current_timestamp());";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your entry has been submitted successfully!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                      </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvenience caused!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                      </div>';
            }

        }
    }
    ?>

</body>

</html>
