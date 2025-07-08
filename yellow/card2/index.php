<?php
// اتصال ساده به دیتابیس برای تست آسیب‌پذیری SQLi
// ' oorr/**/'a'/**/=/**/'a
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "irwb_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("ارتباط با دیتابیس برقرار نشد: " . $conn->connect_error);
}

$raw_input = "";
$result_data = null;
$error = "";

// فیلتر کردن کلمات خاص
function filter_input_string($input) {
  $blacklist = ['or', 'and', '1=1', '--', '#', '/*', '*/'];
  foreach ($blacklist as $bad) {
    $input = str_ireplace($bad, '', $input);
  }
  return $input;
}

if (isset($_GET['search'])) {
  $raw_input = $_GET['search'];
  $filtered_input = filter_input_string($raw_input);

  // آسیب‌پذیری SQL Injection با فیلتر سطح پایین
  $sql = "SELECT id, username, email FROM users WHERE username = '$filtered_input'";

  $result = $conn->query($sql);
  if ($result) {
    $result_data = $result->fetch_all(MYSQLI_ASSOC);
  } else {
    $error = "خطا در اجرای کوئری: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>🟡 کارت زرد ۲ - فیلتر و SQL Injection</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #0d1117;
      color: #c9d1d9;
      font-family: monospace;
      padding: 40px;
    }
    h1 {
      color: #ffdd57;
      text-shadow: 0 0 8px #ffdd57aa;
    }
    .error {
      color: #f85149;
      margin-top: 10px;
    }
    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #444;
      padding: 10px;
      text-align: center;
    }
    th {
      background-color: #222;
      color: #fff;
    }
    tr:hover {
      background-color: #ffdd5733;
    }
    .info {
      color: #999;
      font-size: 0.85rem;
    }
  </style>
</head>
<body>

<h1>🟡 کارت زرد ۲ - SQL Injection + فیلتر</h1>
<p>🧠 چالش: بدون اینکه از <code>or</code> یا <code>1=1</code> یا <code>--</code> استفاده کنی، همه کاربرا رو ببینی! 😏</p>

<form method="GET" class="d-flex gap-2 mb-3" role="search">
  <input
    type="text"
    name="search"
    class="form-control"
    placeholder="مثلاً: TAHA"
    value="<?php echo htmlspecialchars($raw_input, ENT_QUOTES); ?>"
    autofocus
  />
  <button type="submit" class="btn btn-warning">جستجو</button>
</form>

<p class="info">🚫 فیلتر شده: <code>or</code>, <code>and</code>, <code>1=1</code>, <code>--</code>, <code>#</code>, <code>/* */</code></p>

<?php if ($error): ?>
  <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<?php if (is_array($result_data) && count($result_data) > 0): ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>نام کاربری</th>
        <th>ایمیل</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result_data as $row): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?></td>
          <td><?php echo htmlspecialchars($row['username'], ENT_QUOTES); ?></td>
          <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php elseif (isset($_GET['search'])): ?>
  <p>🤷‍♂️ نتیجه‌ای پیدا نشد، یا نتونستی از فیلتر رد بشی!</p>
<?php endif; ?>

</body>
</html>
