<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FoodLooker</title>
    </head>
    <body>
        <h1>FoodLooker</h1>
        <form action="" method="get">
            <p>Keyword: <input type="text" name="keyword" value="<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>"</p>
            <p><input type="submit" name="search" value="Search"/></p>
            <p><input type="submit" name="gawk" value="Most gawked"/></p>
        </form>
        
        <?php
        include('search.php');

        $gawkClicked = false;

        if(isset($_GET['search'])){
            if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
                searchKeyword($_GET['keyword']);
            }
            else{
                echo "<p class='error'>Enter a keyword</p>";
            }
        }
        if (isset($_GET['gawk'])) {
            getMostGawked();
        }
        ?>
    </body>
</html>
