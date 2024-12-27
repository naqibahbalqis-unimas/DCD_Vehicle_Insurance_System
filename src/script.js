function toggleDarkMode() {
  const htmlElement = document.documentElement;

  // Create the overlay element for fade animation
  const overlay = document.createElement("div");
  overlay.className = `
        fixed inset-0 bg-black opacity-0 transition-opacity duration-500 z-[9999]
      `;
  document.body.appendChild(overlay);

  // Trigger fade-in
  setTimeout(() => {
    overlay.classList.add("opacity-100");
  }, 10);

  // Switch mode after fade-in is complete
  setTimeout(() => {
    // Toggle the dark mode class
    htmlElement.classList.toggle("dark");

    // Save the user's preference in localStorage
    if (htmlElement.classList.contains("dark")) {
      localStorage.setItem("theme", "dark");
    } else {
      localStorage.setItem("theme", "light");
    }

    // Fade out the overlay
    overlay.classList.remove("opacity-100");
  }, 500);

  // Remove overlay after fade-out completes
  setTimeout(() => {
    document.body.removeChild(overlay);
  }, 1000);

  // Update the icons
  const lightModeIcon = document.getElementById("light-mode-icon");
  const darkModeIcon = document.getElementById("dark-mode-icon");

  if (htmlElement.classList.contains("dark")) {
    lightModeIcon.classList.add("hidden");
    darkModeIcon.classList.remove("hidden");
  } else {
    lightModeIcon.classList.remove("hidden");
    darkModeIcon.classList.add("hidden");
  }

  console.log("Current theme:", localStorage.getItem("theme"));
  console.log(
    "Dark class present:",
    document.documentElement.classList.contains("dark")
  );
}

console.log("Initial theme:", localStorage.getItem("theme"));
function initializeDarkMode() {
  const htmlElement = document.documentElement;

  // Check the saved theme in localStorage
  const storedTheme = localStorage.getItem("theme");

  if (storedTheme === "dark") {
    htmlElement.classList.add("dark");
  } else if (storedTheme === "light") {
    htmlElement.classList.remove("dark");
  } else if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
    // Use system preference if no user preference is saved
    htmlElement.classList.add("dark");
    localStorage.setItem("theme", "dark"); // Save system preference
  } else {
    htmlElement.classList.remove("dark");
    localStorage.setItem("theme", "light"); // Save system preference
  }

  // Set correct icons on page load
  const lightModeIcon = document.getElementById("light-mode-icon");
  const darkModeIcon = document.getElementById("dark-mode-icon");

  if (htmlElement.classList.contains("dark")) {
    lightModeIcon.classList.add("hidden");
    darkModeIcon.classList.remove("hidden");
  } else {
    lightModeIcon.classList.remove("hidden");
    darkModeIcon.classList.add("hidden");
  }
}

function toggleMenu(index) {
  const subMenu = document.getElementById(`submenu-${index}`);
  const chevron = document.getElementById(`chevron-${index}`);
  if (subMenu) {
    subMenu.classList.toggle("max-h-0");
    subMenu.classList.toggle("max-h-screen");
    chevron.classList.toggle("rotate-180");
  }
}

function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("mobile-menu-overlay");

  if (!sidebar || !overlay) return;

  sidebar.classList.toggle("open");
  overlay.classList.toggle("show");

  if (sidebar.classList.contains("open")) {
    document.body.style.overflow = "hidden"; // Prevent scrolling when sidebar is open
  } else {
    document.body.style.overflow = ""; // Allow scrolling when sidebar is closed
  }
}

// Close sidebar when resizing to desktop
window.addEventListener("resize", () => {
  if (window.innerWidth > 768) {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("mobile-menu-overlay");

    sidebar.classList.remove("open");
    overlay.classList.remove("show");
    document.body.style.overflow = "";
  }
});

// Initialize dark mode on page load
document.addEventListener("DOMContentLoaded", initializeDarkMode);
