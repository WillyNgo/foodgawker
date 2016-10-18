<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FoodLooker</title>
        <link rel="stylesheet" type="text/css" href="myCss.css"/>
    </head>
    <body>
        <h1 id="title">FoodLooker</h1>
        <div id="formWrapper">
            <form id="searchForm" action="" method="get">
            <p>Keyword: <input type="text" name="keyword" value="<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>"</p>
            <p><input type="submit" name="search" value="Search"/></p>
            <p><input type="submit" name="gawk" value="Most gawked"/></p>
            </form>
        </div>
        <?php
        include('search.php');

        $gawkClicked = false;

        //Check if there's something in the field
        if(isset($_GET['search'])){
            if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
                searchKeyword($_GET['keyword']);
            }
            else{
                echo "<p class='error'>Enter a keyword</p>";
            }
        }
        //Check if button was clicked
        if (isset($_GET['gawk'])) {
            getMostGawked();
        }
        ?>
        <footer>All data &copy; FoodGawker, 2016</footer>
    </body>
</html>
