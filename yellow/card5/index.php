<?php
session_start();

$valid_pages = ['student', 'teacher', 'research'];
$content = "<h2 style='color:#888;'>صفحه مورد نظر یافت نشد.</h2><p>لطفاً از منو صفحه‌ای را انتخاب کنید.</p>";

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if (in_array($page, $valid_pages)) {
        $file_path = "articles/" . $page . ".html";
        if (file_exists($file_path)) {
            $content = file_get_contents($file_path);
        }
    } else if (strpos($page, "inject:") === 0) {
        // باگ مخفی: اجرای مستقیم HTML بدون فیلتر
        $content = substr($page, 7);
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سامانه مقالات دانشگاهی | دانشگاه فیک</title>
    <style>
        body {
            font-family: "Vazir", Tahoma, sans-serif;
            background: #f2f6fa;
            margin: 0;
            direction: rtl;
        }

        header {
            background: linear-gradient(to right, #34495e, #2c3e50);
            color: white;
            padding: 20px 40px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        header h1 {
            margin: 0;
            font-size: 26px;
        }

        nav {
            margin-top: 10px;
        }

        nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
            padding: 8px 14px;
            background: rgba(255,255,255,0.1);
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        nav a:hover {
            background: rgba(255,255,255,0.3);
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            line-height: 1.8;
        }

        footer {
            text-align: center;
            margin-top: 60px;
            font-size: 14px;
            color: #888;
            padding: 20px;
        }

        .badge {
            background: #e67e22;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            margin-right: 5px;
        }
    </style>
</head>
<body>

<header>
    <h1>سامانه مقالات دانشگاهی <span class="badge">نسخه 1.0</span></h1>
    <nav>
        <a href="?page=student">📘 مقاله دانشجو</a>
        <a href="?page=teacher">📙 مقاله استاد</a>
        <a href="?page=research">📗 تحقیقات پژوهشی</a>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

<footer>
    © 2025 دانشگاه فیک | طراحی‌شده برای اهداف آموزشی توسط آقا طاها
</footer>

</body>
</html>
