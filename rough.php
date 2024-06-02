<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="#dashboard">Dashboard</a>
    <a href="#recipes">Manage Recipes</a>
    <a href="#users">Manage Users</a>
    <a href="#reviews">Manage Reviews</a>
    <a href="#settings">Settings</a>
</div>

<div class="content">
    <h2>Admin Dashboard</h2>
    <div id="dashboard">
        <h3>Overview</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Recipes</div>
                    <div class="card-body">
                        <h5 class="card-title" id="recipe-count">0</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h5 class="card-title" id="user-count">0</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Reviews</div>
                    <div class="card-body">
                        <h5 class="card-title" id="review-count">0</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <h3>Recent Activity</h3>
        <ul class="list-group">
            <li class="list-group-item">New recipe added: Chocolate Cake</li>
            <li class="list-group-item">New user registered: John Doe</li>
            <li class="list-group-item">New review posted: Excellent recipe!</li>
        </ul>
        
        <h3>Statistics</h3>
        <div class="row">
            <div class="col-md-6">
                <canvas id="recipeChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
    
    <div id="recipes" style="display: none;">
        <h3>Manage Recipes</h3>
        <button class="btn btn-primary" onclick="showAddRecipeForm()">Add New Recipe</button>
        <div id="add-recipe-form" style="display: none;">
            <h4>Add New Recipe</h4>
            <form>
                <div class="form-group">
                    <label for="recipe-name">Recipe Name</label>
                    <input type="text" class="form-control" id="recipe-name">
                </div>
                <div class="form-group">
                    <label for="recipe-ingredients">Ingredients</label>
                    <textarea class="form-control" id="recipe-ingredients"></textarea>
                </div>
                <div class="form-group">
                    <label for="recipe-instructions">Instructions</label>
                    <textarea class="form-control" id="recipe-instructions"></textarea>
                </div>
                <button type="button" class="btn btn-success" onclick="addRecipe()">Add Recipe</button>
            </form>
        </div>
        <div id="recipe-list">
            <h4>Recipe List</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Ingredients</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="recipe-table-body">
                    <!-- Recipes will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="users" style="display: none;">
        <h3>Manage Users</h3>
        <div id="user-list">
            <h4>User List</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="user-table-body">
                    <!-- Users will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="reviews" style="display: none;">
        <h3>Manage Reviews</h3>
        <div id="review-list">
            <!-- Review list will be dynamically populated here -->
        </div>
    </div>
    
    <div id="settings" style="display: none;">
        <h3>Settings</h3>
        <div id="admin-settings">
            <h4>Admin Profile</h4>
            <form>
                <div class="form-group">
                    <label for="admin-username">Username</label>
                    <input type="text" class="form-control" id="admin-username" value="admin">
                </div>
                <div class="form-group">
                    <label for="admin-email">Email</label>
                    <input type="email" class="form-control" id="admin-email" value="admin@example.com">
                </div>
                <div class="form-group">
                    <label for="admin-password">Password</label>
                    <input type="password" class="form-control" id="admin-password">
                </div>
                <button type="button" class="btn btn-success" onclick="updateProfile()">Update Profile</button>
            </form>
        </div>
        
        <div id="site-settings">
            <h4>Site Settings</h4>
            <form>
                <div class="form-group">
                    <label for="site-name">Site Name</label>
                    <input type="text" class="form-control" id="site-name" value="Recipe Website">
                </div>
                <div class="form-group">
                    <label for="site-description">Site Description</label>
                    <textarea class="form-control" id="site-description">The best place to find and share recipes.</textarea>
                </div>
                <div class="form-group">
                    <label for="site-email">Contact Email</label>
                    <input type="email" class="form-control" id="site-email" value="contact@example.com">
                </div>
                <button type="button" class="btn btn-success" onclick="updateSiteSettings()">Update Site Settings</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.content > div').forEach(section => {
                section.style.display = 'none';
            });
            document.querySelector(this.getAttribute('href')).style.display = 'block';
        });
    });

    function showAddRecipeForm() {
        document.getElementById('add-recipe-form').style.display = 'block';
    }

    function addRecipe() {
        // Implementation for adding a new recipe
        alert('Recipe added successfully!');
        document.getElementById('add-recipe-form').style.display = 'none';
        fetchRecipes();
    }

    function fetchDashboardData() {
        document.getElementById('recipe-count').innerText = 10; // Example data
        document.getElementById('user-count').innerText = 5; // Example data
        document.getElementById('review-count').innerText = 3; // Example data

        var ctxRecipe = document.getElementById('recipeChart').getContext('2d');
        var recipeChart = new Chart(ctxRecipe, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: '# of Recipes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxUser = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctxUser, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: '# of Users',
                    data: [15, 29, 5, 5, 20, 3],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function fetchRecipes() {
        const recipes = [
            { id: 1, name: 'Chocolate Cake', ingredients: 'Flour, Sugar, Cocoa, Baking Powder, Eggs' },
            { id: 2, name: 'Spaghetti Bolognese', ingredients: 'Spaghetti, Ground Beef, Tomato Sauce, Onions, Garlic' }
        ];
        const recipeTableBody = document.getElementById('recipe-table-body');
        recipeTableBody.innerHTML = '';
        recipes.forEach(recipe => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${recipe.id}</td>
                <td>${recipe.name}</td>
                <td>${recipe.ingredients}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editRecipe(${recipe.id})">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteRecipe(${recipe.id})">Delete</button>
                </td>
            `;
            recipeTableBody.appendChild(row);
        });
    }

    function editRecipe(id) {
        alert('Edit recipe with ID ' + id);
        // Implement edit functionality here
    }

    function deleteRecipe(id) {
        alert('Delete recipe with ID ' + id);
        // Implement delete functionality here
        fetchRecipes();
    }

    function fetchUsers() {
        const users = [
            { id: 1, username: 'johndoe', email: 'johndoe@example.com' },
            { id: 2, username: 'janedoe', email: 'janedoe@example.com' }
        ];
        const userTableBody = document.getElementById('user-table-body');
        userTableBody.innerHTML = '';
        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editUser(${user.id})">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Delete</button>
                </td>
            `;
            userTableBody.appendChild(row);
        });
    }

    function editUser(id) {
        alert('Edit user with ID ' + id);
        // Implement edit functionality here
    }

    function deleteUser(id) {
        alert('Delete user with ID ' + id);
        // Implement delete functionality here
        fetchUsers();
    }

    function updateProfile() {
        alert('Profile updated successfully!');
        // Implementation for updating profile
    }

    function updateSiteSettings() {
        alert('Site settings updated successfully!');
        // Implementation for updating site settings
    }

    fetchDashboardData();
    fetchRecipes();
    fetchUsers();
</script>

</body>
</html>
