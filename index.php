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
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if ($method == 'POST') {
            // insert into category table of database
            $catnam = $_POST['newcatname'];
            $catdesc = $_POST['newcatdesc'];
            $no=$_POST['sno'];
            
            $sql="select * from `category` where `cat_name`='$catnam' ";
            $res = mysqli_query($con, $sql);
            $row=mysqli_num_rows($res);
            if($row>0){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Your category is matching with other category. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
            else{
                $sql="insert into `category` (`cat_name`,`cat_desc`,`cat_user_name`) values('$catnam','$catdesc','$no')";
            
                $res = mysqli_query($con, $sql);
                // echo var_dump($res);
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                        <strong>Success!</strong> Your category has been added successfully. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }
           
        }
    ?>
    <!-- Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x700/?learning,tech" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?microsoft,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?programming,python" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Category container starts here -->
    <div class="container my-3">
        <h2 class="text-center">iForum - Browse Categories </h2>
        <div class="row ">
            <!-- Fetch all the categories  -->
            <!-- use a for loop to iterate through categories -->
            <?php
            $sql = "select * from `category`";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                // echo $row['cat_id'];
                // echo $row['cat_name'];
                $cat = $row['cat_name'];
                $id = $row['cat_id'];
                $desc = $row['cat_desc'];
                echo '<div class="col-md-4 my-4">
                            <div class="card" style="width: 18rem;">
                                <img src="https://source.unsplash.com/500x400/?' . $cat . ',coding" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</h5></a>
                                    <p class="card-text">' . substr($desc, 0, 90) . '...</p>
                        
                                    <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary my-4">View Threads</a>
                                </div>
                                </div>
                            </div>';
            }
            ?>

        </div>

    </div>
    <hr class="my-4">
    <?php
        if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){
            echo '<div class="container">
                <h1 class="py-2">Create a new category</h1>
                <form action="'.$_SERVER["REQUEST_URI"].' " method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter name of category</label>
                        <input type="text" class="form-control" placeholder="Name of category" id="newcatname" name="newcatname" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Make sure you are creating a new category</div>
                    </div>
                    <div class="form-group my-3">
                        <label for="exampleFormControlTextarea1">Enter description of category</label>
        
                        <textarea class="form-control my-3" placeholder="Description of category" id="newcatdesc" name="newcatdesc" rows="3"></textarea>
                        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success py-2">Submit</button>
                </form>
            </div>';
        }
        else{
            echo '<div class="container">
            <h1 class="py-2">Create a new category</h1>
            <p class="lead">
                You are not logged in to create a category.. Please login for creating a new category.
            </p>
        </div>';
        }
    ?>
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