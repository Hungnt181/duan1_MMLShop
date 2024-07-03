document.querySelector(".icon_login").addEventListener("click", function(event) {
    document.querySelector(".login-form").classList.add("active");
    event.preventDefault();
});

document.querySelector(".close-btn").addEventListener("click", function() {
    document.querySelector(".login-form").classList.remove("active");   
});

document.addEventListener("mouseup", function(event) {
    let container = $(".form-container");
    if (!container.is(event.target) && container.has(event.target).length === 0) {
        document.querySelector(".login-form").classList.remove("active");
    }
});
