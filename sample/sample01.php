<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://webfontworld.github.io/NexonLv1Gothic/NexonLv1Gothic.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'NexonLv1Gothic';
        }
        body {
            padding: 20px;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
            color: #000;
        }
        main {
            display: flex;
            justify-content: space-between;
        }
        aside {
            width: 30%;
            background-color: #f5f5f5;
        }
        section {
            width: 70%;
        }
    </style>
</head>
<body>
    <main>
        <aside>
            <?php
                include "aside.php";
            ?>
        </aside>
        <section>
            <table border ="1">
                <?php
                include "../connect/connect.php";

                $sql = "SELECT * FROM members";
                $result = $connect -> query($sql);

                if($result){
                    $count = $result -> num_rows;

                    for($i=1; $i<=$count; $i++){
                        $info = $result -> fetch_array(MYSQLI_ASSOC);

                        // var_dump($info);
                        echo "<tr>";
                        echo "<td>".$info['memberID']."</td>";
                        echo "<td>".$info['youEmail']."</td>";
                        echo "<td>".$info['youName']."</td>";
                        echo "<td>".$info['youPass']."</td>";
                        echo "<td>".$info['youBirth']."</td>";
                        echo "<td>".$info['youAge']."</td>";
                        echo "<td>".$info['regTime']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </table>

        </section>
    </main>
    
</body>
</html>