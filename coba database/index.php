<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Kontak</title>
</head>
<body>
    <h2>Formulir Kontak</h2>
    <form action="submit.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="kelas">Kelas:</label>
        <select name="kelas" required>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cobacoba";

            // Membuat koneksi
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Memeriksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Mengambil data dari tabel kelas
            $query = "SELECT * FROM kelas";
            $result = $conn->query($query);

            // Menampilkan data kelas sebagai dropdown
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nama_kelas"] . "</option>";
                }
            }

            // Menutup koneksi
            $conn->close();
            ?>
        </select><br>

        <label for="pesan">Pesan:</label>
        <textarea name="pesan" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>