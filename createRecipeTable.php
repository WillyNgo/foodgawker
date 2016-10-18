<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=homestead', "homestead", "secret");
    $dropQuery = "DROP TABLE IF EXISTS recipes;";
    $tableQuery = "CREATE TABLE recipes("
            . 'id INT(6) PRIMARY KEY AUTO_INCREMENT,'
            . 'recipename VARCHAR(255),'
            . 'username VARCHAR(255),'
            . 'description VARCHAR(255),'
            . 'link VARCHAR(255),'
            . 'gawked INT(255));';
    $pdo->exec($dropQuery);
    $pdo->exec($tableQuery);
    
    //Check if table has been created
    checkTables($pdo, 'recipes');
}
catch(PDOException $pdoe)
{
    echo $pdoe->getMessage();
}
 finally {
     unset($pdo);
}

function checkTables($pdo, $tablename)
{
    // Check if the table was created
    $tableCheck = $pdo->query("SELECT * FROM $tablename");
    if(!empty($tableCheck))
    {
        echo "Table created\n";
    }
    else
    {
        echo "ERROR: Table not created\n";
    }
}

?>
