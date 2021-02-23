$(document).ready(function () {
  const main = document.querySelector("#main");
  var page_num = 1;
  load_page(page_num, false);
  main.addEventListener("scroll", () => {
    if (main.clientHeight + main.scrollTop >= main.scrollHeight) {
      page_num++;
      load_page(page_num, false);
    }
  });
});

function load_page(page_num, loading) {
  if (loading == false) {
    loading = true;
    $.ajax({
      url: "http://localhost:8080/app/Controllers/InfiniteScrollController.php",
      type: "post",
      data: {
        page_num: page_num,
      },
      beforeSend: function () {
        $("#spinner").removeClass("hidden");
        return;
      },
    })
      .done(function (data) {
        $("#spinner").addClass("hidden");
        loading = false;
        $("#dynamic-posts").append(data);
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        $("#spinner").addClass("hidden");
      });
  }
}
