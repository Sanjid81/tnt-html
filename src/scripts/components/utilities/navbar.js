

function initNavbar() {
  const hamburger = document.getElementById("hamburger");
  const smallNavWrapper = document.querySelector(".small-nav-wraper");
  const navbar = document.querySelector(".navbar");

  const isMenuOpen = smallNavWrapper.classList.contains("active");

  // body scroll lock
  document.body.style.overflow = isMenuOpen ? "hidden" : "auto";

  // ✅ iOS safe body height control
  document.body.style.height = isMenuOpen ? "100vh" : "";



  
  // Safety check
  if (!hamburger || !smallNavWrapper || !navbar) {
    console.error("Navbar elements not found", {
      hamburger,
      smallNavWrapper,
      navbar
    });
    return;
  }

  console.log("Navbar initialized successfully");

  // ─── Hamburger toggle ────────────────────────────────────────
  hamburger.addEventListener("click", (e) => {
    e.stopPropagation();

    hamburger.classList.toggle("active");
    smallNavWrapper.classList.toggle("active");
    navbar.classList.toggle("menu-open");

    // Lock body scroll when menu is open
    document.body.style.overflow = smallNavWrapper.classList.contains("active")
      ? "hidden"
      : "auto";
  });

  // ─── Mobile submenu: separate link navigation vs arrow toggle ───
  const menuItems = document.querySelectorAll(".small-nav-wraper .menu-item-has-children");

  menuItems.forEach((item) => {
    const link = item.querySelector(":scope > a"); // direct child <a>
    const submenu = item.querySelector(".sub-menu");

    if (!link || !submenu) return;

    link.addEventListener("click", (e) => {
      // Only apply special logic on mobile
      if (window.innerWidth > 800) return;

      // Detect if click happened in the right ~arrow area
      const rect = link.getBoundingClientRect();
      const clickX = e.clientX - rect.left;
      const arrowZoneWidth = 60; // pixels from right edge – adjust if needed

      const clickedOnArrowArea = clickX >= (rect.width - arrowZoneWidth);

      if (clickedOnArrowArea) {
        // ── Click on arrow → toggle submenu, prevent navigation ──
        e.preventDefault();
        e.stopPropagation();

        const isCurrentlyOpen = item.classList.contains("active");

        // Close all other submenus
        menuItems.forEach((otherItem) => {
          if (otherItem !== item) {
            otherItem.classList.remove("active");
            const otherSub = otherItem.querySelector(".sub-menu");
            if (otherSub) otherSub.style.maxHeight = null;
          }
        });

        // Toggle current item
        if (isCurrentlyOpen) {
          item.classList.remove("active");
          submenu.style.maxHeight = null;
        } else {
          item.classList.add("active");
          submenu.style.maxHeight = submenu.scrollHeight + "px";
        }
      }

      // If click was NOT in arrow area → normal navigation happens
      // (we didn't call preventDefault → link href works)
    });

    // Optional: when submenu finishes opening/closing animation
    submenu.addEventListener("transitionend", () => {
      if (!item.classList.contains("active")) {
        submenu.style.maxHeight = null; // clean up
      }
    });
  });

  // Optional: close mobile menu when clicking outside (improves UX)
  document.addEventListener("click", (e) => {
    if (
      window.innerWidth <= 800 &&
      smallNavWrapper.classList.contains("active") &&
      !smallNavWrapper.contains(e.target) &&
      !hamburger.contains(e.target)
    ) {
      hamburger.classList.remove("active");
      smallNavWrapper.classList.remove("active");
      navbar.classList.remove("menu-open");
      document.body.style.overflow = "auto";
    }
  });




  // ─── Show navbar initially + on scroll up ─────────────────────
  let lastScrollY = window.scrollY;

  //  SHOW navbar on page load
  navbar.classList.add("show-navbar");

  window.addEventListener("scroll", () => {
    const currentScrollY = window.scrollY;

    // if menu open, don't hide navbar
    if (navbar.classList.contains("menu-open")) return;

    // Always show at top
    if (currentScrollY <= 10) {
      navbar.classList.add("show-navbar");
    }
    // Scroll UP → show
    else if (currentScrollY < lastScrollY) {
      navbar.classList.add("show-navbar");
    }
    // Scroll DOWN → hide
    else {
      navbar.classList.remove("show-navbar");
    }

    lastScrollY = currentScrollY;
  });

}

// Initialize
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initNavbar);
} else {
  initNavbar();
}


