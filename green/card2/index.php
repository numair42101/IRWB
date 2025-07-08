<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";  // مسیر برای ذخیره‌سازی فایل
    // ساخت پوشه uploads اگر وجود نداشته باشد
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // بررسی نوع فایل: فقط SVG مجاز است
    if ($fileType != "svg") {
        $error_message = "فقط فایل‌های SVG مجاز هستند.";
        $uploadOk = 0;
    }

    // اگر همه چیز درست باشد، فایل را آپلود کن
    if ($uploadOk == 0) {
        $error_message = "فایل آپلود نشد.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $success_message = "فایل ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " با موفقیت آپلود شد.";
            $link = "<br><a href='" . $target_file . "' target='_blank'>مشاهده فایل SVG</a>";
        } else {
            $error_message = "خطا در آپلود فایل.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آپلود فایل SVG</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Vazirmatn', 'Fira Code', monospace;
            padding: 20px;
            background-color: #f1f1f1;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .file-input {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>SVG آپلود فایل </h2>

        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" class="file-input" required>
            <input type="submit" value="آپلود فایل" class="submit-btn">
        </form>

        <?php if (isset($error_message)): ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php elseif (isset($success_message)): ?>
            <div class="message success"><?php echo $success_message; ?></div>
            <?php echo $link; ?>
        <?php endif; ?>

    </div>

</body>
</html>
