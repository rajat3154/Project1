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

// Function to open the recipe card and display recipe details
function openRecipeCard() {
    var recipeCard = document.getElementById("recipeCard");
    recipeCard.classList.add("open");
    var rowData = this.parentNode.parentNode.cells;
    document.getElementById("recipeTitle").innerText = rowData[0].innerText;
    document.getElementById("recipeIngredients").innerText = rowData[1].innerText;
    document.getElementById("recipeProcedure").innerText = rowData[2].innerText;
    document.getElementById("recipeSubmittedBy").innerText = rowData[3].innerText;
}

// Function to close the recipe card
function closeRecipeCard() {
    var recipeCard = document.getElementById("recipeCard");
    recipeCard.classList.remove("open");
}

// Attach click event to view recipe buttons
var viewRecipeBtns = document.querySelectorAll(".view-recipe-btn");
viewRecipeBtns.forEach(function (btn) {
    btn.addEventListener("click", openRecipeCard);
});

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