
// function initNavbar() {
//   const hamburger = document.getElementById("hamburger");
//   const smallNavWrapper = document.querySelector(".small-nav-wraper");
//   const navbar = document.querySelector(".navbar");

//   // Check if elements exist before adding listeners
//   if (!hamburger || !smallNavWrapper || !navbar) {
//     console.error("Navbar elements not found - hamburger:", hamburger, "smallNav:", smallNavWrapper, "navbar:", navbar);
//     return;
//   }

//   console.log("Navbar initialized successfully");

//   // Hamburger toggle
//   hamburger.addEventListener("click", (e) => {
//     console.log("Hamburger clicked!", e);
//     e.stopPropagation();
    
//     hamburger.classList.toggle("active");
//     smallNavWrapper.classList.toggle("active");
//     navbar.classList.toggle("menu-open");

//     document.body.style.overflow =
//       smallNavWrapper.classList.contains("active") ? "hidden" : "auto";
//   });

//   // Mobile submenu accordion
//   const menuItems = document.querySelectorAll(".menu-item-has-children");

//   menuItems.forEach((item) => {
//     const link = item.querySelector("a");
//     const submenu = item.querySelector(".sub-menu");

//     if (!submenu) return;

//     link.addEventListener("click", (e) => {
//       if (window.innerWidth > 800) return; // desktop untouched

//       e.preventDefault();

//       const isActive = item.classList.contains("active");

//       menuItems.forEach((other) => {
//         if (other !== item) {
//           other.classList.remove("active");
//           const otherSub = other.querySelector(".sub-menu");
//           if (otherSub) otherSub.style.maxHeight = null;
//         }
//       });

//       if (!isActive) {
//         item.classList.add("active");
//         submenu.style.maxHeight = submenu.scrollHeight + "px";
//       } else {
//         item.classList.remove("active");
//         submenu.style.maxHeight = null;
//       }
//     });
//   });
// }

// // Initialize on DOMContentLoaded
// if (document.readyState === "loading") {
//   document.addEventListener("DOMContentLoaded", initNavbar);
// } else {
//   initNavbar();
// }





function initNavbar() {
  const hamburger = document.getElementById("hamburger");
  const smallNavWrapper = document.querySelector(".small-nav-wraper");
  const navbar = document.querySelector(".navbar");

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
}

// Initialize
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initNavbar);
} else {
  initNavbar();
}