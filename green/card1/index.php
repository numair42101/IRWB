<?php
session_start();

$max_attempts = 5;
$lockout_threshold = 3;
$lockout_duration = 60; // ثانیه

function generateCaptcha() {
    $a = rand(1, 10);
    $b = rand(1, 10);
    $_SESSION['captcha_answer'] = $a + $b;
    return "What is $a + $b?";
}

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}
if (!isset($_SESSION['lockout_time'])) {
    $_SESSION['lockout_time'] = 0;
}

$error = '';
$current_time = time();

if ($current_time < $_SESSION['lockout_time']) {
    $remaining = $_SESSION['lockout_time'] - $current_time;
    $error = "Too many failed attempts. Please wait $remaining seconds before trying again.";
}

// اگر صفحه GET است یا خطا وجود دارد، کپچا جدید تولید کن
if ($_SERVER['REQUEST_METHOD'] === 'GET' || !empty($error)) {
    $captcha_question = generateCaptcha();
}

// پردازش فرم لاگین (POST) فقط وقتی قفل نیست
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($error)) {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $captcha = $_POST['captcha'] ?? '';

    if (!isset($_SESSION['captcha_answer']) || intval($captcha) !== $_SESSION['captcha_answer']) {
        $error = "Captcha is incorrect!";
        $_SESSION['attempts']++;
        $captcha_question = generateCaptcha();
    } elseif ($user === 'admin' && $pass === 'admin') {
        $_SESSION['logged_in'] = true;
        $_SESSION['attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials!";
        $_SESSION['attempts']++;
        $captcha_question = generateCaptcha();
    }

    if ($_SESSION['attempts'] > 0 && $_SESSION['attempts'] % $lockout_threshold == 0) {
        $_SESSION['lockout_time'] = time() + $lockout_duration;
    }

    if ($_SESSION['attempts'] >= $max_attempts) {
        $error = "Too many login attempts! Please try again later.";
    }
}

// نمایش فرم لاگین اگر وارد نشده
if (!isset($_SESSION['logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Login - Fake C2 Panel</title>
      <style>
        body {
          background: #111;
          color: #0f0;
          font-family: monospace;
          display: flex;
          height: 100vh;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }
        input {
          background: #222;
          border: 1px solid #0f0;
          color: #0f0;
          padding: 10px;
          margin: 5px;
          font-family: monospace;
          font-size: 1em;
        }
        input[type="submit"] {
          cursor: pointer;
          background: #0a0;
          border: none;
          font-weight: bold;
        }
        .error {
          color: #f00;
          margin-bottom: 10px;
        }
      </style>
    </head>
    <body>
      <h1>Login to Fake C2 Panel</h1>
      <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
      <form method="POST" <?= !empty($error) && strpos($error, 'wait') !== false ? 'onsubmit="return false;"' : '' ?>>
        <input type="text" name="user" placeholder="Username" required autofocus <?= !empty($error) && strpos($error, 'wait') !== false ? 'disabled' : '' ?> />
        <input type="password" name="pass" placeholder="Password" required <?= !empty($error) && strpos($error, 'wait') !== false ? 'disabled' : '' ?> />
        <label><?= isset($captcha_question) ? htmlspecialchars($captcha_question) : '' ?></label>
        <input type="text" name="captcha" placeholder="Captcha answer" required <?= !empty($error) && strpos($error, 'wait') !== false ? 'disabled' : '' ?> />
        <input type="submit" value="Login" <?= !empty($error) && strpos($error, 'wait') !== false ? 'disabled' : '' ?> />
      </form>
    </body>
    </html>
    <?php
    exit;
}

// خروج از سیستم
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// تابع تولید IP تصادفی
function randomIP() {
    return rand(1, 255) . "." . rand(0, 255) . "." . rand(0, 255) . "." . rand(1, 254);
}

// داده‌های فیک دستگاه‌ها
$devices = [
    ['name' => 'Device 1', 'ip' => randomIP(), 'status' => 'Online'],
    ['name' => 'Device 2', 'ip' => randomIP(), 'status' => 'Offline'],
    ['name' => 'Device 3', 'ip' => randomIP(), 'status' => 'Online'],
    ['name' => 'Device 4', 'ip' => randomIP(), 'status' => 'Online'],
];

// شبیه‌سازی تور تصادفی
$torNodes = [
    'France', 'Germany', 'Netherlands', 'USA', 'Russia', 'Japan', 'Iran', 'Brazil', 'India', 'Canada'
];
$currentTor = $torNodes[array_rand($torNodes)];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Fake Hacker C2 Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    body {
      margin: 0; padding: 0;
      background: #000;
      color: #0f0;
      font-family: 'Courier New', monospace;
      user-select: none;
    }
    header {
      padding: 1em;
      background: #111;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #0f0;
    }
    main {
      padding: 1em;
    }
    h1, h2 {
      margin: 0 0 0.5em 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1em;
    }
    th, td {
      border: 1px solid #0f0;
      padding: 0.5em;
      text-align: left;
    }
    button {
      background: #0f0;
      color: #000;
      border: none;
      padding: 0.5em 1em;
      cursor: pointer;
      font-weight: bold;
      font-family: monospace;
      margin: 0.2em;
      border-radius: 3px;
      transition: background 0.3s;
    }
    button:hover {
      background: #0a0;
    }
    .status-online {
      color: #0f0;
      font-weight: bold;
    }
    .status-offline {
      color: #f00;
      font-weight: bold;
    }
    .tor-info {
      background: #111;
      padding: 1em;
      margin: 1em 0;
      border: 1px solid #0f0;
      font-size: 1.2em;
      text-align: center;
    }
    /* Responsive */
    @media (max-width: 600px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      th, td {
        padding: 0.5em;
        border: none;
      }
      tr {
        margin-bottom: 1em;
        border: 1px solid #0f0;
        padding: 0.5em;
        border-radius: 5px;
      }
      thead tr {
        display: none;
      }
    }
  </style>
  <script>
    function shutdownDevice(name) {
      alert(name + " shutting down... (Fake Action)");
    }

    function disconnectDevice(name) {
      alert(name + " disconnected from C2 (Fake Action)");
    }

    function refreshTor() {
      const torNodes = ['France', 'Germany', 'Netherlands', 'USA', 'Russia', 'Japan', 'Iran', 'Brazil', 'India', 'Canada'];
      const random = torNodes[Math.floor(Math.random() * torNodes.length)];
      document.getElementById('torNode').textContent = random;
    }
    setInterval(refreshTor, 7000);
  </script>
</head>
<body>

<header>
  <div>Fake C2 Panel</div>
  <a href="?logout" style="color:#0f0; text-decoration:none;">Logout</a>
</header>

<main>
  <h1>Command & Control - Fake Panel</h1>
  <div class="tor-info">
    <strong>Current Tor Node:</strong> <span id="torNode"><?= htmlspecialchars($currentTor) ?></span>
  </div>

  <h2>Connected Devices</h2>
  <table>
    <thead>
      <tr>
        <th>Device Name</th>
        <th>IP Address</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($devices as $device): ?>
      <tr>
        <td><?= htmlspecialchars($device['name']) ?></td>
        <td><?= htmlspecialchars($device['ip']) ?></td>
        <td class="status-<?= strtolower($device['status']) ?>"><?= htmlspecialchars($device['status']) ?></td>
        <td>
          <button onclick="shutdownDevice('<?= htmlspecialchars($device['name']) ?>')">Shutdown</button>
          <button onclick="disconnectDevice('<?= htmlspecialchars($device['name']) ?>')">Disconnect</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</main>

</body>
</html>
