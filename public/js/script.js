// navbar
const navbar = document.getElementsByTagName("nav")[0];
window.addEventListener("scroll", function () {
    console.log(window.scrollY);
    if (window.scrollY > 1) {
        navbar.classList.replace("bg-transparent", "nav-color");
    } else if (this.window.scrollY <= 0) {
        navbar.classList.replace("nav-color", "bg-transparent");
    }
});

// Writing String
var string = "Jual Beli Tanpa Batas";
var str = string.split("");
var el = document.getElementById("str");
(function animate() {
    str.length > 0 ? (el.innerHTML += str.shift()) : clearTimeout(running);
    var running = setTimeout(animate, 90);
})();
