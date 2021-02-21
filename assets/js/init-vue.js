new Vue({
  el: "#app",
  data: {
    postId: null,
    comments: [],
    commentCount: 0,
    commentId: null,
    newComment: {
      comment_id: null,
      post_id:
        document.querySelector("#post_id") != null
          ? parseInt(document.querySelector("#post_id").value)
          : "",
      user_id:
        document.querySelector("#user_id") != null
          ? parseInt(document.querySelector("#user_id").value)
          : "",
      comment: "",
    },
    postUserId:
      document.querySelector("#post_user_id") != null
        ? parseInt(document.querySelector("#post_user_id").value)
        : "",
    isMainMenuOpen: false,
    isFilterOpen: false,
    userDropDownOpen: false,
    isDarkModeOn: false,
    isBannerEdit: false,
    isModalOpen: false,
    isConfirmModalOpen: false,
    isCommentCollapse: true,
    isHeartOpen: false,
    isLiked: false,
    isEdit: false,
  },
  methods: {
    toggleEditComment: function (obj) {
      this.isEdit = !this.isEdit;
      this.newComment.comment_id = obj.id;
      this.newComment.comment = obj.comment;
    },
    toggleHeart: function () {
      this.isHeartOpen = !this.isHeartOpen;
      this.isLiked = !this.isLiked;
      setTimeout(() => {
        this.isHeartOpen = !this.isHeartOpen;
      }, 1500);
    },
    togglePopUp: function (e) {
      e.nextElementSibling.classList.toggle("block");
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
    toggleConfirmModal: function (id = null) {
      this.isConfirmModalOpen = !this.isConfirmModalOpen;
      this.commentId = id;
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
          } else {
            this.fetchAllComments();
          }
        });
    },
    editComment: function () {
      var spinner = document.getElementById("spinner");
      var formData = this.toFormData(this.newComment);
      spinner.classList.remove("hidden");
      axios
        .post(
          "http://localhost:8080/app/Controllers/CommentController.php?action=edit-comment",
          formData
        )
        .then((res) => {
          this.isEdit = !this.isEdit;
          spinner.classList.add("hidden");
          this.newComment.comment = "";
          if (res.data.error) {
          } else {
            this.fetchAllComments();
          }
        });
    },
    deleteComment: function () {
      var spinner = document.getElementById("spinner");
      var formData = this.toFormData(this.newComment);
      spinner.classList.remove("hidden");
      axios
        .get(
          `http://localhost:8080/app/Controllers/CommentController.php?action=delete-comment&comment_id=${this.commentId}`
        )
        .then((res) => {
          this.isConfirmModalOpen = !this.isConfirmModalOpen;
          spinner.classList.add("hidden");
          if (res.data.error) {
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
            this.commentCount = res.data.commentCount;
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
    this.fetchAllComments();
    // darkmode
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

    var button = document.getElementById("sendComment");
    button.disabled = true;
    button.classList.add("opacity-50");
  },
});
