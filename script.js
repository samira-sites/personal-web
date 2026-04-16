console.log("JS FILE LOADED");

const burger = document.getElementById("burger");
const mobileNav = document.getElementById("mobileNav");
const overlay = document.getElementById("overlay");

burger.addEventListener("click", () => {
  const isOpen = mobileNav.classList.contains("active");

  burger.classList.toggle("active");
  mobileNav.classList.toggle("active");
  overlay.classList.toggle("active");

  if (!isOpen) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
});

// Close when clicking overlay
overlay.addEventListener("click", () => {
  burger.classList.remove("active");
  mobileNav.classList.remove("active");
  overlay.classList.remove("active");
  document.body.style.overflow = "";
});

// Close when clicking links
document.querySelectorAll(".mobile-nav a").forEach(link => {
  link.addEventListener("click", () => {
    burger.classList.remove("active");
    mobileNav.classList.remove("active");
    overlay.classList.remove("active");
    document.body.style.overflow = "";
  });
});


// =========================
// SCROLL REVEAL (INTERSECTION OBSERVER)
// =========================
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("active");
    }
  });
}, { threshold: 0.15 });

document.querySelectorAll(".reveal").forEach(el => observer.observe(el));


// =========================
// EXTRA SCROLL ANIMATIONS
// =========================
function revealOnScroll() {
  const elements = document.querySelectorAll(
    ".reveal-bounce, .reveal-about, .reveal-left, .reveal-right"
  );

  elements.forEach((el) => {
    const windowHeight = window.innerHeight;
    const elementTop = el.getBoundingClientRect().top;

    if (elementTop < windowHeight - 100) {
      el.classList.add("active");
    }
  });
}

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", revealOnScroll);


// ---------- GET FORM AND MESSAGE ELEMENT ----------
const form = document.getElementById("contactForm");
const msg = document.getElementById("responseMsg");

// ---------- FORM SUBMIT EVENT LISTENER ----------
form.addEventListener("submit", async function(e) {
  e.preventDefault(); // prevent default page reload (AJAX behavior)

  // Collect form data to send to server
  const formData = new FormData(this);

  // ---------- SHOW "SENDING..." MESSAGE ----------
  msg.innerText = "Sending...";
  msg.style.color = "blue";
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
    msg.style.color = data.includes("successfully") ? "green" : "red";
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