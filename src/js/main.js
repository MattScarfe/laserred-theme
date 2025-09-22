// Main JavaScript entry point
import "../css/style.css";

document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.querySelector("#mobile-menu-toggle");
  const mobileMenu = document.querySelector("#mobile-menu");
  const menuIcon = document.querySelector("#menu-icon");
  const closeIcon = document.querySelector("#close-icon");

  const searchButton = document.querySelector("#search-toggle");
  const searchOverlay = document.querySelector("#search-overlay");
  const searchInput = document.querySelector("#search-container");
  const searchCloseButton = document.querySelector("#search-close");

  const heroCTA = document.querySelector("#heroCTA");
  const heroCTAArrow = document.querySelector("#heroCTA-arrow");

  const headerCTA = document.querySelector("#headerCTA");
  const headerCTAArrow = document.querySelector("#headerCTA-arrow");

  // Toggle search input visibility
  if (searchButton && searchOverlay) {
    searchButton.addEventListener("click", () => {
      searchOverlay.classList.toggle("hidden");
      searchInput.classList.toggle("-translate-y-full");
      searchInput.classList.toggle("translate-y-0");
    });

    searchCloseButton.addEventListener("click", () => {
      searchOverlay.classList.add("hidden");
      searchInput.classList.toggle("translate-y-0");
      searchInput.classList.toggle("-translate-y-full");
    });
  }

  // Toggle mobile menu visibility

  if (menuButton && mobileMenu) {
    menuButton.addEventListener("click", () => {
      const isOpen = mobileMenu.classList.contains("hidden");

      // Toggle menu
      mobileMenu.classList.toggle("hidden");

      // Toggle icons
      menuIcon.classList.toggle("hidden", !isOpen);
      closeIcon.classList.toggle("hidden", isOpen);

      // Update aria-expanded
      menuButton.setAttribute("aria-expanded", String(isOpen));
    });
  }

  // Move hero CTA arrow on hover
  if (heroCTA && heroCTAArrow) {
    heroCTA.addEventListener("mouseenter", () => {
      heroCTAArrow.style.transform = "translateX(5px)";
      heroCTAArrow.style.transition = "transform 0.3s ease";
    });

    heroCTA.addEventListener("mouseleave", () => {
      heroCTAArrow.style.transform = "translateX(0)";
      heroCTAArrow.style.transition = "transform 0.3s ease";
    });
  }

    if (headerCTA && headerCTAArrow) {
    headerCTA.addEventListener("mouseenter", () => {
      headerCTAArrow.style.transform = "translateX(5px)";
      headerCTAArrow.style.transition = "transform 0.3s ease";
    });

    headerCTA.addEventListener("mouseleave", () => {
      headerCTAArrow.style.transform = "translateX(0)";
      headerCTAArrow.style.transition = "transform 0.3s ease";
    });
  }
});
