<?php
session_start();

$price = 100000; // قیمت اشتراک

// موجودی به صورت رشته با کاما (ظاهر برای کاربر)
$walletJS = "19,642";

// مقدار کیف پول واقعی رو از ورودی دریافت می‌کنیم (قابل هک)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // فیلد wallet از فرم
    $walletInput = $_POST['wallet'] ?? '0';
    // حذف کاما و تبدیل به عدد صحیح
    $walletInput = str_replace(',', '', $walletInput);
    $wallet = intval($walletInput);

    if ($wallet < $price) {
        $_SESSION['message'] = "❌ پول نداری! موجودی: " . number_format($wallet) . " تومان";
        $_SESSION['message_type'] = "error";
    } else {
        $_SESSION['message'] = "✅ هکم کردی! پرداخت موفق.";
        $_SESSION['message_type'] = "success";
    }

    // ریدایرکت بعد از POST برای جلوگیری از ارسال مجدد فرم
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// خواندن پیام از سشن و پاک کردن آن
$message = $_SESSION['message'] ?? "";
$message_type = $_SESSION['message_type'] ?? "";
unset($_SESSION['message'], $_SESSION['message_type']);
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8" />
<link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.002/Vazirmatn-font-face.css" rel="stylesheet" />
<title>خرید اشتراک ویژه</title>
<style>
  body {
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    background: #f0f3f5;
    margin: 0; padding: 0;
    display: flex; justify-content: center; align-items: center;
    min-height: 100vh;
  }
  .container {
    background: #fff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgb(0 0 0 / 0.1);
    max-width: 420px;
    width: 100%;
    box-sizing: border-box;
    text-align: center;
  }
  h2 {
    margin-bottom: 25px;
    color: #2c3e50;
    font-weight: 600;
  }
  p.price, p.wallet {
    font-size: 1.1rem;
    margin-bottom: 15px;
    color: #555;
  }
  form {
    margin-top: 20px;
  }
  button {
    background-color: rgb(13, 156, 68);
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    color: white;
    font-size: 1.1rem;
    border: none;
    border-radius: 8px;
    padding: 12px 0;
    width: 100%;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: rgb(12, 136, 53);
  }
  .message {
    margin-top: 25px;
    font-weight: 500;
    font-size: 1rem;
  }
  .message.success {
    color: #27ae60;
  }
  .message.error {
    color: #c0392b;
  }
</style>
</head>
<body>
<div class="container">
  <h2>خرید اشتراک ویژه</h2>
  <p class="price">قیمت اشتراک: <strong>100,000 تومان</strong></p>
  <p class="wallet">موجودی کیف پول شما: <strong id="walletDisplay"><?= htmlspecialchars($walletJS) ?></strong> تومان</p>

  <?php if ($message): ?>
    <p class="message <?= $message_type === "error" ? 'error' : 'success' ?>">
      <?= htmlentities($message) ?>
    </p>
  <?php endif; ?>

  <form method="POST" onsubmit="return prepareWallet()">
    <!-- این فیلد مخفی، مقدار موجودی واقعی رو از جاوااسکریپت میفرسته -->
    <input type="hidden" name="wallet" id="walletInput" value="" />
    <button type="submit">پرداخت اشتراک</button>
  </form>
</div>

<script>
  // موجودی اولیه به صورت رشته با کاما
  const walletStr = "<?= $walletJS ?>";

  function prepareWallet() {
    // حذف کاما و ارسال مقدار عددی به فرم
    const cleanWallet = walletStr.replace(/,/g, '');
    document.getElementById('walletInput').value = cleanWallet;
    return true; // فرم ارسال شود
  }
</script>
</body>
</html>
