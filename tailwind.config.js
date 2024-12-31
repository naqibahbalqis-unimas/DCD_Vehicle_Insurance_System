module.exports = {
  content: ["./*.{html,php}", "./src/**/*.{html,php,js}"], // Files Tailwind should scan
  darkMode: "class", // Enable class-based dark mode
  theme: {
    screens: {
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1536px",
    },
    extend: {
      fontFamily: {
        autorich: ['"Autorich"', "sans-serif"],
        sans: ["Inter", "ui-sans-serif", "system-ui", "sans-serif"],
      },
      textOpacity: {
        43: "0.43",
      },
      colors: {
        dark: {
          background: "#081028",
          sidebar: "#081028",
          sidebarStroke: "#394D89",
          border: "#394D89",
          text: "#FFFFFF",
          textMuted: "rgba(255, 255, 255, 0.43)",
          accent: "#CB3CFF",
          cardBg: "#0B1739",
          cardStroke: "#343B4F",
          cardText: "#AEB9E1",
          sidebarHoverBg: "#0F1936",
          tableBlue: "#18254D",
        },
        light: {
          background: "#F9FAFB",
          sidebar: "#FFFFFF",
          border: "#E5E7EB",
          text: "#111827",
          textMuted: "rgba(17, 24, 39, 0.43)",
          accent: "#6D28D9",
          cardBg: "#FFFFFF",
          cardText: "#00000",
        },
      },
      fill: {
        "light-cardText": "#000000", // Define the light card text color
        "dark-cardText": "#AEB9E1", // Define the dark card text color
      },
      transitionTimingFunction: {
        "ease-in-out": "ease-in-out",
      },
      zIndex: {
        9999: "9999",
      },
    },
  },

  plugins: [],
};
