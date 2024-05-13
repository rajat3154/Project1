<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Recommendation System</title>
  <link rel="stylesheet" href="recipes.css">
</head>

<body>
    <div class="form-container">
        <!-- Left Sidebar -->
        <div class="slidebar left-slidebar">
            <button class="close-btn" onclick="toggleLeftSidebar()">X</button>
            <h2>What's in your Fridge ?</h2>
            <form action="#">
                <label for="searchRecipe">Search Recipe:</label>
                <input type="text" id="searchRecipe" name="searchRecipe">
                <button type="submit">Search</button>
            </form>
         
        </div>

        <!-- Right Sidebar -->
        <div class="slidebar right-slidebar">
            <button class="close-btn" onclick="toggleRightSidebar()">X</button>
            <h2>Add a new Recipe</h2>
            <form action="#">
                <h3>Add A new Recipe</h3>

                <input type="text" id="recipeName" name="recipeName" placeholder="Recipe Name">
                <textarea id="recipeIngredients" name="recipeIngredients" placeholder="Ingredients"></textarea>
                <textarea id="recipeProcedure" name="recipeProcedure" placeholder="Procedure"></textarea>
                <button type="submit">Add Recipe</button>
            </form>
        </div>

        <!-- Trigger Buttons for Slidebars -->
        <button class="trigger-btn" onclick="toggleLeftSidebar()">Open Left Sidebar</button>
        <button class="trigger-btn" onclick="toggleRightSidebar()">Open Right Sidebar</button>

        <!-- Datatable to display all database entries -->
        <div class="datatable">
            <!-- PHP code to fetch and display recipes -->
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
        </div>
    </div>

    <!-- Popup card to display recipe details -->
    <div class="recipe-card" id="recipeCard">
        <button class="close-btn" onclick="closeRecipeCard()">X</button>
        <h2 id="recipeTitle"></h2>
        <p><strong>Ingredients:</strong></p>
        <p id="recipeIngredients"></p>
        <p><strong>Procedure:</strong></p>
        <p id="recipeProcedure"></p>
        <p><strong>Submitted by:</strong> <span id="recipeSubmittedBy"></span></p>
    </div>

   <script src="recipes.js"></script>
</body>

</html>