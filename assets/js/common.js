const loading = document.querySelector(".loader");
const message = document.querySelector("#message");

setTimeout(() => {
  message.classList.add("hidden");
}, 5000);

window.addEventListener("load", function () {
  loading.classList.add("active");
});

const containerEl = document.querySelector(".collection__grid");
var mixer = mixitup(containerEl);
