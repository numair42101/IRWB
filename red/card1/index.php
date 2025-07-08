<?php
// چالش امنیتی: DOM-based XSS — سطح قرمز
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />
  <meta charset="UTF-8" />
  <title>سامانه اطلاع‌رسانی - نسخه آزمایشی</title>
  <style>
    body {
      font-family: 'Vazirmatn', 'Fira Code', monospace;
      background: #f4f4f4;
      color: #333;
      padding: 40px;
      max-width: 800px;
      margin: auto;
    }
    header {
      border-bottom: 1px solid #ccc;
      margin-bottom: 20px;
    }
    h1 {
      font-size: 1.8rem;
      color: #444;
    }
    .notice {
      font-size: 0.95rem;
      background: #e9ecef;
      padding: 10px;
      border-right: 3px solid #999;
    }
    pre {
      background: #fff;
      border: 1px solid #ccc;
      padding: 15px;
      font-family: monospace;
      font-size: 0.95rem;
      white-space: pre-wrap;
      word-wrap: break-word;
    }
    footer {
      margin-top: 60px;
      font-size: 0.8rem;
      color: #888;
      text-align: center;
    }
  </style>
</head>
<body>

<header>
  <h1>سامانه اطلاع‌رسانی</h1>
  <p class="notice">
    توجه: این نسخه آزمایشی است. برخی ویژگی‌ها ممکن است غیرفعال یا ناقص باشند.
  </p>
</header>

<p>اطلاعات صفحه:</p>
<pre id="output"></pre>

<script>
  (function() {
    const hash = decodeURIComponent(location.hash.substring(1)); // حذف #
    
    // فیلتر ساده روی برخی کلمات
    const blacklist = /<script|onerror|onload|onclick/gi;

    if (blacklist.test(hash)) {
      document.getElementById('output').textContent = "⚠️ ورودی نامعتبر.";
      return;
    }

    // نمایش مستقیم ورودی بدون sanitize کامل
    document.getElementById('output').innerHTML = hash;
  })();
</script>

<footer>
  <p>© 2025 مرکز داده آزمایشی. تمامی حقوق محفوظ است.</p>
</footer>

</body>
</html>
