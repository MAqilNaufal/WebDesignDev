<html>
    <head>
        <title>Pert 9</title>
    </head>

    <body>
        <div id = "content">
            <br>
    <div id="InsertButton" align = "center">
        <button onclick="location.href='InsertPage.php';">Add New Data</button>
    </div>
    <br>
    <table class = "tabel" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $a = "mysql:host=localhost;dbname=unimedia_senin";
                $username="root";
                $password="";
                $connection = new PDO($a, $username, $password);

                $query="SELECT * FROM kampus";
                $output=$connection->prepare($query);
                $output->execute();

                while($row = $output->fetch()) {
                ?>
                    <tr>
                    <td><?php echo $row ['id'] ?> </td>
                    <td><?php echo $row ['nama'] ?> </td>
                    <td><?php echo $row ['alamat']?> </td>
                    <td><?php echo $row ['telepon']?> </td>
                    <td>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="button">Delete</a> 
                        <a>|</a> 
                        <a href="EditPage.php?id=<?= $row['id'] ?>" class="button">Edit</a>
                    </td>
                    </tr>
                <?php }
            ?>
            </tbody>
            </table>
        </div>
    </body>
    
    <style>
        table {
            border: 1px solid black;
            width: 800px;
            }
            
        th {
            font-size: 15pt;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
            background: lightblue;
            }

        th, tr, td {
            border-collapse: collapse;
            text-align: center;
            padding: 10px;
        }

        tr, td, th {
            border: 1px solid black;
        }

        td{
            font-size: 10pt;
        }
    </style>
</html>