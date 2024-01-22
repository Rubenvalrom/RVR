function mostrarMenu() {
    var x = document.getElementById("menuCategoriasVertical");
    if (x.style.display === "none") {
        x.style.display = "flex";

    } else {
        x.style.display = "none";
    }
}