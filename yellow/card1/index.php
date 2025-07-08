<?php
// ' or1=1 -- -
// اتصال ساده به دیتابیس برای تست آسیب‌پذیری SQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "irwb_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("ارتباط با دیتابیس برقرار نشد: " . $conn->connect_error);
}

$user_input = "";
$result_data = null;
$error = "";

if (isset($_GET['search'])) {
  $user_input = $_GET['search'];

  // آسیب‌پذیری SQL Injection (عمداً)
  $sql = "SELECT id, username, email FROM users WHERE username = '$user_input'";
//   echo $sql; // برای تست کوئری

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
  <meta charset="UTF-8" />
  <title>کارت زرد 1 - SQLi چالشی</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #0d1117;
      color: #c9d1d9;
      font-family: monospace;
      padding: 40px;
    }
    h1 {
      color: #39ff14;
      text-shadow: 0 0 10px #39ff1499;
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
      background-color: #39ff1433;
    }
    .error {
      color: #f85149;
    }
  </style>
</head>
<body>

<h1>🟡 کارت زرد ۱ - SQL Injection</h1>
<p>🧠 چالش: بدون اینکه نام کاربری دقیق رو بدونی، همه کاربرا رو ببین!</p>

<form method="GET" class="d-flex gap-2 mb-3" role="search">
  <input
    type="text"
    name="search"
    class="form-control"
    placeholder="مثلاً: hacker"
    value="<?php echo htmlspecialchars($user_input, ENT_QUOTES); ?>"
    autofocus
  />
  <button type="submit" class="btn btn-success">جستجو</button>
</form>

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
  <p>✅ اتصال موفق، اما نتیجه‌ای یافت نشد.</p>
<?php endif; ?>

</body>
</html>
