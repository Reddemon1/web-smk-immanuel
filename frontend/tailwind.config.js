module.exports = {
  content: ["./src/components/**/*.{js,vue,ts}", "./src/views/**/*.vue", "./src/**/*.vue"],
  theme: {
    extend: {
      colors: {
        primary: {
          blue: "#00A0E3",
          red: "#FE6961",
          yellow: "#FEC953",
          "light-blue": "#72BFF5",
        },
        state: {
          red: "#FF3B3B",
          yellow: "#FFCC00",
          blue: "#0063F7",
          green: "#06C270",
        },
        dark: {
          25: "#C7C9D9",
          50: "#8F90A6",
          75: "#6B7588",
          100: "#3A3A3C",
        },
        light: {
          25: "#DDE5E9",
          50: "#EBEBF0",
          75: "#F2F2F5",
          100: "#FAFAFC",
        },
      },
      fontSize: {
        sm: ["0.8rem", { lineHeight: "1.4rem" }], // caption
        base: ["1rem", { lineHeight: "1.75rem" }], // body
        md: ["1.25rem", { lineHeight: "2.1875rem" }], // subline
        lg: ["1.563rem", { lineHeight: "2.0312rem" }], // h7
        xl: ["1.953rem", { lineHeight: "2.53rem" }], // h6
        "2xl": ["2.44rem", { lineHeight: "3.1rem" }], // h5
        "3xl": ["3.052rem", { lineHeight: "3.9rem" }], // h4
        "4xl": ["3.815rem", { lineHeight: "4.9625rem" }], // h3
        "5xl": ["4.768rem", { lineHeight: "6.2rem" }], // h2
        "6xl": ["5.96rem", { lineHeight: "7.75rem" }], // h1
      },
    },
  },
  plugins: [],
};