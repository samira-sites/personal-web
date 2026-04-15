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


// =========================
// AJAX FORM (SAFE FIX)
// =========================
const form = document.getElementById("contactForm");
const msg = document.getElementById("responseMsg");

if (form) {
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    console.log("SUBMIT FIRED");

    const formData = new FormData(form);

    // Show loading state
    msg.innerText = "Sending...";
    msg.style.color = "white";
    msg.classList.add("show");

    try {
      const response = await fetch("contact.php", {
        method: "POST",
        body: formData
      });

      // IMPORTANT: handle server errors
      if (!response.ok) throw new Error("Server error");

      const data = await response.text();

      const isSuccess = data.toLowerCase().includes("success");

      msg.innerText = data;
      msg.style.color = isSuccess ? "orange" : "red";

      if (isSuccess) form.reset();

    } catch (err) {
      msg.innerText = "Something went wrong!";
      msg.style.color = "red";
    }

    // auto hide message
    setTimeout(() => {
      msg.classList.remove("show");
      msg.innerText = "";
    }, 3000);
  });
}