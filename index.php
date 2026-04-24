<!DOCTYPE html>
<html lang="en">

<script>
  (function () {
    if (localStorage.getItem("theme") === "light") {
      document.documentElement.classList.add("light");
    }
  })();
</script>
<!-- Basic Meta -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>PORTFOLIO</title>
<meta name="description" content="Turn your idea into a live website">

<!-- SEO -->
<meta name="author" content="Samira Omar">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://portfolio.samiraomar.com">

<!-- Structured Data -->
<script type="application/ld+json">
{
 "@context": "https://schema.org",
 "@type": "Person",
 "name": "Samira Omar",
 "url": "https://portfolio.samiraomar.com/",
 "jobTitle": "Website Developer",
 "image": "https://portfolio.samiraomar.com/photo/me.webp",
 "logo": "https://portfolio.samiraomar.com/icons/sam-180.webp",
 "sameAs": [
   "https://www.linkedin.com/in/samira-omar/"
 ]
}
</script>

<!-- Open Graph -->
<meta property="og:title" content="SAM PORTFOLIO">
<meta property="og:description"
  content="Building modern, responsive websites with clean design and great user experience.">
<meta property="og:site_name" content="Samira Omar">
<meta property="og:url" content="https://portfolio.samiraomar.com">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">

<meta property="og:image" content="https://portfolio.samiraomar.com/photo/portfolio-preview.webp">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Preview of Samira Omar's modern website developer portfolio homepage">


<!-- Theme -->
<meta name="theme-color" content="#fe9c0a">

<!-- Icons / Favicons -->
<link rel="icon" href="/favicon.ico">
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/icons/sam-32.png">
<link rel="apple-touch-icon" sizes="180x180" href="/icons/sam-180.png">

<!-- PWA -->
<link rel="manifest" href="manifest.json">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">

<!-- CSS -->
<link rel="stylesheet" href="style.css">
<link rel="preload" as="image" href="photo/hero-profile.webp">
</head>

<body>
  <header class="header">
    <div class="header-container">

      <a href="#" class="logo"><Span style="color: #fe9c0a;">S</Span>AM</a>

      <!-- Desktop Nav -->
      <nav class="nav desktop-nav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#projects">Projects</a>
        <a href="#contact" class="contact-nav">Contact</a>

        <!-- Desktop -->
        <label class="theme-switch desktop">
          <input type="checkbox" class="themeToggle">
          <span class="slider">
            <span class="icon moon">🌙</span>
            <span class="icon sun">☀️</span>
          </span>
        </label>

      </nav>

      <!-- Burger -->
      <div id="burger" class="burger">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- ✅ Mobile Nav INSIDE container -->
      <nav class="mobile-nav" id="mobileNav">
        <a href="#home" class="mobile-menu">Home</a>
        <a href="#about" class="mobile-menu">About</a>
        <a href="#projects" class="mobile-menu">Projects</a>
        <a href="#contact" class="mobile-menu contact-nav">Contact</a>

        <!-- Mobile -->
        <label class="theme-switch mobile">
          <input type="checkbox" class="themeToggle">
          <span class="slider">
            <span class="icon moon">🌙</span>
            <span class="icon sun">☀️</span>
          </span>
        </label>

      </nav>

    </div>

    <!-- ✅ overlay OUTSIDE -->
    <div class="overlay" id="overlay"></div>
  </header>

  <!-- HERO -->
  <section class="hero" id="home">
    <div class="hero-box">
      <div class="hero-img reveal-left">
        <img src="photo/hero-profile.webp" alt="Sam Profile" loading="eager" fetchpriority="high">
      </div>

      <div class="hero-text reveal">
        <p class="badge reveal" style="margin: 1rem 0;">Website Developer</p>

        <h1 class="reveal">Hi, I'm <span class="typing-text reveal">Sam</span></h1>

        <p class="subtitle reveal">Crafting modern, responsive websites with a focus on simplicity, clarity, and user
          experience.
        </p>

        <div class="buttons">
          <a href="#projects" class="btn reveal">View Work</a>
          <a href="#contact" class="btn-outline reveal">Contact Me</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about" class="about">
    <h2 class="reveal-right">About SAM</h2>
    <div class="about-box">

      <div class="about-text-box">
        <p class="about-text reveal">
          I build modern websites that work smoothly on any device. I focus on clean design, speed, and making them easy
          to use—so every website feels simple, fast, and enjoyable.
        </p>

        <div class="socials about-socials">

          <a href="https://github.com/samira-sites/" target="_blank" class="icon-btn reveal-left" aria-label="GitHub">
            <svg viewBox="0 0 24 24">
              <path
                d="M12 .5C5.7.5.5 5.7.5 12c0 5 3.2 9.3 7.7 10.8.6.1.8-.3.8-.6v-2.2c-3.1.7-3.8-1.3-3.8-1.3-.5-1.2-1.2-1.5-1.2-1.5-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 .1.8 2.2 3.3 1.5.1-.7.4-1.2.7-1.5-2.5-.3-5.1-1.3-5.1-5.7 0-1.3.5-2.4 1.1-3.2-.1-.3-.5-1.5.1-3.1 0 0 .9-.3 3.2 1.2.9-.3 1.9-.4 2.9-.4s2 .1 2.9.4c2.3-1.5 3.2-1.2 3.2-1.2.6 1.6.2 2.8.1 3.1.7.8 1.1 1.9 1.1 3.2 0 4.4-2.6 5.4-5.1 5.7.4.3.8 1 .8 2v3c0 .3.2.7.8.6 4.5-1.5 7.7-5.8 7.7-10.8C23.5 5.7 18.3.5 12 .5z" />
            </svg>
          </a>

          <a href="https://www.linkedin.com/in/samira-omar/" target="_blank" class="icon-btn reveal-left"
            aria-label="LinkedIn">
            <svg viewBox="0 0 24 24">
              <path
                d="M20.4 20.4h-3.6v-5.6c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9v5.7H9.3V9h3.4v1.6h.1c.5-1 1.8-2.1 3.7-2.1 4 0 4.7 2.6 4.7 6v5.9zM5.3 7.4a2.1 2.1 0 1 1 0-4.2 2.1 2.1 0 0 1 0 4.2zM7.1 20.4H3.6V9h3.5v11.4z" />
            </svg>
          </a>

          <a href="mailto:hello@samiraomar.com" class="icon-btn reveal-left" aria-label="Email">
            <svg viewBox="0 0 24 24">
              <path
                d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5L4 8V6l8 5 8-5v2z" />
            </svg>
          </a>

        </div>
      </div>


      <div class="about-img reveal-right">
        <img src="photo/aboutme.webp" alt="About Profile">


      </div>


    </div>

    <div class="about-grid">
      <div class="card reveal">
        <h3>Skills</h3>
        <ul class="skills-li">
          <li>HTML5</li>
          <li>CSS</li>
          <li>JavaScript</li>
          <li>PHP</li>
          <li>Git</li>
          <li>GitHub</li>
          <li> cPanel</li>
        </ul>

      </div>
      <div class="card reveal">
        <h3>My Journey</h3>
        <ul>
          <li>💻 Built real-world web projects <span class="year-badge">2025–Present</span></li>
          <li>🎓 Level 4 Diploma in Information Technology <span class="year-badge">2024–2026</span></li>
          <li>🎓 Certificate in Computer Secretarial <span class="year-badge">2023</span></li>
          <li>👩‍💼 Domestic Helper in Kuwait <span class="year-badge">2017–2026</span></li>
        </ul>
      </div>

    </div>

  </section>

  <!------PROJECTS -->
  <section class="section" id="projects">
    <h2 class="section-title reveal-right">My Projects</h2>

    <div class="projects-grid reveal">
      <div class="project-card reveal">
        <img src="photo/project1.webp" alt="Business Website">

        <div class="project-info reveal">
          <h3>Business Website</h3>
          <p>Business website with integrated booking and lead capture system to improve client flow and conversions.
          </p>

          <div class="actions">
            <a href="https://samiraomar.com" target="_blank">View Live ↗</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal">
        <img src="photo/project2.webp" alt="Contact System">

        <div class="project-info reveal">
          <h3>Nail Salon Website (Demo)</h3>
          <p>Modern responsive salon website with online booking, lead generation, and interactive map for easy client
            navigation.</p>
          <div class="actions">
            <a href="https://salon.samiraomar.com" target="_blank">View Live ↗</a>

          </div>
        </div>
      </div>

      <div class="project-card reveal">
        <img src="photo/project3.webp" alt="Login System">

        <div class="project-info reveal">
          <h3>Login System</h3>
          <p>Authentication system with PHP & MySQL</p>

          <div class="actions">
            <a href="#" onclick="alert('Coming soon')">View Live ↗</a>

          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- CONTACT -->
  <section class="section" id="contact">
    <h2 class="section-title reveal-right">Contact Me</h2>

    <div class="contact-container reveal">

      <!-- LEFT -->
      <div class="contact-info glass reveal">

        <div class="status-badge">
          <span></span>
          Available for work
        </div>

        <h3>Let’s build something great</h3>
        <p>I’m open to freelance projects and collaborations in web development. I specialize in frontend development
          and PHP with cPanel hosting.</p>

        <div class="contact-details">

          <div class="detail">
            <i data-lucide="mail"></i>
            <div>
              <span>Email</span>
              <a href="mailto:hello@samiraomar.com">hello@samiraomar.com</a>
            </div>
          </div>

          <div class="detail">
            <i data-lucide="map-pin"></i>
            <div>
              <span>Location</span>
              <p>Kuwait</p>
            </div>
          </div>
        </div>

        <div class="contact-actions">
          <a href="/cv.pdf" target="_blank" class="btn-outline reveal-left">
            <i data-lucide="download"></i> Download CV
          </a>

          <a href="https://wa.me/96567077369" target="_blank" class="whatsapp-right reveal-left"
            aria-label="Chat on WhatsApp">
            <img src="photo/whatsapp2.svg" alt="WhatsApp">
          </a>
        </div>
      </div>

      <!-- RIGHT -->
      <form method="POST" class="contact-form glass reveal" id="contactForm">

        <!-- 🛡️ Anti-spam hidden field (DO NOT REMOVE) -->
        <input type="text" name="website" style="display:none">

        <div class="input-group">
          <input type="text" name="name" required>
          <label>Your Name</label>
        </div>

        <div class="input-group">
          <input type="email" name="email" required>
          <label>Your Email</label>
        </div>

        <div class="input-group textarea">
          <textarea name="message" required></textarea>
          <label>Your Message</label>
        </div>

        <button class="btn">Send Message</button>
        <span id="responseMsg"></span>
      </form>

    </div>
  </section>

  <script src="script.js"></script>

  <footer class="footer">

    <div class="footer-container">

      <!-- BRAND -->
      <div class="footer-brand">
        <h3>Samira Omar</h3>
        <p>
          Website Developer focused on creating clean, modern, and user-friendly digital experiences.
        </p>
      </div>

      <!-- SOCIALS -->
      <div class="socials">

        <a href="https://github.com/samira-sites/" target="_blank" class="icon-btn" aria-label="GitHub">
          <svg viewBox="0 0 24 24">
            <path
              d="M12 .5C5.7.5.5 5.7.5 12c0 5 3.2 9.3 7.7 10.8.6.1.8-.3.8-.6v-2.2c-3.1.7-3.8-1.3-3.8-1.3-.5-1.2-1.2-1.5-1.2-1.5-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 .1.8 2.2 3.3 1.5.1-.7.4-1.2.7-1.5-2.5-.3-5.1-1.3-5.1-5.7 0-1.3.5-2.4 1.1-3.2-.1-.3-.5-1.5.1-3.1 0 0 .9-.3 3.2 1.2.9-.3 1.9-.4 2.9-.4s2 .1 2.9.4c2.3-1.5 3.2-1.2 3.2-1.2.6 1.6.2 2.8.1 3.1.7.8 1.1 1.9 1.1 3.2 0 4.4-2.6 5.4-5.1 5.7.4.3.8 1 .8 2v3c0 .3.2.7.8.6 4.5-1.5 7.7-5.8 7.7-10.8C23.5 5.7 18.3.5 12 .5z" />
          </svg>
        </a>

        <a href="https://www.linkedin.com/in/samira-omar/" target="_blank" class="icon-btn" aria-label="LinkedIn">
          <svg viewBox="0 0 24 24">
            <path
              d="M20.4 20.4h-3.6v-5.6c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9v5.7H9.3V9h3.4v1.6h.1c.5-1 1.8-2.1 3.7-2.1 4 0 4.7 2.6 4.7 6v5.9zM5.3 7.4a2.1 2.1 0 1 1 0-4.2 2.1 2.1 0 0 1 0 4.2zM7.1 20.4H3.6V9h3.5v11.4z" />
          </svg>
        </a>

        <a href="mailto:hello@samiraomar.com" class="icon-btn" aria-label="Email">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5L4 8V6l8 5 8-5v2z" />
          </svg>
        </a>

      </div>

      <!-- LINKS -->
      <div class="footer-links">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>
      </div>

      <!-- DIVIDER -->
      <div class="footer-line"></div>

      <!-- BOTTOM -->
      <div class="footer-bottom">
        <p>© 2026 <strong>Samira Omar</strong>. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>

</html>