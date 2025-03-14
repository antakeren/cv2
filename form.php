<?php
session_start();
$timeout = 60;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Diri</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        input[type="text"], input[type="email"], textarea, select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"], .logout-btn {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, .logout-btn:hover {
            background: #218838;
        }
        .logout-btn {
            background: #dc3545; 
        }
        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Form Data Diri</h2>
        <form action="Tugas cv.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="ttl" placeholder="Tempat, Tanggal Lahir" required>
            <textarea name="deskripsi" placeholder="Deskripsi Singkat" required></textarea>
            <input type="text" name="kontak" placeholder="Kontak" required>
            <input type="text" name="pengalaman" placeholder="Pengalaman" required>
            <input type="text" name="pendidikan" placeholder="Pendidikan" required>
            <input type="text" name="skill" placeholder="Skill" required>

            <select name="gender" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Lainnya">Lainnya</option>
            </select>

            <div>
            <label for="input_foto"></label>
                    <input type="file" name="input_foto" value="input_foto" class="file:bg-white file:text-Primary file:font-semibold file:p-2 file:rounded-xl file:mr-2 hover:file:bg-gray-200">
                </div>

            <input type="submit" value="Submit" name="Submit">
        </form>
        
        <form action="" method="post">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>