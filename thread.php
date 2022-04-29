<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>hForum</title>
</head>

<body>
    <?php include './partials/_dbconnect.php'; ?>
    <?php include './partials/_header.php'; ?>

    <?php
    $id = $_GET['thread_id'];
    // echo var_dump($_GET['thread_id']);
    $sql = "select * from `threads` where `thread_id`='$id' ";
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $threadname = $row['thread_title'];
        $threaddesc = $row['thread_desc'];
        $thread_user_id = $row['thread_user'];
        $sql2 = "select user_name from `users` where `sno`='$thread_user_id' ";
        $res2=mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $posted=$row2['user_name'];
    }
    ?>
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if ($method == 'POST') {
            // insert into comment table of database
            $comment = $_POST['comment'];
            $comment=str_replace("<","&lt",$comment);
            $comment=str_replace(">","&gt",$comment);
            $no=$_POST["sno"];
            // $th_desc = $_POST['desc'];
            // echo $comment;
            $sql="insert into `comments` (`com_desc`,`thread_id`,`com_by`) values('$comment','$id','$no')";
            // $sql = "insert into `comments` (`com_desc`,`thread_id`,`com_by`) 
            // values('$comment','$id','0')  ";
            $res = mysqli_query($con, $sql);
            // echo var_dump($res);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added successfully. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
    ?>
    <!-- Category container starts here -->
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $threadname; ?> </h1>
            <p class="lead"><?php echo $threaddesc; ?></p>
            <hr class="my-4">
            <p> <b>Rules: <br></b>
                1. The Forum exists to provide a safe and friendly place for coders to learn, share and socialise.<br>
                2. Bad language/profanity is not permitted. As a rule of thumb, if you wouldn't say it in front of a child don't say it here. <br>
                3. Any form of prejudice is not permitted. <br>
                4. Spamming is not permitted. <br>
                5. The use of multiple accounts is not permitted.<br>
                6. Comments containing '/' won't be added in comments section.
            </p>
            <p>Posted by: <b><?php echo "Hitesh Mewada";?></b></p>
        </div>
    </div>
    <?php
                if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){
                        echo '<div class="container">
                        <h1 class="py-2">Post a Comment</h1>
                        <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
                
                            <div class="form-group my-3">
                                <label for="exampleFormControlTextarea1">Type your comment</label>
                
                                <textarea class="form-control my-3" id="comment" name="comment" rows="3"></textarea>
                                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success py-2">Post Comment</button>
                        </form>
                    </div>
                            ';
                }
                
                else{
                    echo ' 
                            <div class="container">
                            <h1 class="py-2">Post a comment</h1>
                            <p class="lead">
                                You are not logged in to type a comment.. Please login to start and contribute in discussion.
                            </p>
                            </div>';
                }
        ?>
    
    <div class="container">
        <h1 class="py-2">Discussions</h1>
        <?php
        $id = $_GET['thread_id'];
        $sql = "select * from `comments` where `thread_id`=$id ";
        $res = mysqli_query($con, $sql);
        $nores = true;
        while ($row = mysqli_fetch_assoc($res)) {
            $nores = false;
            $id = $row['com_id'];

            $com = $row['com_desc'];
            $dt=$row['com_dt'];
            $com_user_id=$row['com_by'];
            $sql2="select * from `users` where sno='$com_user_id' ";
            $res2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($res2);

            echo '<div class="media my-3">
                            <div class="media-body">
                                    <p class="font-weight-bold my-0 text-dark"><img src="images\profile.jpg" class="inline mr-3" width="21px" height="25px" class="mr-3 " alt="..."> Asked By- '.$row2['user_name'].' at ' . $dt . ' <br></p><p class="mx-5">' . $com . '</p>
                            </div>
                          </div>';
        }
        if ($nores == true) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-4">No Comments Found</p>
                <p class="lead">Be the first person to comment.
                </p>
                </div>
            </div><br><br>';
        }
        
        ?>
    </div>


    <br>
    <br>
    <br>

    <?php include './partials/_footer.php'; ?>

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