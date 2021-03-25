new Vue({
  el: "#app",
  data: {
    post: {},
    postUserId:
      document.querySelector("#post_user_id") != null
        ? parseInt(document.querySelector("#post_user_id").value)
        : "",
    postId: null,
    comments: [],
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
    clamp: function () {
      this.$refs.details.classList.toggle("line-clamp-5");
      if (!this.$refs.details.classList.contains("line-clamp-5")) {
        this.$refs.readmoreBtn.innerHTML = "Hide";
      } else {
        this.$refs.readmoreBtn.innerHTML = "Read More";
      }
    },
    toggleEditComment: function (obj) {
      this.isEdit = !this.isEdit;
      this.newComment.comment_id = obj.id;
      this.newComment.comment = obj.comment;
      this.$refs.sendCommentBtn.disabled = false;
      this.$refs.sendCommentBtn.classList.remove("opacity-50");
    },
    likeHandler: function () {
      this.isHeartOpen = !this.isHeartOpen;
      this.isLiked = !this.isLiked;
      if (this.isLiked) {
        this.post.likes++;
      } else {
        this.post.likes--;
      }
      axios
        .get(
          `http://localhost:8080/app/Controllers/LikeController.php?action=liked&post_id=${this.newComment.post_id}&user_id=${this.newComment.user_id}`
        )
        .then((res) => {
          this.getSinglePost();
          this.isHeartOpen = !this.isHeartOpen;
        });
    },
    getSinglePost: function () {
      axios
        .get(
          `http://localhost:8080/app/Controllers/LikeController.php?action=get-post&post_id=${this.newComment.post_id}&user_id=${this.newComment.user_id}`
        )
        .then((res) => {
          this.isLiked = res.data.isPostLiked;
          this.post = res.data.post;
        });
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
      if (this.newComment.comment.length > 0) {
        this.$refs.sendCommentBtn.disabled = false;
        this.$refs.sendCommentBtn.classList.remove("opacity-50");
      } else {
        this.$refs.sendCommentBtn.disabled = true;
        this.$refs.sendCommentBtn.classList.add("opacity-50");
      }
    },
    addComment: function () {
      var formData = this.toFormData(this.newComment);
      this.$refs.spinner.classList.remove("hidden");
      axios
        .post(
          "http://localhost:8080/app/Controllers/CommentController.php?action=add-comment",
          formData
        )
        .then((res) => {
          this.$refs.spinner.classList.add("hidden");
          this.newComment.comment = "";
          this.$refs.sendCommentBtn.disabled = true;
          this.$refs.sendCommentBtn.classList.add("opacity-50");
          this.fetchAllComments();
        });
    },
    editComment: function () {
      var formData = this.toFormData(this.newComment);
      this.$refs.spinner.classList.remove("hidden");
      axios
        .post(
          "http://localhost:8080/app/Controllers/CommentController.php?action=edit-comment",
          formData
        )
        .then((res) => {
          this.isEdit = !this.isEdit;
          this.$refs.sendCommentBtn.disabled = true;
          this.$refs.sendCommentBtn.classList.add("opacity-50");
          this.$refs.spinner.classList.add("hidden");
          this.newComment.comment = "";
          this.fetchAllComments();
        });
    },
    deleteComment: function () {
      axios
        .get(
          `http://localhost:8080/app/Controllers/CommentController.php?action=delete-comment&comment_id=${this.commentId}`
        )
        .then((res) => {
          this.isConfirmModalOpen = !this.isConfirmModalOpen;
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
            console.log(res.data.error);
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
  mounted: function () {
    if (this.$refs.sendCommentBtn) {
      this.$refs.sendCommentBtn.disabled = true;
      this.$refs.sendCommentBtn.classList.add("opacity-50");
    }
  },
  created: function () {
    this.getSinglePost();
    this.fetchAllComments();
    // DARKMODE
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
  },
});
