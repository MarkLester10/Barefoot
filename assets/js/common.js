const loading = document.querySelector(".loader");
const message = document.querySelector("#message");
const containerEl = document.querySelector(".collection__grid");

setTimeout(() => {
  message.classList.add("hidden");
}, 3000);

var mixer = mixitup(containerEl);

window.addEventListener("load", function () {
  loading.classList.add("active");
});
