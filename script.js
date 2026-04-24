console.log("JS FILE LOADED");
console.log("mobile links:", document.querySelectorAll(".mobile-nav a"));

// day/night toggle
const toggles = document.querySelectorAll(".themeToggle");

function setTheme(isLight) {
  document.documentElement.classList.toggle("light", isLight);
  localStorage.setItem("theme", isLight ? "light" : "dark");

  toggles.forEach(t => t.checked = isLight);
}

// load saved theme
const saved = localStorage.getItem("theme");
const isLight = saved === "light";
setTheme(isLight);

// sync all toggles
toggles.forEach(toggle => {
  toggle.addEventListener("change", (e) => {
    setTheme(e.target.checked);
  });
});
  
// burger
const burger = document.getElementById("burger");
const headerContainer = document.querySelector(".header-container");
const overlay = document.getElementById("overlay");
const mobileLinks = document.querySelectorAll(".mobile-nav a");

// close menu
function closeMenu() {
  burger.classList.remove("active");
  headerContainer.classList.remove("active");
  overlay.classList.remove("active");
  document.body.style.overflow = "";
}

// toggle menu
function toggleMenu() {
  const isOpen = headerContainer.classList.contains("active");

  if (isOpen) closeMenu();
  else {
    burger.classList.add("active");
    headerContainer.classList.add("active");
    overlay.classList.add("active");
    document.body.style.overflow = "hidden";
  }
}

burger.addEventListener("click", toggleMenu);
overlay.addEventListener("click", closeMenu);

mobileLinks.forEach(link => {
  link.addEventListener("click", (e) => {
    e.preventDefault();

    const id = link.getAttribute("href");
    const target = document.querySelector(id);
    if (!target) return;

    closeMenu();

    requestAnimationFrame(() => {
      const headerOffset = 25;

      const offsetTop =
        target.getBoundingClientRect().top +
        window.pageYOffset -
        headerOffset;

      window.scrollTo({
        top: offsetTop
      });
    });
  });
});

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
// CONTACT FORM
// =========================
const form = document.getElementById("contactForm");
const msg = document.getElementById("responseMsg");

if (form && msg) {
  const btn = form.querySelector("button");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    console.log("Sending form...");
    console.log([...formData.entries()]);

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