<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Sederhana</title>
</head>
<body>
    <h2>Formulir Kontak</h2>
    <form action="submit.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="pesan">Pesan:</label>
        <textarea name="pesan" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>