<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>

<body>
    <div id="content" align="center">
        <form action="insert.php" method="post">
            <h3>Tambahkan Data Mahasiswa</h3>

            <h4 class="Nama">Nama:</h4>
            <input type="text" name="name" required>
            <h4 class="nama">Alamat:</h4>
            <input type="text" name="adress" required>
            <h4 class="nama">Telepon:</h4>
            <input type="text" name="phone" required>
            <br><br>
        <button type="submit">Insert</button>

        </form>
    </div>    
</body>

<style>
    h4 {
        margin-right: 120px;
        font-size: 16px;
    }

    .Nama {
        margin-right: 130px;
    }

    h3 {
        font-size: 40px;
    }
    
</style>
</html>