document.addEventListener("DOMContentLoaded", () => {
  // Hamburger menu toggle (mobile)
  const hamburger = document.getElementById("hamburger");
  const smallNavWrapper = document.querySelector(".small-nav-wraper");

  if (hamburger && smallNavWrapper) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      smallNavWrapper.classList.toggle("active");
    });
  }

  // Submenu toggle
  const menuItems = document.querySelectorAll(".menu-item-has-children");

  menuItems.forEach((item) => {
    const link = item.querySelector("a");

    link.addEventListener("click", (e) => {
      e.preventDefault(); 

      const isActive = item.classList.contains("active");

      // Close all other menus
      menuItems.forEach((other) => {
        if (other !== item) {
          other.classList.remove("active");
        }
      });

      // Toggle current menu
      if (!isActive) {
        item.classList.add("active");
      } else {
        item.classList.remove("active");
      }
    });
  });
});



// document.addEventListener("DOMContentLoaded", () => {
//   const hamburger = document.getElementById("hamburger");
//   const smallNavWrapper = document.querySelector(".small-nav-wraper");

//   // Hamburger menu smooth toggle
//   if (hamburger && smallNavWrapper) {
//     // Set initial style for smooth transition
//     smallNavWrapper.style.overflow = "hidden";
//     smallNavWrapper.style.maxHeight = "0px";
//     smallNavWrapper.style.transition = "max-height 0.4s ease";

//     hamburger.addEventListener("click", () => {
//       hamburger.classList.toggle("active");

//       if (smallNavWrapper.classList.contains("active")) {
//         smallNavWrapper.classList.remove("active");
//         smallNavWrapper.style.maxHeight = "0px";
//       } else {
//         smallNavWrapper.classList.add("active");
//         smallNavWrapper.style.maxHeight = smallNavWrapper.scrollHeight + "px"; // dynamic height
//       }
//     });
//   }

//   // Submenu toggle
//   const menuItems = document.querySelectorAll(".menu-item-has-children");

//   menuItems.forEach((item) => {
//     const link = item.querySelector("a");
//     const submenu = item.querySelector(".sub-menu");

//     if (submenu) {
//       submenu.style.overflow = "hidden";
//       submenu.style.maxHeight = "0px";
//       submenu.style.transition = "max-height 0.3s ease";
//     }

//     link.addEventListener("click", (e) => {
//       e.preventDefault();

//       const isActive = item.classList.contains("active");

//       menuItems.forEach((other) => {
//         if (other !== item) {
//           other.classList.remove("active");
//           const otherSub = other.querySelector(".sub-menu");
//           if (otherSub) otherSub.style.maxHeight = "0px";
//         }
//       });

//       if (!isActive) {
//         item.classList.add("active");
//         if (submenu) submenu.style.maxHeight = submenu.scrollHeight + "px";
//       } else {
//         item.classList.remove("active");
//         if (submenu) submenu.style.maxHeight = "0px";
//       }
//     });
//   });
// });
