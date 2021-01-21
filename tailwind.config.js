module.exports = {
  purge: [],
  darkMode: "class", // or 'media' or 'class'
  theme: {
    extend: {
      spacing: {
        72: "18rem",
        80: "25rem",
      },
      padding: {
        "5/6": "83.3333333%",
      },
    },
    customForms: (theme) => ({
      default: {
        input: {
          borderRadius: theme("borderRadius.lg"),
          backgroundColor: theme("colors.gray.200"),
          "&:focus": {
            backgroundColor: theme("colors.white"),
          },
        },

        select: {
          backgroundColor: theme("colors.gray.700"),
          borderColor: "transparent",
          borderRadius: theme("borderRadius.lg"),
          boxShadow: theme("boxShadow.default"),
          color: theme("colors.white"),
          lineHeight: theme("lineHeight.snug"),
          // iconColor: theme('colors.white'),

          "&:focus": {
            backgroundColor: theme("colors.gray.600"),
            borderColor: "transparent",
            boxShadow: "none",
          },
        },

        checkbox: {
          width: theme("spacing.6"),
          height: theme("spacing.6"),
          backgroundColor: theme("colors.gray.900"),
          borderColor: "transparent",
          color: theme("colors.red.500"),

          "&:focus": {
            backgroundColor: theme("colors.gray.600"),
            borderColor: "transparent",
            boxShadow: "none",

            "&:checked": {
              backgroundColor: theme("colors.red.500"),
            },
          },
        },

        radio: {
          width: theme("spacing.6"),
          height: theme("spacing.6"),
          backgroundColor: theme("colors.gray.900"),
          borderColor: "transparent",
          color: theme("colors.red.500"),

          "&:focus": {
            backgroundColor: theme("colors.gray.600"),
            borderColor: "transparent",
            boxShadow: "none",

            "&:checked": {
              backgroundColor: theme("colors.red.500"),
            },
          },
        },
      },
    }),
    fontFamily: {
      poppins: ["Poppins", "sans-serif"],
    },
  },
  variants: {
    extend: {},
  },
  plugins: [require("@tailwindcss/custom-forms")],
};
