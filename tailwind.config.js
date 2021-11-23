// Where applicable, define theme style-settings in Wordpress's "theme.json",
// then reference it within tailwind so both can be defined by a common object.
const wpThemeOptions = require("./theme.json").settings;
// Translate WP theme.json options in terms that Tailwind can use - for our purposes,
function wpThemeOptsToTailwindThemeOpts(theme) {
  const colors = {};
  if (theme.color.palette) {
    const p = theme.color.palette;
    for (let i = 0; i < p.length; i++) {
      colors[p[i].slug] = p[i].color;
    }
  }
  return { colors };
}
const { colors } = wpThemeOptsToTailwindThemeOpts(wpThemeOptions);
console.log(colors);

module.exports = {
  purge: ["./**/*.html", "./**/*.php", "./*.php"],
  theme: {
    fontFamily: {
      sans: ["roboto", "sans-serif"],
    },
    extend: {
      colors: colors,
      fontSize: {
        xxs: "0.75rem",
        xs: "0.8125rem",
        sm: "0.9375rem",
        "2xl": "1.3125rem",
        "3xl": "1.625rem",
        "5xl": "2.625rem",
        "6xl": "3.5625rem",
      },
      maxWidth: {
        "max-w-screen-xl": "1352px",
      },
      gridColumn: {
        "span-16": "span 16 / span 16",
      },
      gridTemplateColumns: {
        // Simple 16 column grid
        16: "repeat(16, minmax(0, 1fr))",
      },
      gridColumnStart: {
        13: "13",
        14: "14",
        15: "15",
        16: "16",
        17: "17",
      },
      gridColumnEnd: {
        13: "13",
        14: "14",
        15: "15",
        16: "16",
        17: "17",
      },
      screens: {
        "md-lg": { max: "840px" },
      },
    },
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/line-clamp"),
    // ...
  ],
};
