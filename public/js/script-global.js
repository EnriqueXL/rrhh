feather.replace();  // Inicializa feather icons

// Sidebar toggle functionality
const hamBurger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");

hamBurger.addEventListener("click", function () {
    sidebar.classList.toggle("expand");

    // Cerrar dropdowns abiertos si el sidebar se colapsa
    if (!sidebar.classList.contains('expand')) {
        document.querySelectorAll('.collapse.show').forEach(function (dropdown) {
            dropdown.classList.remove('show');
        });
    }
});

