  <?php
            // Check if the database connection is successful
            $conn = mysqli_connect("localhost", "root", "", "recipes2");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch all recipes from the database
            $sql = "SELECT * FROM `recipes2`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<h2>All Recipes:</h2>';
                echo '<table>';
                echo '<tr><th>Recipe Name</th><th>Ingredients</th><th>Procedure</th><th>Submitted by</th><th>Action</th></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['recipename'] . '</td>';
                    echo '<td>' . $row['ingredients'] . '</td>';
                    echo '<td>' . $row['recipeprocedure'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td><button class="view-recipe-btn">View Recipe</button></td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No recipes found!</p>';
            }

            mysqli_close($conn);
            ?>