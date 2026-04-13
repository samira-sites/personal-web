// Close mobile menu when clicking a nav link (basic close)
document.querySelectorAll(".nav a").forEach(link => {
  link.addEventListener("click", () => {
    nav.classList.remove("active"); // hide nav menu
  });
});


// OPEN MODAL
function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) modal.style.display = "flex"; // show modal
}

// CLOSE MODAL
function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) modal.style.display = "none"; // hide modal
}


// CLOSE MODAL WHEN CLICKING OUTSIDE
window.addEventListener("click", (e) => {
  document.querySelectorAll(".modal").forEach(modal => {
    if (e.target === modal) modal.style.display = "none"; // click outside = close
  });
});


// NAV + BURGER + OVERLAY ELEMENTS
const burger = document.getElementById("burger");
const nav = document.getElementById("navMenu");
const overlay = document.querySelector(".overlay");


// TOGGLE MENU + OVERLAY + BURGER ANIMATION
burger.addEventListener("click", () => {
  burger.classList.toggle("active"); // animate burger → X
  nav.classList.toggle("active");    // show/hide mobile menu
  overlay.classList.toggle("active"); // show/hide blur overlay
});


// CLOSE MENU WHEN CLICKING OVERLAY (IMPORTANT UX)
overlay.addEventListener("click", () => {
  burger.classList.remove("active"); // reset burger
  nav.classList.remove("active");    // hide menu
  overlay.classList.remove("active"); // remove blur
});


// CLOSE MENU + REMOVE OVERLAY WHEN CLICKING NAV LINK (VERY IMPORTANT FIX)
document.querySelectorAll(".nav a").forEach(link => {
  link.addEventListener("click", () => {
    nav.classList.remove("active");     // hide menu
    burger.classList.remove("active");  // reset burger icon
    overlay.classList.remove("active"); // remove blur overlay ✅
  });
});


// SCROLL REVEAL ANIMATION (INTERSECTION OBSERVER)
const elements = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("active"); // animate element when visible
    }
  });
}, {
  threshold: 0.15 // trigger when 15% visible
});

// APPLY REVEAL TO ALL ELEMENTS
elements.forEach(el => observer.observe(el));


// ajax
const form = document.getElementById("contactForm");
const msg = document.getElementById("responseMsg");

// ---------- FORM SUBMIT EVENT LISTENER ----------
form.addEventListener("submit", async function(e) {
  e.preventDefault(); // prevent default page reload (AJAX behavior)

  // Collect form data to send to server
  const formData = new FormData(this);

  // ---------- SHOW "SENDING..." MESSAGE ----------
  msg.innerText = "Sending...";
  msg.style.color = "white";
  msg.classList.add("show"); // add slide-in animation

  try {
    // ---------- AJAX REQUEST USING FETCH ----------
    // Sends form data asynchronously to the PHP script
    const response = await fetch("contact.php", {
      method: "POST",
      body: formData
    });

    // Get server response as text
    const data = await response.text();

    // ---------- DISPLAY SERVER RESPONSE ----------
    msg.innerText = data; // show message inside the form
    // Green if success, red if error
    msg.style.color = data.includes("successfully") ? "orange" : "red";
    msg.classList.add("show"); // slide-in effect

    // Clear form if submission successful
    if (data.includes("successfully")) form.reset();

    // ---------- AUTO-HIDE MESSAGE AFTER TIMEOUT ----------
    setTimeout(() => {
      msg.classList.remove("show"); // hide slide animation
      msg.innerText = "";           // clear text
    }, 3000); // 3000ms = 3 seconds

  } catch (err) {
    // ---------- HANDLE NETWORK/SERVER ERROR ----------
    msg.innerText = "Something went wrong!";
    msg.style.color = "red";
    msg.classList.add("show");

    // Auto-hide error message after 3 seconds
    setTimeout(() => {
      msg.classList.remove("show");
      msg.innerText = "";
    }, 3000);
  }
});

/*============bounch-animation================*/

function revealImage() {
  const elements = document.querySelectorAll(".reveal-img");

  elements.forEach((el) => {
    const windowHeight = window.innerHeight;
    const elementTop = el.getBoundingClientRect().top;

    if (elementTop < windowHeight - 100) {
      el.classList.add("active");
    }
  });
}

// run on scroll
window.addEventListener("scroll", revealImage);

// run on page load
window.addEventListener("load", revealImage);

/*============slide from left animation================*/

function revealAbout() {
  const elements = document.querySelectorAll(".reveal-about");

  elements.forEach((el) => {
    const windowHeight = window.innerHeight;
    const elementTop = el.getBoundingClientRect().top;

    if (elementTop < windowHeight - 100) {
      el.classList.add("active");
    }
  });
}

window.addEventListener("scroll", revealAbout);
window.addEventListener("load", revealAbout);