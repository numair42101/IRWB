<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FakeTube - ویدیو پخش کن حرفه‌ای</title>
  <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />

  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Vazirmatn', 'Fira Code', monospace;
      background: #0f0f0f;
      color: #fff;
      padding: 0;
    }
    header {
      background-color: #111;
      padding: 15px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    }
    header h1 {
      margin: 0;
      font-size: 24px;
      color: #f33;
    }
    .container {
      max-width: 960px;
      margin: 30px auto;
      padding: 0 20px;
    }
    .video-player {
      background: #000;
      width: 100%;
      padding-top: 56.25%;
      position: relative;
      border: 3px solid #f33;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.6);
    }
    .video-player::before {
      content: '▶';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 80px;
      color: red;
      opacity: 0.8;
      animation: pulse 1.5s infinite;
    }
    @keyframes pulse {
      0%, 100% { transform: translate(-50%, -50%) scale(1); }
      50% { transform: translate(-50%, -50%) scale(1.2); }
    }
    .comment-section {
      margin-top: 40px;
    }
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      background: #1b1b1b;
      border: 1px solid #444;
      color: #fff;
      border-radius: 4px;
    }
    input[type="submit"] {
      margin-top: 10px;
      padding: 10px 20px;
      background: crimson;
      border: none;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      border-radius: 4px;
    }
    .comment {
      margin-top: 20px;
      background: #1a1a1a;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 5px;
    }
    footer {
      text-align: center;
      padding: 20px;
      color: #777;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <header>
    <h1>FakeTube 🎥</h1>
    <span>برای آموزش امنیت وب</span>
  </header>

  <div class="container">
    <div class="video-player">
      <!-- فقط نمایشی - واقعی نیست -->
    </div>

    <div class="comment-section">
      <h2>💬 نظرات</h2>
      <?php
        $file = "comments.html";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $comment = $_POST['comment'] ?? '';
          $entry = "<div class='comment'>" . $comment . "</div>\n";
          file_put_contents($file, $entry, FILE_APPEND);
        }
        if (file_exists($file)) {
          readfile($file);
        }
      ?>

      <form method="POST">
        <textarea name="comment" rows="4" placeholder="نظر خود را بنویسید..."></textarea>
        <input type="submit" value="ارسال نظر">
      </form>
    </div>
  </div>

  <footer>
    نسخه آزمایشی برای تمرین XSS - از اجرای واقعی جلوگیری شود.
  </footer>
</body>
</html>
