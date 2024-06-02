document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    const toggleSidebarBtn = document.querySelector(".toggle-sidebar");
    const sidebar = document.querySelector(".sidebar");
    const sidebarLeft = document.querySelector(".sidebar-left");
    const closeBtns = document.querySelectorAll(".close-btn");
    const aboutLink = document.querySelector(".nav-link.toggle-sidebar-left");
    const editProfileBtn = document.querySelector(".edit-profile-btn");
    const editForm = document.querySelector(".edit-form");

    function setSidebarPadding() {
        const padding = navbar.offsetHeight + "px";
        sidebar.style.paddingTop = padding;
        sidebarLeft.style.paddingTop = padding;
    }

    toggleSidebarBtn.addEventListener("click", function (e) {
        e.preventDefault();
        sidebar.style.right = "0";
    });

    closeBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            sidebar.style.right = "-450px";
            sidebarLeft.style.left = "-450px";
            editForm.style.display = 'none';
        });
    });

    aboutLink.addEventListener("click", function (e) {
        e.preventDefault();
        sidebarLeft.style.left = "0";
    });

    editProfileBtn.addEventListener("click", function (event) {
        event.preventDefault();
        editForm.style.display = 'block';
    });

    document.getElementById('saveProfileChangesBtn').addEventListener('click', function () {
        const editUsername = document.getElementById('editUsername').value;
        const editEmail = document.getElementById('editEmail').value;
        const editFoodPref = document.getElementById('editFoodPref').value;
        const editCookingSkill = document.getElementById('editCookingSkill').value;
        const editProfileImage = document.getElementById('editProfileImage').files[0];

        if (editProfileImage) {
            const editProfileImageURL = URL.createObjectURL(editProfileImage);
            document.querySelector('.profile-photo img').src = editProfileImageURL;
        }

        document.querySelector('.profile-details p:nth-child(2)').textContent = 'Username: ' + editUsername;
        document.querySelector('.profile-details p:nth-child(3)').textContent = 'Email: ' + editEmail;
        document.querySelector('.profile-details p:nth-child(4)').textContent = 'Food Preferences: ' + editFoodPref;
        document.querySelector('.profile-details p:nth-child(5)').textContent = 'Cooking Skill Level: ' + editCookingSkill;

        editForm.style.display = 'none';
        sidebar.style.right = "-450px"; 
    });

    window.addEventListener("resize", setSidebarPadding);
    setSidebarPadding(); 
});
