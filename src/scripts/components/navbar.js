// document.addEventListener("DOMContentLoaded", () => {
//   // Hamburger menu toggle (mobile)
//   const hamburger = document.getElementById("hamburger");
//   const smallNavWrapper = document.querySelector(".small-nav-wraper");

//   if (hamburger && smallNavWrapper) {
//     hamburger.addEventListener("click", () => {
//       hamburger.classList.toggle("active");
//       smallNavWrapper.classList.toggle("active");
//     });
//   }

//   // Submenu toggle
//   const menuItems = document.querySelectorAll(".menu-item-has-children");

//   menuItems.forEach((item) => {
//     const link = item.querySelector("a");

//     link.addEventListener("click", (e) => {
//       e.preventDefault(); 

//       const isActive = item.classList.contains("active");

//       // Close all other menus
//       menuItems.forEach((other) => {
//         if (other !== item) {
//           other.classList.remove("active");
//         }
//       });

//       // Toggle current menu
//       if (!isActive) {
//         item.classList.add("active");
//       } else {
//         item.classList.remove("active");
//       }
//     });
//   });
// });


document.addEventListener("DOMContentLoaded", () => {
  // Hamburger menu toggle (mobile)
  const hamburger = document.getElementById("hamburger");
  const smallNavWrapper = document.querySelector(".small-nav-wraper");

  if (hamburger && smallNavWrapper) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      smallNavWrapper.classList.toggle("active");
      // Disable body scroll when menu is active
      if (smallNavWrapper.classList.contains("active")) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "auto";
      }
      // Fade animation
      if (smallNavWrapper.classList.contains("active")) {
        smallNavWrapper.style.opacity = "1";
      } else {
        smallNavWrapper.style.opacity = "0";
      }
    });
  }

  // Submenu toggle
  const menuItems = document.querySelectorAll(".menu-item-has-children");

  menuItems.forEach((item) => {
    const link = item.querySelector("a");
    const submenu = item.querySelector(".sub-menu");
    const icon = item.querySelector("svg");

    link.addEventListener("click", (e) => {
      e.preventDefault();

      const isActive = item.classList.contains("active");

      // Close all other menus
      menuItems.forEach((other) => {
        if (other !== item) {
          other.classList.remove("active");
          other.querySelector(".sub-menu").style.maxHeight = null;
          const otherIcon = other.querySelector("svg");
          if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
        }
      });

      // Toggle current menu
      if (!isActive) {
        item.classList.add("active");
        submenu.style.maxHeight = submenu.scrollHeight + "px";

        // icon rotate + color change
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



