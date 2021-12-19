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
    <?php include 'partials\_header.php'; ?>
    <?php include 'partials\_dbconnect.php'; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "select * from `category` where `cat_id`=$id ";
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $catname = $row['cat_name'];
        $catdesc = $row['cat_desc'];
    }

    ?>
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if ($method == 'POST') {
        // insert into thread table of database
        $th_tit = $_POST['title'];
        $th_desc = $_POST['desc'];
        $no=$_POST["sno"];
        $sql = "insert into `threads` (`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user`) 
            values('$th_tit','$th_desc','$id','$no')  ";
        $res = mysqli_query($con, $sql);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been added successfully. Wait for the community members to respond.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
    }
    ?>
    <!-- Category container starts here -->
    <div class="container my-3">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> </h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p> <b>Rules: <br></b>
                1. The Forum exists to provide a safe and friendly place for coders to learn, share and socialise.<br>
                2. Bad language/profanity is not permitted. As a rule of thumb, if you wouldn't say it in front of a child don't say it here. <br>
                3. Any form of prejudice is not permitted. <br>
                4. Spamming is not permitted. <br>
                5. The use of multiple accounts is not permitted.<br>
                6. Questions containing '/' won't be added in discussion section.
            </p>
            <p>Posted by: <b> <a href="https://www.linkedin.com/in/hitu04/" target="_blank">Hitesh Mewada</a></b></p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    
        <?php
                if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){
                        echo '<div class="container"> 
                                    <h1 class="py-2">Start a Discussion</h1>
                                    <form action="'.$_SERVER["REQUEST_URI"].'"method="POST">
                            <div class="form-group">
                                <label for="title">Problem Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as possible.
                                </small>
                            </div>
                            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                            <div class="form-group my-3">
                                <label for="exampleFormControlTextarea1">Elaborate your concern</label>
                                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success py-2">Submit</button>
                        </form>
                    </div>';
                }
                else{
                    echo ' 
                            <div class="container">
                            <h1 class="py-2">Start a Discussion</h1>
                            <p class="lead">
                                You are not logged in to start a discussion... Please login to start and contribute in discussion.
                            </p>
                            </div>';
                }
        ?>
   

        
    <div class="container">
        <h1 class="py-4">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "select * from `threads` where `thread_cat_id`=$id ";
        $res = mysqli_query($con, $sql);
        $nores = true;
        while ($row = mysqli_fetch_assoc($res)) {
            $nores = false;
            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_title'];
            $thread_desc = $row['thread_desc'];
            $dt=$row['thread_dt'];
            $thread_user_id=$row['thread_id'];
            $sql2="select * from `users` where sno='$thread_user_id' ";
            $res2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($res2);
            echo '<div class="media my-3">
                            <div class="media-body">
                                    <h5 class="mt-0 "><img src="images\profile.jpg" class="inline mr-3" width="21px" height="25px" class="mr-4" alt="..."> Asked By- '.$row2['user_name'].' at ' . $dt . ' <br>  <a class="text-dark mx-5" href="thread.php?thread_id=' . $thread_id . '">' . $thread_title . '</a></h5>
                                    <p class="mx-5">' . $thread_desc . '</p>
                                    
                            </div>
                          </div>';
        }
        if ($nores == true) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-4">No Threads Found</p>
                <p class="lead">Be the first person to ask a question.
                </p>
                </div>
            </div><br><br>';
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