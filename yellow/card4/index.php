<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Portail Étudiant | Université de Nexora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        /* Reset & Base */
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a3d62, #3c40c6);
            color: #222;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background-color: #1e3799;
            color: #fff;
            text-align: center;
            padding: 25px 0;
            font-size: 2.4rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            user-select: none;
        }
        /* Profile */
        .profile {
            max-width: 1100px;
            margin: 30px auto 15px;
            background: #f5f6fa;
            padding: 25px 35px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 35px;
            color: #2f3640;
        }
        .profile img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 5px solid #1e3799;
            object-fit: cover;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .profile .info {
            font-size: 1.15rem;
            line-height: 1.5;
        }
        .profile .info strong {
            color: #130f40;
            font-weight: 700;
        }

        /* Staff Cards */
        .staff-section {
            max-width: 1100px;
            margin: 10px auto 40px;
            display: flex;
            justify-content: center;
            gap: 60px;
        }
        .staff-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px 25px;
            width: 280px;
            text-align: center;
            box-shadow: 0 12px 25px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 40px rgba(0,0,0,0.3);
        }
        .staff-card img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 4px solid #130f40;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.25);
        }
        .staff-card h3 {
            margin: 0 0 10px 0;
            color: #130f40;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .staff-card p {
            margin: 0;
            font-size: 1.05rem;
            color: #535c68;
            font-style: italic;
        }

        /* Main Container */
        .container {
            max-width: 1100px;
            background: #f5f6fa;
            margin: 0 auto 60px;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            color: #2f3640;
        }
        h2 {
            text-align: center;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #130f40;
            letter-spacing: 1px;
        }
        p.note {
            font-size: 1rem;
            color: #7f8fa6;
            text-align: center;
            margin-bottom: 25px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 12px;
            color: #130f40;
        }
        input[type="file"] {
            width: 100%;
            padding: 14px 12px;
            font-size: 1rem;
            border-radius: 10px;
            border: 2px solid #1e3799;
            outline-color: #130f40;
            cursor: pointer;
            transition: border-color 0.3s ease;
            box-shadow: inset 2px 2px 5px #dcdde1;
        }
        input[type="file"]:hover, input[type="file"]:focus {
            border-color: #130f40;
            box-shadow: 0 0 12px #130f40;
        }
        button {
            display: block;
            margin: 30px auto 0 auto;
            background-color: #130f40;
            color: #fff;
            border: none;
            padding: 16px 42px;
            border-radius: 14px;
            font-size: 1.25rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 18px #1e3799cc;
            transition: background-color 0.4s ease, box-shadow 0.4s ease;
        }
        button:hover {
            background-color: #1e3799;
            box-shadow: 0 10px 25px #130f40cc;
        }
        /* نتیجه آپلود */
        .result {
            max-width: 600px;
            margin: 30px auto 0 auto;
            background: #dff9fb;
            border-left: 8px solid #22a6b3;
            padding: 20px 25px;
            color: #130f40;
            font-weight: 600;
            font-size: 1.1rem;
            word-break: break-word;
            border-radius: 12px;
            user-select: text;
        }
        .result.error {
            background: #fab1a0;
            border-left-color: #e84118;
            color: #e84118;
        }
        a.upload-link {
            color: #130f40;
            font-weight: 700;
            text-decoration: none;
        }
        a.upload-link:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            font-size: 14px;
            color: #dcdde1;
            background-color: #130f40;
            padding: 18px 10px;
            user-select: none;
        }
        /* ریسپانسیو */
        @media (max-width: 720px) {
            .profile, .staff-section, .container {
                max-width: 90%;
                padding: 20px;
                margin: 20px auto;
            }
            .profile {
                flex-direction: column;
                gap: 18px;
                align-items: center;
            }
            .staff-section {
                flex-direction: column;
                gap: 30px;
            }
            .staff-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<header>
    Université de Nexora — Portail Étudiant
</header>

<div class="profile">
    <img src="Prof1.jpg" alt="Profil étudiant" />
    <div class="info">
        <div><strong>Nom:</strong> Mahdi Dumas</div>
        <div><strong>Numéro Étudiant:</strong> 472019038</div>
        <div><strong>Filière:</strong> Informatique - Master Cybersécurité</div>
    </div>
</div>

<div class="staff-section">
    <div class="staff-card">
        <img src="Prof3.jpg" alt="Professeur Dumas" />
        <h3>Professeur Dumas</h3>
        <p>Maître de conférences - Cybersécurité</p>
    </div>
    <div class="staff-card">
        <img src="Prof2.jpg" alt="Président Université Nexora" />
        <h3>Président Nexora</h3>
        <p>Président de l'Université de Nexora</p>
    </div>
</div>

<div class="container">
    <h2>Soumettre votre rapport final (PDF uniquement)</h2>
    <p class="note">📎 Pour des raisons de sécurité, seuls les fichiers PDF sont acceptés.</p>
    <form method="POST" enctype="multipart/form-data" novalidate>
        <label for="file">Choisissez un fichier PDF à téléverser :</label>
        <input type="file" name="file" id="file" accept=".pdf" required />
        <button type="submit" name="upload">Téléverser</button>
    </form>

<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $filename = $file['name'];
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // فقط پسوند pdf قبول شود
    if ($file_ext !== 'pdf') {
        echo "<div class='result error'>❌ Le fichier doit être un PDF.</div>";
    } else {
        $target = $upload_dir . basename($filename);

        if (move_uploaded_file($file['tmp_name'], $target)) {
            // نام فایل به صورت ناایمن بدون هیچ escaping نمایش داده می‌شود تا XSS اتفاق بیفتد
            echo "<div class='result'>
            ✅ Téléversé avec succès: 
            <a href='$target' target='_blank' class='upload-link'>$filename</a>
            </div>";
        } else {
            echo "<div class='result error'>❌ Échec de l'upload.</div>";
        }
    }
}
?>
</div>

<footer>
    © 2025 Université de Nexora | Tous droits réservés.
</footer>
</body>
</html>
