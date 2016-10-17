<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //include_once("createRecipeTable.php");    
        include("setup.php");
        
        for($pageNum = 1; $pageNum < 2; $pageNum++)
        {
            scrape($pageNum);
        }
        ?>
    </body>
</html>
