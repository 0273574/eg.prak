<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $db = new mysqli('localhost', 'root', '', 'egzamin');
    ?>
    <header id="baner">
        <h1>Portal dla wędkarzy
    </header>
    <div class="bloki">
        <div class="lewy">
            <div class="lewy1">
                <h3>Ryby zamieszkujące rzeki</h3>
                
                <?php
                $query = $db->prepare(" SELECT nazwa, akwen, wojewodztwo FROM ryby JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE rodzaj = 3;");
                $query ->execute();
                $result = $query->get_result();
                echo "<ol>";
            
                while($row = $result->fetch_assoc()){
                    $nazwa = $row["nazwa"];
                    $akwen = $row["akwen"];
                    $woj = $row["wojewodztwo"];
                    echo "<li>" . $nazwa . " pływa w rzece " . $akwen . ", " . $woj . "</li>";
                }
                echo "</ol>"

                
                ?>
            </div>
            <br>
            <div class="lewy2">
                <h3>Ryby drapieżne naszych wód</h3>
                
                <?php $query = "SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia = 1;";
                $result = $db->query($query);
                echo "<table >";
                echo "<tr><th>L.p.</th><th>Gatunek</th><th>Występowanie</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nazwa"] . "</td><td>" . $row["wystepowanie"] . "</td></tr>";
                }
                echo "</table>";
                    

                ?>

            </div>
            
        </div>
        <div class="prawy">
                <img src="ryba1.jpg" class="obrazek"> </img>
                <a href="kwerendy.txt"><br>Pobierz kwerendy</a>
            </div>
    </div>        
        <footer>
            <p>Wykonał: 000000000<p>
        </footer>
<?php
$db->close();
?>
</body>

</html>