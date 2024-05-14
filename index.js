document.addEventListener("DOMContentLoaded", function () {
    const toggleSidebarBtn = document.querySelector(".toggle-sidebar");
    const sidebar = document.querySelector(".sidebar");
    const sidebarLeft = document.querySelector(".sidebar-left");
    const closeBtn = document.querySelector(".close-btn");
    const aboutLink = document.querySelector(".nav-link.toggle-sidebar-left"); // Selector for the "About" link

    toggleSidebarBtn.addEventListener("click", function (e) {
        e.preventDefault();
        sidebar.style.right = "0"; 
    });

    closeBtn.addEventListener("click", function () {
        sidebar.style.right = "-450px"; 
    });

    aboutLink.addEventListener("click", function (e) {
        e.preventDefault();
        sidebarLeft.style.left = "0";

    const closeBtnLeft = document.querySelector(".sidebar-left .close-btn"); 

    closeBtnLeft.addEventListener("click", function () {
        sidebarLeft.style.left = "-450px"; 
    });

    window.addEventListener("resize", function () {
        sidebar.style.paddingTop = document.querySelector(".navbar").offsetHeight + "px";
        sidebarLeft.style.paddingTop = document.querySelector(".navbar").offsetHeight + "px";
    });


    sidebar.style.paddingTop = document.querySelector(".navbar").offsetHeight + "px";
    sidebarLeft.style.paddingTop = document.querySelector(".navbar").offsetHeight + "px";
});
document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.querySelector('.sidebar');
    var editProfileBtn = document.querySelector('.edit-profile-btn');
    var closeBtn = document.querySelector('.close-btn');

  
    editProfileBtn.addEventListener('click', function (event) {
        event.preventDefault();
        sidebar.classList.add('open');
    });


    closeBtn.addEventListener('click', function (event) {
        event.preventDefault();
        sidebar.classList.remove('open');
    });

 
    function saveProfileChanges() {
        var editUsername = document.getElementById('editUsername').value;
        var editEmail = document.getElementById('editEmail').value;
        var editFoodPref = document.getElementById('editFoodPref').value;
        var editCookingSkill = document.getElementById('editCookingSkill').value;
        var editProfileImage = document.getElementById('editProfileImage').files[0];
        var editProfileImageURL = URL.createObjectURL(editProfileImage);

       
        document.querySelector('.profile-details p:nth-child(2)').textContent = 'Username: ' + editUsername;
        document.querySelector('.profile-details p:nth-child(3)').textContent = 'Email: ' + editEmail;
        document.querySelector('.profile-details p:nth-child(4)').textContent = 'Food Preferences: ' + editFoodPref;
        document.querySelector('.profile-details p:nth-child(5)').textContent = 'Cooking Skill Level: ' + editCookingSkill;
        document.querySelector('.profile-photo img').src = editProfileImageURL;

       
        sidebar.classList.remove('open');
    }

    document.getElementById('saveProfileChangesBtn').addEventListener('click', saveProfileChanges);
});
document.addEventListener("DOMContentLoaded", function () {
    const editProfileBtn = document.querySelector('.edit-profile-btn');
    const editForm = document.querySelector('.edit-form');
    const closeEditFormBtn = document.querySelector('.edit-form .close-btn');

    editProfileBtn.addEventListener('click', function (event) {
        event.preventDefault();
        editForm.style.display = 'block';
    });

    closeEditFormBtn.addEventListener('click', function (event) {
        event.preventDefault();
        editForm.style.display = 'none';
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const editForm = document.getElementById('editForm');

    editForm.addEventListener('submit', function (event) {
        event.preventDefault();

       
        const editUsername = document.getElementById('editUsername').value;
        const editEmail = document.getElementById('editEmail').value;
        const editFoodPref = document.getElementById('editFoodPref').value;
        const editCookingSkill = document.getElementById('editCookingSkill').value;
       

        
        document.querySelector('.profile-details p:nth-child(2)').textContent = 'Username: ' + editUsername;
        document.querySelector('.profile-details p:nth-child(3)').textContent = 'Email: ' + editEmail;
        document.querySelector('.profile-details p:nth-child(4)').textContent = 'Food Preferences: ' + editFoodPref;
        document.querySelector('.profile-details p:nth-child(5)').textContent = 'Cooking Skill Level: ' + editCookingSkill;

    
        document.querySelector('.edit-form').style.display = 'none';
    });
});

function toggleSidebar() {
    document.querySelector('.sidebar-left').classList.toggle('show');
}