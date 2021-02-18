const loading = document.querySelector(".loader");
const message = document.querySelector("#message");
const containerEl = document.querySelector(".mixitup");
const slug = document.querySelector("#slug");

setTimeout(() => {
  message.classList.add("hidden");
}, 3000);

var mixer = mixitup(containerEl);

// loader
window.addEventListener("load", function () {
  loading.classList.add("active");
});

// Toggle comment action pop up
function togglePopUp(e) {
  e.nextElementSibling.classList.toggle("block");
}

//multi select
new TomSelect("#tags", {
  plugins: ["remove_button"],
  create: true,
  maxItems: 3,
});

//CK EDitors
CKEDITOR.replace("body");

//slugify
function slugify(str) {
  str = str.replace(/^\s+|\s+$/g, ""); // trim
  str = str.toLowerCase();

  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to = "aaaaeeeeiiiioooouuuunc------";
  for (var i = 0, l = from.length; i < l; i++) {
    str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
  }

  str = str
    .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
    .replace(/\s+/g, "-") // collapse whitespace and replace by -
    .replace(/-+/g, "-"); // collapse dashes

  slug.value = str;
}
