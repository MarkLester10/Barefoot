module.exports = {
  purge: {
    enabled: true,
    content: ["./**/*.php"],
    options: {
      safelist: ["dark"],
    },
  },
  darkMode: "class", // or 'media' or 'class'
  theme: {
    fontFamily: {
      poppins: ["Poppins", "sans-serif"],
    },
  },
  variants: {
    extend: {},
  },
  plugins: [require("@tailwindcss/forms"), require("@tailwindcss/line-clamp")],
};
