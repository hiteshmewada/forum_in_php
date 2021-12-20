<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iForum</title>
</head>

<body>
    <?php include 'partials\_dbconnect.php'; ?>
    <?php include 'partials\_header.php'; ?>
    <!-- // Entry of new category -->


    <!-- Search Results -->
    <div class="container my-3">
        <h1>Search Results for <em>"<?php echo $_GET['query'] ?>"</em></h1>
        <?php
        $nores=true;
        $query = $_GET['query'];
        $sql = "select * from `threads` where match (thread_title,thread_desc) against ('$query') ";
        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $threadname = $row['thread_title'];
            $threaddesc = $row['thread_desc'];
            $id = $row['thread_id'];
            $nores=false;
            $url = "thread.php?thread_id=" . $id;
            echo '<div class="result">
                <h3><a href="' . $url . '" class="text-dark">' . $threadname . '</a></h3>
                <p>' . $threaddesc . '</p>
                </div>';
        }
        // comments
        $sql = "select * from `comments` where match (com_desc) against ('$query') ";
        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            // $threadname = $row['thread_title'];
            $com_desc = $row['com_desc'];
            $id = $row['com_by'];
            $nores=false;
            $url = "thread.php?thread_id=" . $id;
            echo '<div class="result">
                <h3><a href="' . $url . '" class="text-dark"><p>' . $com_desc . '</p></a></h3>
                
                </div>';
        }
        // categories
        $sql = "select * from `category` where match (cat_name,cat_desc) against ('$query') ";
        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $cat_name = $row['cat_name'];
            $cat_desc = $row['cat_desc'];
            $id = $row['cat_user_name'];
            $nores=false;
            $url = "thread.php?thread_id=" . $id;
            echo '<div class="result">
                <h3><a href="' . $url . '" class="text-dark">' . $cat_name . '</a></h3>
                <p>' . $cat_desc . '</p>
                </div>';
        }
        if ($nores) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-4">
                    No Results Found
                </p>
                <p class="lead">
                    Your search - <em>"'.$query.'"</em> - did not match any words. <br>

                    Suggestions: <br>
                <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                </ul>
                </p>
            </div>
        </div>';
        }
        ?>
        
    </div>
    <br>
    <br>
    <br>


    <?php include 'partials\_footer.php'; ?>
    <!-- <div class="mx-2">
    <button class="btn btn-primary">Login</button>
    <button class="btn btn-primary">Sign</button>
</div> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>