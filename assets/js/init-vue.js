new Vue({
  el: "#app",
  data: {
    postId: null,
    comments: [],
    newComment: {
      post_id: parseInt(document.querySelector("#post_id").value),
      user_id: parseInt(document.querySelector("#user_id").value),
      comment: "",
    },
    isMainMenuOpen: false,
    isFilterOpen: false,
    userDropDownOpen: false,
    isDarkModeOn: false,
    isBannerEdit: false,
    isModalOpen: false,
    isCommentCollapse: true,
    isHeartOpen: false,
    isLiked: false,
  },
  methods: {
    toggleHeart: function () {
      this.isHeartOpen = !this.isHeartOpen;
      this.isLiked = !this.isLiked;
      setTimeout(() => {
        this.isHeartOpen = !this.isHeartOpen;
      }, 1500);
    },
    toggleCommentCollapse: function () {
      this.isCommentCollapse = !this.isCommentCollapse;
    },
    toggleMainMenu: function () {
      this.isMainMenuOpen = !this.isMainMenuOpen;
    },
    toggleModal: function (id = null) {
      this.isModalOpen = !this.isModalOpen;
      this.postId = id;
    },
    toggleBannerEdit: function (e) {
      this.isBannerEdit = !this.isBannerEdit;
    },
    toggleFilter: function () {
      this.isFilterOpen = !this.isFilterOpen;
    },
    toggleUserDropDown: function () {
      this.userDropDownOpen = !this.userDropDownOpen;
    },
    toggleDarkMode: function () {
      let htmlClasses = document.querySelector("html").classList;
      if (localStorage.theme === "dark") {
        htmlClasses.remove("dark");
        localStorage.removeItem("theme");
        this.isDarkModeOn = false;
      } else {
        htmlClasses.add("dark");
        localStorage.theme = "dark";
        this.isDarkModeOn = true;
      }
    },
    toggleCommentBtn: function () {
      var button = document.getElementById("sendComment");
      if (this.newComment.comment.length > 0) {
        button.disabled = false;
        button.classList.remove("opacity-50");
      } else {
        button.disabled = true;
        button.classList.add("opacity-50");
      }
    },
    addComment: function () {
      var spinner = document.getElementById("spinner");
      var formData = this.toFormData(this.newComment);
      spinner.classList.remove("hidden");
      axios
        .post(
          "http://localhost:8080/app/Controllers/CommentController.php?action=add-comment",
          formData
        )
        .then((res) => {
          spinner.classList.add("hidden");
          this.newComment.comment = "";
          if (res.data.error) {
            console.log(res.data.message);
          } else {
            this.fetchAllComments();
          }
        });
    },
    fetchAllComments: function () {
      axios
        .get(
          `http://localhost:8080/app/Controllers/CommentController.php?action=fetch-comments&post_id=${this.newComment.post_id}`
        )
        .then((res) => {
          if (res.data.error) {
            console.log(res.data.message);
          } else {
            this.comments = res.data.comments;
          }
        });
    },
    toFormData: function (obj) {
      var fd = new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
  },
  created: function () {
    if (
      localStorage.theme === "dark"
      // ||(!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
      document.querySelector("html").classList.add("dark");
      this.isDarkModeOn = true;
    } else {
      document.querySelector("html").classList.remove("dark");
      this.isDarkModeOn = false;
    }
    // var button = document.getElementById("sendComment");
    // button.disabled = true;
    // button.classList.add("opacity-50");

    // this.fetchAllComments();
  },
});
