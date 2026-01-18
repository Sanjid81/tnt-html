




// document.addEventListener("DOMContentLoaded", () => {
//   const hamburger = document.getElementById("hamburger");
//   const smallNavWrapper = document.querySelector(".small-nav-wraper");
//   const navbar = document.querySelector(".navbar");

//   if (hamburger && smallNavWrapper && navbar) {
//     hamburger.addEventListener("click", () => {
//       hamburger.classList.toggle("active");
//       smallNavWrapper.classList.toggle("active");
//       navbar.classList.toggle("menu-open");

//       // Disable body scroll when menu is active
//       document.body.style.overflow = smallNavWrapper.classList.contains("active")
//         ? "hidden"
//         : "auto";
//     });
//   }

//   // Submenu toggle (same as before)
//   const menuItems = document.querySelectorAll(".menu-item-has-children");

//   menuItems.forEach((item) => {
//     const link = item.querySelector("a");
//     const submenu = item.querySelector(".sub-menu");
//     const icon = item.querySelector("svg");

//     link.addEventListener("click", (e) => {
//       e.preventDefault();

//       const isActive = item.classList.contains("active");

//       menuItems.forEach((other) => {
//         if (other !== item) {
//           other.classList.remove("active");
//           other.querySelector(".sub-menu").style.maxHeight = null;
//           const otherIcon = other.querySelector("svg");
//           if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
//         }
//       });

//       if (!isActive) {
//         item.classList.add("active");
//         submenu.style.maxHeight = submenu.scrollHeight + "px";

//         if (icon) {
//           icon.style.transform = "rotate(180deg)";
//           icon.style.stroke = "#FF6600";
//         }
//       } else {
//         item.classList.remove("active");
//         submenu.style.maxHeight = null;

//         if (icon) {
//           icon.style.transform = "rotate(0deg)";
//           icon.style.stroke = "#ffffff";
//         }
//       }
//     });
//   });
// });


function initNavbar() {
  const hamburger = document.getElementById("hamburger");
  const smallNavWrapper = document.querySelector(".small-nav-wraper");
  const navbar = document.querySelector(".navbar");

  // Check if elements exist before adding listeners
  if (!hamburger || !smallNavWrapper || !navbar) {
    console.error("Navbar elements not found - hamburger:", hamburger, "smallNav:", smallNavWrapper, "navbar:", navbar);
    return;
  }

  console.log("Navbar initialized successfully");

  // Hamburger toggle
  hamburger.addEventListener("click", (e) => {
    console.log("Hamburger clicked!", e);
    e.stopPropagation();
    
    hamburger.classList.toggle("active");
    smallNavWrapper.classList.toggle("active");
    navbar.classList.toggle("menu-open");

    document.body.style.overflow =
      smallNavWrapper.classList.contains("active") ? "hidden" : "auto";
  });

  // Mobile submenu accordion
  const menuItems = document.querySelectorAll(".menu-item-has-children");

  menuItems.forEach((item) => {
    const link = item.querySelector("a");
    const submenu = item.querySelector(".sub-menu");

    if (!submenu) return;

    link.addEventListener("click", (e) => {
      if (window.innerWidth > 800) return; // desktop untouched

      e.preventDefault();

      const isActive = item.classList.contains("active");

      menuItems.forEach((other) => {
        if (other !== item) {
          other.classList.remove("active");
          const otherSub = other.querySelector(".sub-menu");
          if (otherSub) otherSub.style.maxHeight = null;
        }
      });

      if (!isActive) {
        item.classList.add("active");
        submenu.style.maxHeight = submenu.scrollHeight + "px";
      } else {
        item.classList.remove("active");
        submenu.style.maxHeight = null;
      }
    });
  });
}

// Initialize on DOMContentLoaded
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initNavbar);
} else {
  initNavbar();
}
