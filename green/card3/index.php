<?php
// چالش XSS مسیر URL با UI کلاسیک و شیک
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>چالش XSS | سایت خبری امنیت</title>
<style>
  @import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css');
  body {
    font-family: "Vazirmatn", Tahoma, sans-serif;
    margin: 0; padding: 0;
    background: #f9f9f9;
    color: #222;
    direction: rtl;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  header {
    background: #2c3e50;
    padding: 1.5rem 2rem;
    text-align: center;
    font-weight: 700;
    font-size: 1.8rem;
    color: #ecf0f1;
    letter-spacing: 0.05em;
    user-select: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
  }
  main {
    flex-grow: 1;
    max-width: 800px;
    margin: 3rem auto 4rem;
    background: #fff;
    border-radius: 8px;
    padding: 2rem 2.5rem;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
  }
  h1 {
    font-size: 2rem;
    margin-bottom: 1rem;
    color: #34495e;
    border-bottom: 2px solid #3498db;
    padding-bottom: 0.3rem;
  }
  p {
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    color: #555;
    line-height: 1.6;
  }
  pre#output {
    background: #f4f6f8;
    border: 1px solid #d1d9e6;
    border-radius: 6px;
    padding: 1.4rem 1.8rem;
    font-family: 'Courier New', Courier, monospace;
    font-size: 1rem;
    line-height: 1.4;
    color: #2c3e50;
    white-space: pre-wrap;
    word-wrap: break-word;
    min-height: 140px;
    user-select: text;
  }
  .alert {
    background: #e74c3c;
    color: #fff;
    padding: 0.9rem 1.3rem;
    border-radius: 6px;
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    text-align: center;
    user-select: none;
    box-shadow: 0 0 8px rgba(231, 76, 60, 0.6);
  }
  footer {
    text-align: center;
    padding: 1.2rem 0;
    background: #2c3e50;
    color: #bdc3c7;
    font-size: 0.9rem;
    user-select: none;
  }
  a {
    color: #2980b9;
    text-decoration: none;
    font-weight: 600;
  }
  a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>
<header>
  سایت خبری امنیت | چالش XSS مسیر URL
</header>

<main>
  <h1>چالش XSS از طریق مسیر URL</h1>
  <p>محتوای مسیر URL به صورت مستقیم در صفحه نمایش داده می‌شود (آسیب‌پذیر به XSS).<br>
  <strong>توجه:</strong> تگ <code>&lt;script&gt;</code> در مسیر مجاز نیست و فیلتر می‌شود.</p>

  <div class="alert" id="alertBox" style="display:none;">
    ورود تگ &lt;script&gt; مجاز نیست!
  </div>

  <pre id="output" tabindex="0" aria-live="polite" aria-atomic="true"></pre>
</main>

<footer>
  © ۲۰۲۵ سایت خبری امنیت | ساخته شده برای چالش‌های امنیت وب  
  <br><a href="https://github.com/your-repo" target="_blank" rel="noopener">مشاهده کد در گیت‌هاب</a>
</footer>

<script>
  (function(){
    const path = decodeURIComponent(window.location.pathname);

    const alertBox = document.getElementById('alertBox');
    const output = document.getElementById('output');

    if (/<script.*?>/i.test(path)) {
      alertBox.style.display = 'block';
      output.textContent = "ورود تگ <script> مجاز نیست!";
    } else {
      alertBox.style.display = 'none';
      output.innerHTML = path;
    }
  })();
</script>
</body>
</html>
