const loading = document.querySelector(".loader");
const message = document.querySelector("#message");

setTimeout(() => {
  message.classList.add("hidden");
}, 3000);

window.addEventListener("load", function () {
  loading.classList.add("active");
});
