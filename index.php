<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>IRWB - سامانه آسیب‌پذیری</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/firacode@6.2.0/distr/fira_code.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />
  <link rel="stylesheet" href="./CSS/STY_indexHome.css">
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
