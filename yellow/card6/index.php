<?php
// university/files.php

$base_dir = __DIR__ . '/notes/';
$content = "<h2 style='color:#999;'>لطفاً جزوه‌ای را انتخاب کنید.</h2>";

if (isset($_GET['file'])) {
    $input = $_GET['file'];
    $target = $base_dir . $input;

    if (is_file($target)) {
        // نمایش محتوای فایل
        $content = "<h3>📄 محتوای فایل: <code>$input</code></h3>";
        $content .= "<pre style='background:#f7f7f7;padding:15px;border-radius:6px;'>"
                 . htmlspecialchars(file_get_contents($target)) . "</pre>";
    } elseif (is_dir($target)) {
        // لیست کردن محتویات پوشه
        $files = scandir($target);
        $content = "<h3>📁 محتوای پوشه: </h3>";
        foreach ($files as $f) {
            if ($f === '.' || $f === '..') continue;
            $encoded_path = htmlspecialchars($input . '/' . $f);
            $content .= "<li><a href='?file=$encoded_path'>$f</a></li>";
        }
        $content .= "</ul>";
    } else {
        $content = "<h2 style='color:red;'>فایل یا پوشه یافت نشد.</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سامانه جزوه‌های آموزشی</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />
    <style>
        body { font-family: 'Vazirmatn', monospace; background: #f0f0f0; margin: 0; direction: rtl; }
        header { background: #006699; color: white; padding: 20px; }
        nav a {
            color: white; margin-left: 15px; text-decoration: none;
            font-weight: bold; padding: 6px 12px; background: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        nav a:hover { background: rgba(255,255,255,0.3); }
        main {
            background: white; max-width: 900px; margin: 30px auto;
            padding: 30px 40px; border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        ul { list-style: none; padding: 0; }
        li a { text-decoration: none; color: #007acc; }
        li a:hover { text-decoration: underline; }
        code { background: #eee; padding: 2px 4px; border-radius: 4px; }
    </style>
</head>
<body>

<header>
    <h1>📚 سامانه جزوه‌های آموزشی دانشگاه فیک</h1>
    <nav>
        <a href="?file=math.txt">ریاضی</a>
        <a href="?file=physics.txt">فیزیک</a>
        <a href="?file=cs.txt">علوم کامپیوتر</a>
        <a href="?file=.">📁 لیست پوشه اصلی</a>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

</body>
</html>
