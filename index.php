<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>IRWB - سامانه آسیب‌پذیری</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/firacode@6.2.0/distr/fira_code.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />
  <style>
    body {
      background-color: #0d1117;
      color: #c9d1d9;
      font-family: 'Vazirmatn', 'Fira Code', monospace;
      padding: 50px;
    }

    .logo-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      margin-bottom: 2rem;
    }

    .logo-container img {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      border: 3px solid #39ff14;
      box-shadow: 0 0 12px #39ff14cc;
    }

    .logo-container h1 {
      font-weight: 900;
      font-size: 2.8rem;
      letter-spacing: 0.15em;
      color: #39ff14;
      text-shadow: 0 0 8px #39ff14bb, 0 0 18px #39ff1444;
    }

    p.desc {
      font-size: 1.2rem;
      margin-bottom: 3rem;
      color: #8b949e;
      text-align: center;
    }

    .section-title {
      font-weight: 700;
      font-size: 1.8rem;
      margin-top: 3rem;
      margin-bottom: 1rem;
      text-shadow: 0 0 6px #00000088;
      text-align: center;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 16px;
      max-width: 980px;
      margin: 0 auto 3rem auto;
      padding: 0 1rem;
    }

    a.card-hack {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px 12px;
      border-radius: 12px;
      border: 1.5px solid #30363d;
      background-color: #161b22;
      color: #c9d1d9;
      font-weight: 700;
      font-size: 1.1rem;
      box-shadow: 0 0 5px #00000055;
      transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
      text-decoration: none;
      cursor: pointer;
      text-align: center;
    }

    a.card-hack small {
      margin-top: 6px;
      font-weight: 500;
      color: #8b949e;
      font-size: 0.9rem;
    }

    a.card-hack:hover {
      transform: translateY(-6px);
      background-color: #21262d;
      box-shadow: 0 0 12px #39ff1455;
    }

    a.card-hack.yellow:hover { box-shadow: 0 0 16px #e3b341cc; }
    a.card-hack.green:hover  { box-shadow: 0 0 16px #3fb950cc; }
    a.card-hack.red:hover    { box-shadow: 0 0 16px #f85149cc; }

    /* ترمینال هکری */
    .card-hack.terminal-mode {
      background-color: #000000;
      color: #39ff14;
      font-family: 'Fira Code', monospace;
      font-size: 0.9rem;
      text-align: left;
      direction: ltr;
      white-space: pre-wrap;
      overflow: hidden;
      position: relative;
      padding: 10px;
      transform: scale(0.95);
      transition: transform 0.3s ease-in-out;
      cursor: default;
    }



    @keyframes blink {
      50% {
        opacity: 0;
      }
    }

    /* جلوگیری از افکت hover روی کارت‌هایی که در حالت ترمینال هستند */
    .card-hack.terminal-mode:hover {
      background-color: #000000 !important;
      box-shadow: none !important;
      transform: none !important;
      cursor: default;
    }

    /* استایل درخشان برای امضا */
    .glow-text {
      color: #ffffff;
      font-size: 1.6rem;
      text-align: center;
      margin-top: 2rem;
      font-weight: bold;
      text-shadow:
        0 0 5px #fff,
        0 0 10px #0ff,
        0 0 20px #0ff,
        0 0 40px #0ff,
        0 0 80px #0ff;
      animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
      from {
        text-shadow:
          0 0 5px #fff,
          0 0 10px #00f0ff,
          0 0 20px #00f0ff,
          0 0 40px #00f0ff;
      }
      to {
        text-shadow:
          0 0 10px #fff,
          0 0 20px #00f0ff,
          0 0 30px #00f0ff,
          0 0 50px #00f0ff,
          0 0 80px #00f0ff;
      }
    }
  </style>
</head>
<body>
  <div class="logo-container">
    <img src="IR.jpg" alt="لوگوی IR" />
    <h1>IRWB</h1>
  </div>

  <p class="desc">سامانه آسیب‌پذیری وب اپلیکیشن - وارد کارت‌ها شو و تمرین کن، تو هکر خوب آینده هستی 🔥</p>

  <h3 class="section-title text-warning">🟡 سطح ساده (کارت زرد)</h3>
  <div class="card-grid">
    <a href="yellow/card1/index.php" class="card-hack yellow">Classic SQL Injection<br><small>دامپ دیتا</small></a>
    <a href="yellow/card2/index.php" class="card-hack yellow">Classic SQL Injection<br><small>دامپ دیتا با فیلتر</small></a>
    <a href="yellow/card3/index.php" class="card-hack yellow">Reflected XSS<br><small>حمایت مالی</small></a>
    <a href="yellow/card4/index.php" class="card-hack yellow">Attribute XSS	<br><small>دانشگاه فرانسوی</small></a>
    <a href="yellow/card5/index.php" class="card-hack yellow">Remote File Inclusion<br><small>سامانه مقالات دانشگاهی</small></a>
    <a href="yellow/card6/index.php" class="card-hack yellow">Local File Inclusion<br><small>سامانه جزوه‌های آموزشی دانشگاه</small></a>
    <a href="yellow/card7/index.php" class="card-hack yellow"> Persistent XSS<br><small>پورتال خبری هکر</small></a>
    <a href="yellow/card8/index.php" class="card-hack yellow"> Stord XSS<br><small>هک پلتفرم ویدیویی</small></a>
  </div>

  <h3 class="section-title text-success">🟢 سطح متوسط (کارت سبز)</h3>
  <div class="card-grid">
    <a href="green/card1/index.php" class="card-hack green">نفوذ به C2 یک هکر<br><small>Crack Login Bypass Captcha & Rate Limit</small></a>
    <a href="green/card2/index.php" class="card-hack green">SVG XSS<br><small>کشف آسیب پذیری آپلودر</small></a>
    <a href="green/card3/index.php" class="card-hack green">DOM-based XSS<br><small> تزریق کد سمت‌کلاینت </small></a>
    <a href="green/card2/index.php" class="card-hack green">خرید با موجودی کم<br><small>استفاده از برپ سویت</small></a>
  </div>

  <h3 class="section-title text-danger">🔴 سطح پیشرفته (کارت قرمز)</h3>
  <div class="card-grid">
    <a href="red/card1/index.php" class="card-hack red">فریب فیلتر<br><small>hash+HTML=؟</small></a>
  </div>

  <h3 class="section-title glow-text">مدیر وب سایت ابر طراح | Abartarah.ir</h3>

<script>
  const cards = document.querySelectorAll('.card-hack');

  cards.forEach(card => {
    const originalHTML = card.innerHTML;
    const originalHref = card.getAttribute('href');
    let started = false;

    card.addEventListener('click', function handler(e) {
      e.preventDefault();
      if (started) return;

      cards.forEach(c => {
        if (c !== card && c.classList.contains('terminal-mode')) {
          c.classList.remove('terminal-mode');
          c.innerHTML = c.dataset.originalHtml || c.innerHTML;
        }
      });

      if (card.classList.contains('terminal-mode')) return;

      if (!card.dataset.originalHtml) {
        card.dataset.originalHtml = originalHTML;
      }

      card.classList.add('terminal-mode');
      card.innerHTML = `IRWB Terminal [Guest]\n\n> Please write to continue: start`;

      const input = document.createElement('input');
      input.type = 'text';
      input.style.background = 'transparent';
      input.style.border = 'none';
      input.style.outline = 'none';
      input.style.color = '#39ff14';
      input.style.fontFamily = 'Fira Code, monospace';
      input.style.width = '100%';
      input.style.fontSize = '0.85rem';
      input.style.marginTop = '10px';
      input.style.direction = 'ltr';
      input.style.textAlign = 'left';
      input.autofocus = true;

      card.appendChild(input);
      input.focus();

      input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
          const val = input.value.trim().toLowerCase();
          if (val === 'start') {
            started = true;
            card.innerHTML = "Transferring...\n\n[+] Executing start...\n[✔] Redirecting to next stage...";
            setTimeout(() => {
              window.location.replace(originalHref);
            }, 1500);
          } else {
            card.innerHTML = `Invalid command ❌\n\n> Please write to continue: start`;
            card.appendChild(input);
            input.value = '';
            input.focus();
          }
        }
      });
    });
  });
console.clear()
console.log(
  "%c IRWB - سامانه تمرینی آسیب‌پذیری‌ها\n" +
  "😂🤡 سلام هکر! اگه اینجا یه باگ پیدا نکردی، یا خواب بودی یا خودت باگی \n" +
  "مواظب باش، اینجا قراره مغزت دود بشه ",
  "color:rgb(255, 255, 255); background-color: rgba(0, 0, 0, 0.09); font-size: 16px; font-weight: bold; padding: 8px; border-radius: 6px;"
);
</script>
</body>
</html>
