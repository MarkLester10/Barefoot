new Vue({
  el: "#app",
  data: {
    travels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
    isMainMenuOpen: false,
    isFilterOpen: false,
    userDropDownOpen: false,
    isDarkModeOn: false,
    isBannerEdit: false,
    isModalOpen: false,
  },
  methods: {
    toggleMainMenu: function () {
      this.isMainMenuOpen = !this.isMainMenuOpen;
    },
    toggleModal: function () {
      this.isModalOpen = !this.isModalOpen;
    },
    toggleBannerEdit: function (e) {
      e.preventDefault();
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
  },
});
