<!DOCTYPE html>
    <html>
        <head>
            <title>Update Data</title>
        </head>

        <?php
            $ID_Mhs = $_GET['id'];
            $a = "mysql:host=localhost;dbname=unimedia_senin";
            $username="root";
            $password="";
            $connection = new PDO($a, $username, $password);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query="SELECT * FROM Kampus WHERE id = '$ID_Mhs'";
            $hasil=$connection->prepare($query);
            $hasil->execute();
            while($row = $hasil->fetch()){
        ?>

        <body>
            <div id = "content" align="center">
                <form action = "edit.php" method="post">
                    <h3>Perbarui Data Mahasiswa</h3>

                    <h4 class = "Nama" >Nama:</h4>
                    <input type = "hidden" name = "newID" value="<?php echo $row ['id'] ?>">
                    <input type="text" name = "newName" required value="<?php echo $row ['nama'] ?>">
                    <h4>Alamat:</h4>
                    <input type="text" name = "newAddress" required value="<?php echo $row ['alamat'] ?>">
                    <h4>Telepon:</h4>
                    <input type= "text" name = "newPhone" required value="<?php echo $row ['telepon'] ?>">
                    <br><br>
                <button type="submit">Update</button>
                </form>
            </div>
        </body>

        <?php }
            ?>