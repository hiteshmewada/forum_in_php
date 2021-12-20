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
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            // insert into contacts table of database
            $con_email = $_POST['conemail'];
            $conrat = $_POST['conrate'];
            $confeed = $_POST['confeed'];
            $confeed = str_replace("<", "&lt", $confeed);
            $confeed = str_replace(">", "&gt", $confeed);
            // $sql2 = "select user_name from `users` where `sno`='$no' ";
            // $res2=mysqli_query($con,$sql2);
            // $row2 = mysqli_fetch_assoc($res2);
            // $posted=$row2['user_name'];
            // echo $posted;
            $sql = "insert into `contacts` (`con_email`,`con_rat`,`con_feed`) 
                values('$con_email','$conrat','$confeed')  ";
            $res = mysqli_query($con, $sql);
            if($res){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your valuable feedback has been added successfully. We will contact you soon.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            else{
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> Your record has not been added successfully. Wait for the problem to resolve.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }
    ?>
    <div class="container">
        <h1 class="text-center my-3">Contact Us</h1>
        <form action="<?php echo $_SERVER["REQUEST_URI"] ?>"method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control my-1" id="conemail" name="conemail" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Rate us</label>
                <select multiple class="form-control" id="conrate" name="conrate">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Feedback</label>
                <textarea class="form-control my-2" id="confeed" name="confeed" rows="3"></textarea>
            </div>
            <button class="btn btn-success my-2">Submit</button>
        </form>
    </div>
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