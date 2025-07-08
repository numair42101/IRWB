<?php
$newsFile = "news.html";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    // Vulnerable on purpose - for educational deface/XSS testing
    $entry = "<div class='news-box'><h2>" . $title . "</h2><p>" . $content . "</p></div>\n";
    file_put_contents($newsFile, $entry, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hacker News Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            color: #00ff99;
            font-family: 'Share Tech Mono', monospace;
            padding: 20px;
        }
        h1 {
            color: #ff0066;
            text-align: center;
            font-size: 3em;
            margin-bottom: 10px;
        }
        .note {
            text-align: center;
            font-size: 0.9em;
            color: #888;
            margin-bottom: 30px;
        }
        .news-box {
            border: 1px solid #444;
            background-color: #1a1a1a;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        form {
            background-color: #111;
            border: 1px dashed #555;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }
        input[type="text"], textarea {
            background-color: #222;
            border: 1px solid #555;
            color: #0f0;
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            font-family: inherit;
        }
        input[type="submit"] {
            background-color: #ff0066;
            color: #fff;
            padding: 10px 25px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #cc0052;
        }
        hr {
            border-color: #333;
            margin: 40px 0;
        }
        a {
            color: #0ff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        h2 {
            border-left: 5px solid #ff0066;
            padding-left: 10px;
            color: #fff;
        }
    </style>
</head>
<body>

<h1>HACKER NEWS PORTAL</h1>
<p class="note">This is a vulnerable training zone for web security practice. Do not deploy on public servers.</p>

<hr>

<h2>Latest Messages</h2>
<?php
if (file_exists($newsFile)) {
    readfile($newsFile);
} else {
    echo "<p>No posts yet.</p>";
}
?>

<hr>

<h2>Submit Your Message</h2>
<form method="POST">
    <label>Title / Hacker Name:</label>
    <input type="text" name="title" required>

    <label>Message:</label>
    <textarea name="content" rows="5" required></textarea>

    <input type="submit" value="Post">
</form>

</body>
</html>
