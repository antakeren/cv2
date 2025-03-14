<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['ttl'] = $_POST['ttl'];
    $_SESSION['deskripsi'] = $_POST['deskripsi'];
    $_SESSION['kontak'] = $_POST['kontak'];
    $_SESSION['pengalaman'] = $_POST['pengalaman'];
    $_SESSION['pendidikan'] = $_POST['pendidikan'];
    $_SESSION['skill'] = $_POST['skill'];
    $_SESSION['gender'] = $_POST['gender'];

    if (!empty($_FILES['input_foto']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["input_foto"]["name"]);
        move_uploaded_file($_FILES["input_foto"]["tmp_name"], $target_file);
        $_SESSION['foto_path'] = $target_file;
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'User'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        .cv-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: auto;
            text-align: left;
        }

        .profile-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-section .imgbox {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #007bff;
            display: inline-block;
        }

        .profile-section .imgbox img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-section h1 {
            color: #007bff;
            font-size: 32px;
            font-weight: bold;
            margin-top: 10px;
        }

        .profile-section p.ttl-gender {
            color: black;
            font-size: 20px;
            font-weight: bold;
            margin: 5px 0;
        }

        h2 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }

        .section {
            margin-bottom: 20px;
        }

        .logout-btn {
            background: #dc3545; 
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="profile-section">
            <div class="imgbox">
                <img src="<?php echo isset($_SESSION['foto_path']) ? $_SESSION['foto_path'] : 'default.png'; ?>" alt="Profile Picture">
            </div>
            <h1><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Nama Anda'; ?></h1>
            <p class="ttl-gender"><?php echo isset($_SESSION['ttl']) ? $_SESSION['ttl'] : 'Tempat, Tanggal Lahir'; ?></p>
            <p class="ttl-gender"><?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : 'Jenis Kelamin'; ?></p>
        </div>

        <div class="section">
            <h2>Deskripsi</h2>
            <p><?php echo isset($_SESSION['deskripsi']) ? $_SESSION['deskripsi'] : 'Deskripsi singkat tentang diri Anda.'; ?></p>
        </div>

        <div class="section">
            <h2>Kontak</h2>
            <p><strong></strong> <?php echo isset($_SESSION['kontak']) ? $_SESSION['kontak'] : 'Email Anda'; ?></p>
        </div>

        <div class="section">
            <h2>Pengalaman</h2>
            <p><?php echo isset($_SESSION['pengalaman']) ? $_SESSION['pengalaman'] : 'Pengalaman kerja atau organisasi Anda.'; ?></p>
        </div>

        <div class="section">
            <h2>Pendidikan</h2>
            <p><?php echo isset($_SESSION['pendidikan']) ? $_SESSION['pendidikan'] : 'Riwayat pendidikan Anda.'; ?></p>
        </div>

        <div class="section">
            <h2>Skill</h2>
            <p><?php echo isset($_SESSION['skill']) ? $_SESSION['skill'] : 'Keahlian yang Anda miliki.'; ?></p>
        </div>

        <form action="" method="post">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>
