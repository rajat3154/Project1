<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Recommendation System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://source.unsplash.com/1600x900/?food');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }

        .slidebar {
            position: fixed;
            top: 0;
            width: 50%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            overflow-x: hidden;
            transition: transform 0.5s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 20px;
        }

        .slidebar form {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .slidebar h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            color: white;
        }

        .slidebar label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
        }

        .slidebar input[type="text"],
        .slidebar textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            width: calc(100% - 20px);
        }

        .slidebar button[type="submit"] {
            background-color: #ffa726;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 15px;
            font-weight: bold;
        }

        .slidebar button[type="submit"]:hover {
            background-color: #ff9800;
        }

        .left-slidebar {
            left: -50%;
            width: 48%;
            transform: translateX(0);
        }

        .right-slidebar {
            right: -50%;
            width: 48%;
            transform: translateX(100%);
        }

        .left-slidebar-open {
            left: 0;
        }

        .right-slidebar-open {
            right: 0;
            transform: translateX(0);
        }

        /* Close button styles */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 8px;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 32px;
            height: 32px;
        }

        .close-btn:hover {
            background-color: #d32f2f;
        }

        .trigger-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .trigger-btn:hover {
            background-color: #45a049;
        }

        /* Additional Styles */
        .slidebar h2::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: #ffa726;
            margin: 15px auto;
            border-radius: 3px;
        }

        .slidebar input[type="text"]:focus,
        .slidebar textarea:focus {
            outline: none;
            border-color: #ffa726;
            box-shadow: 0 0 5px rgba(255, 167, 38, 0.7);
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .slidebar {
                width: 90%;
            }

            .right-slidebar {
                width: 90%;
            }

            .slidebar input[type="text"],
            .slidebar textarea {
                padding: 8px;
                margin-bottom: 10px;
            }

            .slidebar button[type="submit"] {
                padding: 10px 20px;
                margin-top: 12px;
            }

            .close-btn {
                padding: 6px;
                font-size: 16px;
            }

            .trigger-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        /* Background for Datatable */
        .datatable {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 400px;
            color: #fff;
        }

        .datatable table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #333;
        }

        .datatable th,
        .datatable td {
            padding: 10px;
            border: 1px solid #333;
            text-align: left;
        }

        .datatable th {
            background-color: #222;
            color: #fff;
        }

        .datatable tr:nth-child(even) {
            background-color: #333;
        }

        .datatable tr:hover {
            background-color: #555;
        }

       /* Recipe Card Styles */
.recipe-card {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    padding: 30px;
    border-radius: 10px;
    z-index: 100;
    display: none;
    max-width: 500px;
    width: 90%;
    text-align: center; /* Center-align text */
    overflow-y: auto; /* Enable scrolling if content exceeds card height */
}

.recipe-card.open {
    display: block;
}

.recipe-card .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease;
    padding: 8px;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 32px;
    height: 32px;
}

/* Other styles for recipe card content */
.recipe-card h2,
.recipe-card p {
    margin-bottom: 10px;
}

.recipe-card p strong {
    font-weight: bold;
}


.recipe-card p:last-child {
    margin-bottom: 0;
}

.recipe-card span {
    font-weight: bold;
    color: #333;
}

        .view-recipe-btn {
    background-color: #2196F3;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 14px;
}

.view-recipe-btn:hover {
    background-color: #0b7dda;
}

    </style>
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
            <form action="" method="POST">
                <h3>Add A new Recipe</h3>

                <input type="text" id="user" name="user" placeholder="Username">
                <input type="text" id="recipeName" name="recipeName" placeholder="Recipe Name">
                <textarea id="recipeIngredients" name="recipeIngredients" placeholder="Ingredients"></textarea>
                <textarea id="recipeProcedure" name="recipeProcedure" placeholder="Procedure"></textarea>
                <button type="submit">Add Recipe</button>
            </form>
  <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "recipes2");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare data for insertion
    $recipeName = mysqli_real_escape_string($conn, $_POST['recipeName']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['recipeIngredients']);
    $procedure = mysqli_real_escape_string($conn, $_POST['recipeProcedure']);
    $username = mysqli_real_escape_string($conn, $_POST['user']);

    // Insert data into the database
    $sql = "INSERT INTO `recipes2` (recipename, ingredients, recipeprocedure, username) VALUES ('$recipeName', '$ingredients', '$procedure', '$username')";

    if (mysqli_query($conn, $sql)) {
        echo "New recipe added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

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
    <h2 id="username"></h2>
    <h2 id="recipeTitle"></h2>
    <p id="recipeIngredients"></p>
    <p id="recipeProcedure"></p>
    <p><strong>Submitted by:</strong> <span id="recipeSubmittedBy"></span></p>
 
    
</div>




    <script>
        // Function to open the left sidebar
        function toggleLeftSidebar() {
            var leftSidebar = document.querySelector('.left-slidebar');
            leftSidebar.classList.toggle('left-slidebar-open');
        }

        // Function to open the right sidebar
        function toggleRightSidebar() {
            var rightSidebar = document.querySelector('.right-slidebar');
            rightSidebar.classList.toggle('right-slidebar-open');
        }

 function openRecipeCard() {
    var recipeCard = document.getElementById("recipeCard");
    recipeCard.classList.add("open");

    // Get the clicked row's data
    var rowData = this.parentNode.parentNode.cells;

    // Update the recipe card with the data
    document.getElementById("username").innerText = "Submitted by: " + rowData[3].innerText;
    document.getElementById("recipeTitle").innerText = rowData[0].innerText;
    document.getElementById("recipeIngredients").innerText = "Ingredients: " + rowData[1].innerText;
    document.getElementById("recipeProcedure").innerText = "Procedure: " + rowData[2].innerText;
    document.getElementById("recipeSubmittedBy").innerText = rowData[3].innerText;
}

// Attach click event to view recipe buttons
var viewRecipeBtns = document.querySelectorAll(".view-recipe-btn");
viewRecipeBtns.forEach(function (btn) {
    btn.addEventListener("click", openRecipeCard);
});

// Function to close the recipe card
function closeRecipeCard() {
    var recipeCard = document.getElementById("recipeCard");
    recipeCard.classList.remove("open");
}

// Attach click event to close button in the recipe card
var closeBtnRecipeCard = document.querySelector(".recipe-card .close-btn");
closeBtnRecipeCard.addEventListener("click", closeRecipeCard);



// Attach click event to view recipe buttons
var viewRecipeBtns = document.querySelectorAll(".view-recipe-btn");
viewRecipeBtns.forEach(function (btn) {
    btn.addEventListener("click", openRecipeCard);
});



        // Function to close the recipe card
       
        // Attach click event to view recipe buttons
      
        // Search functionality for recipes
        var searchForm = document.querySelector('.slidebar.left-slidebar form');
        var searchInput = document.getElementById('searchRecipe');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();
            var searchTerm = searchInput.value.toLowerCase();
            var rows = document.querySelectorAll('.datatable table tr');

            rows.forEach(function (row) {
                var recipeName = row.cells[0].innerText.toLowerCase();
                if (recipeName.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>