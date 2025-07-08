<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>حمایت از پروژه | IRWB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Vazirmatn', 'Fira Code', monospace;
            direction: rtl;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 25px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background: #e8f5e9;
            border-right: 4px solid #4caf50;
            color: #2e7d32;
            font-size: 17px;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    حمایت مالی از پروژه IRWB
</header>

<div class="container">
    <form method="GET" action="">
        <label for="reason">موضوع حمایت (دلخواه):</label>
        <input type="text" id="reason" name="reason" placeholder="مثلاً حمایت از توسعه وب">

        <label for="amount">مبلغ (تومان):</label>
        <input type="number" id="amount" name="amount" placeholder="مثلاً 50000">

        <button type="submit">پرداخت</button>
    </form>

    <?php
    if (isset($_GET['reason']) && isset($_GET['amount'])) {
        $reason = $_GET['reason']; // آسیب‌پذیر XSS
        $amount = htmlspecialchars($_GET['amount'], ENT_QUOTES, 'UTF-8'); // ایمن

        echo "
        <div class='result'>
            ✅ مبلغ <strong>$amount تومان</strong> برای موضوع: <strong>$reason</strong> ثبت شد.
        </div>";

        // مخفی‌سازی برای XSS مخفی
        echo "<div style='display:none;'>$reason</div>";
    }
    ?>
</div>

<footer>
    © 2025 IRWB | حمایت از پروژه‌های متن‌باز
</footer>

</body>
</html>
