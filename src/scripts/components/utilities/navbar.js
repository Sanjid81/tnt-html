

// document.addEventListener("DOMContentLoaded", () => {
//   // Hamburger menu toggle (mobile)
//   const hamburger = document.getElementById("hamburger");
//   const smallNavWrapper = document.querySelector(".small-nav-wraper");
//   const navbar = document.querySelector(".navbar");


//   if (hamburger && smallNavWrapper && navbar) {
//     hamburger.addEventListener("click", () => {
//       hamburger.classList.toggle("active");
//       smallNavWrapper.classList.toggle("active");
//       navbar.classList.toggle("menu-open");


//       // Disable body scroll when menu is active
//       document.body.style.overflow = smallNavWrapper.classList.contains("active") ? "hidden" : "auto";
//     });
//   }


//   // Submenu toggle
//   const menuItems = document.querySelectorAll(".menu-item-has-children");

//   menuItems.forEach((item) => {
//     const link = item.querySelector("a");
//     const submenu = item.querySelector(".sub-menu");
//     const icon = item.querySelector("svg");

//     link.addEventListener("click", (e) => {
//       e.preventDefault();

//       const isActive = item.classList.contains("active");

//       // Close all other menus
//       menuItems.forEach((other) => {
//         if (other !== item) {
//           other.classList.remove("active");
//           other.querySelector(".sub-menu").style.maxHeight = null;
//           const otherIcon = other.querySelector("svg");
//           if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
//         }
//       });

//       // Toggle current menu
//       if (!isActive) {
//         item.classList.add("active");
//         submenu.style.maxHeight = submenu.scrollHeight + "px";

//         // icon rotate + color change
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







document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.getElementById("hamburger");
  const smallNavWrapper = document.querySelector(".small-nav-wraper");
  const navbar = document.querySelector(".navbar");

  if (hamburger && smallNavWrapper && navbar) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      smallNavWrapper.classList.toggle("active");
      navbar.classList.toggle("menu-open");

      // Disable body scroll when menu is active
      document.body.style.overflow = smallNavWrapper.classList.contains("active")
        ? "hidden"
        : "auto";
    });
  }

  // Submenu toggle (same as before)
  const menuItems = document.querySelectorAll(".menu-item-has-children");

  menuItems.forEach((item) => {
    const link = item.querySelector("a");
    const submenu = item.querySelector(".sub-menu");
    const icon = item.querySelector("svg");

    link.addEventListener("click", (e) => {
      e.preventDefault();

      const isActive = item.classList.contains("active");

      menuItems.forEach((other) => {
        if (other !== item) {
          other.classList.remove("active");
          other.querySelector(".sub-menu").style.maxHeight = null;
          const otherIcon = other.querySelector("svg");
          if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
        }
      });

      if (!isActive) {
        item.classList.add("active");
        submenu.style.maxHeight = submenu.scrollHeight + "px";

        if (icon) {
          icon.style.transform = "rotate(180deg)";
          icon.style.stroke = "#FF6600";
        }
      } else {
        item.classList.remove("active");
        submenu.style.maxHeight = null;

        if (icon) {
          icon.style.transform = "rotate(0deg)";
          icon.style.stroke = "#ffffff";
        }
      }
    });
  });
});
