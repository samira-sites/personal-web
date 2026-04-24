console.log("JS FILE LOADED");

// =========================
// BURGER MENU
// =========================
const burger = document.getElementById("burger");
const mobileNav = document.getElementById("mobileNav");
const overlay = document.getElementById("overlay");

if (burger && mobileNav && overlay) {
  burger.addEventListener("click", () => {
    const isOpen = mobileNav.classList.contains("active");

    burger.classList.toggle("active");
    mobileNav.classList.toggle("active");
    overlay.classList.toggle("active");

    document.body.style.overflow = isOpen ? "" : "hidden";
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
}


// =========================
// SCROLL REVEAL
// =========================
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("active");
    }
  });
}, { threshold: 0.15 });

document.querySelectorAll(".reveal, .reveal-left, .reveal-right")
  .forEach(el => observer.observe(el));


// =========================
// CONTACT FORM (FIXED + IMPROVED)
// =========================
const form = document.getElementById("contactForm");
const msg = document.getElementById("responseMsg");

if (form && msg) {
  const btn = form.querySelector("button");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Debug (safe now)
    console.log("Sending form...");
    console.log([...formData.entries()]);

    // UI feedback
    msg.innerText = "Sending...";
    msg.style.color = "blue";
    msg.classList.add("show");

    btn.disabled = true;
    btn.innerText = "Sending...";

    try {
      const response = await fetch("./contact.php", {
        method: "POST",
        body: formData
      });

      if (!response.ok) throw new Error("Server error");

      const data = await response.text();

      msg.innerText = data;
      msg.style.color = data.toLowerCase().includes("success") ? "green" : "red";

      if (data.toLowerCase().includes("success")) {
        form.reset();
      }

    } catch (err) {
      console.error(err);
      msg.innerText = "Server error. Try again.";
      msg.style.color = "red";
    } finally {
      btn.disabled = false;
      btn.innerText = "Send Message";
    }
  });
}