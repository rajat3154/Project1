$(document).ready(function () {
    $('#recipeTable').DataTable();
});

function toggleRecipeCard() {
    var recipeCard = document.getElementById("recipeCard");
    recipeCard.classList.toggle("open");
}
function toggleAddRecipeForm() {
    var addRecipeForm = document.getElementById("addRecipeForm");
    addRecipeForm.classList.toggle("show");
}

function openRecipeCard(btn) {
    toggleRecipeCard();
    var row = btn.closest("tr");
    var cells = row.querySelectorAll("td");
    var recipeName = cells[0].innerText;
    var ingredients = cells[1].innerText;
    var procedure = cells[2].innerText;
    var submittedBy = cells[3].innerText;

    document.getElementById("recipeCardContentContainer").innerHTML = `
                <h2>${recipeName}</h2>
                <div class="recipe-details"><strong>Ingredients:</strong> ${ingredients}</div>
                <div class="recipe-details"><strong>Procedure:</strong> ${procedure}</div>
                <div class="recipe-details"><strong>Submitted by:</strong> <span>${submittedBy}</span></div>
            `;
}
function performSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchRecipe");
    filter = input.value.toUpperCase();
    table = document.getElementById("recipeTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}