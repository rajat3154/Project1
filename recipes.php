<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Recommendation System</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="recipes.css" rel="stylesheet">
    <style>
      
    </style>
</head>

<body>
    <nav class="navbar">
    <div class="navbar-brand">
        <img src="assets/logo.png"" alt="Logo" class="logo-img">
    </div>
    <div class="search-bar">
        <input type="text" class="search-input" placeholder="Search for recipes...">
        <button class="search-button">Search</button>
    </div>
    <div class="navbar-links">
        <a href="index.html" class="nav-link">Home</a>
        <a href="recipes.html" class="nav-link">Recipes</a>
        <a href="#" class="nav-link toggle-sidebar">Profile</a>
        <a href="about.html" class="nav-link">About</a>
        <a href="signup.html" class="nav-link">Signup</a>
    </div>
</nav>
    <div class="form-container">
        <div class="slidebar" id="slidebar">
            <h2>Search Recipes</h2>
            <form action="#" method="POST" id="recipeForm">
                <label for="searchRecipe">Search Recipe:</label>
                <input type="text" id="searchRecipe" name="searchRecipe" oninput="performSearch()">
                <button type="submit" class="fade-in">Search</button>
            </form>
      
            <div class="add-recipe-form" id="addRecipeForm">
                <h2>Add Recipe</h2>
                <form action="insert.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <label for="recipeName">Recipe Name:</label>
                    <input type="text" id="recipeName" name="recipeName">
                    <label for="ingredients">Ingredients:</label>
                    <textarea id="ingredients" name="ingredients"></textarea>
                    <label for="procedure">Procedure:</label>
                    <textarea id="procedure" name="procedure"></textarea>
                    <button type="submit" class="fade-in">Submit</button>
                </form>
            </div>
        </div>

        <div class="recipe-card" id="recipeCard">
            <button class="close-btn" onclick="toggleRecipeCard()" class="fade-in">X</button>
            <div id="recipeCardContentContainer">
               
            </div>
        </div>

        <div class="datatable-container">
            <h2>All Recipes:</h2>
            <table id="recipeTable" class="display">
                <thead>
                    <tr>
                        <th>Recipe Name</th>
                        <th>Ingredients</th>
                        <th>Procedure</th>
                        <th>Submitted by</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "recipes2");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM `recipes2`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['recipename'] . '</td>';
                            echo '<td>' . $row['ingredients'] . '</td>';
                            echo '<td>' . $row['recipeprocedure'] . '</td>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td><button class="view-recipe-btn" onclick="openRecipeCard(this)">View Recipe</button></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No recipes found!</td></tr>';
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="recipes.js">
      
    </script>
</body>

</html>