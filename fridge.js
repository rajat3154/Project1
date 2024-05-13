document.getElementById('recipeForm').addEventListener('submit', function (event) {
    event.preventDefault();
    recommendRecipes();
});

function recommendRecipes() {
    const ingredientsInput = document.getElementById('ingredients');
    const complexityInput = document.getElementById('complexity');
    const recipeList = document.getElementById('recipeList');
    recipeList.innerHTML = '';

    const ingredients = ingredientsInput.value.trim().split(',').map(item => item.trim());
    const complexity = parseInt(complexityInput.value);
    if (ingredients.length === 0) {
        alert('Please enter some ingredients.');
        return;
    }

    // Simulated recommendation logic - replace this with your actual logic
    const recommendations = [
        { name: 'Chicken Alfredo Pasta', complexity: 4 },
        { name: 'Broccoli Cheese Casserole', complexity: 3 },
        { name: 'Grilled Chicken Salad', complexity: 2 },
        { name: 'Pasta Primavera', complexity: 5 }
    ];

    recommendations.forEach(recipe => {
        if (recipe.complexity <= complexity) {
            const li = document.createElement('li');
            li.textContent = recipe.name;
            li.className = 'list-group-item';
            recipeList.appendChild(li);
        }
    });

    document.getElementById('fridge').style.display = 'none';
    document.getElementById('recommendations').style.display = 'block';
}