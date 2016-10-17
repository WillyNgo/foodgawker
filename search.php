<?php

function searchKeyword($keyword) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=homestead', "homestead", "secret");
        
        $tableQuery = "SELECT recipename, link, gawked FROM recipes "
                . "WHERE description LIKE ?;";
        
        $stmt = $pdo->prepare($tableQuery);
        $stmt->bindValue(1, '%'.$keyword.'%');
        echo "<div class='tableResult'>";
        echo "<table class='results'>";
        echo "<tr><th>Results</th><th>gawks</th></tr>";
        if($stmt->execute()){
            while($row = $stmt->fetch()){
                echo "<tr>";
                echo "<td><a href='".$row['link']."'>".$row['recipename']."</a></td>";
                echo "<td>".$row['gawked']."</td>";
                echo "</tr>";
            }
        }
        else{
            echo "No results found";
        }
        echo "</table>";
        echo "</div>";
    } catch (PDOException $pdoe) {
        echo $pdoe->getMessage();
    } finally {
        unset($pdo);
    }
}

function getMostGawked() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=homestead', "homestead", "secret");
        
        $tableQuery = "SELECT username, gawked, recipename, link FROM recipes "
                . "ORDER BY gawked DESC "
                . "LIMIT 25;";
        
        $stmt = $pdo->prepare($tableQuery);
        echo "<div class='tableResult'>";
        echo "<table class=results>";
        echo "<tr><th>Submitters</th><th>Recipe</th><th>gawks</th></tr>";
        if($stmt->execute()){
            while($row = $stmt->fetch()){
                echo "<tr>";
                echo "<td>".$row['username']."</td>";
                echo "<td><a href='".$row['link']."'>".$row['recipename']."</a></td>";
                echo "<td>".$row['gawked']."</td>";
                echo "</tr>";
            }
        }
        else{
            echo "No results found";
        }
        echo "</table>";
        echo "</div>";
    } catch (PDOException $pdoe) {
        echo $pdoe->getMessage();
    } finally {
        unset($pdo);
    }
}
