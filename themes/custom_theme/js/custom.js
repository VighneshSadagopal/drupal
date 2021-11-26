(function($) {

    document.getElementById('hamburger').addEventListener('click', () => {
        document.querySelector(".main_navigation ul.menu").classList.toggle('show');
        console.log("hi");

    });

    document.getElementById("edit-name").placeholder = "Username";
    document.getElementById("edit-pass").placeholder = "Password";

}(jQuery));