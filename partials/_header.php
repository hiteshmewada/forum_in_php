<?php
    session_start();
    
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    $sql="select * from `category` LIMIT 3";
                        
                    $res=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($res)){
                        echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
                    }
                    echo ' 
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" tabindex="-1">Contact</a>
                </li>
            </ul>
            <div class="row mx-2">';
            if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){
                echo '<form class="d-flex ">
                <input style="width:100px;height:50px;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button style="width:100px;height:50px;" class="btn btn-success mx-2" type="submit">Search</button>
                <p  style="width:150px;height:40px;" class="text-light my-2 "> Welcome <b>'. $_SESSION['user_name'].'</b> </p>
                <a  style="width:100px;height:50px;" href="partials\_logout.php"  class="btn btn-outline-success mx-2 my-0"  >LogOut</a>
                    </form>
                ';
            }
            else{
                echo '<form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success mx-2" type="submit">Search</button>
               
                <button type="button" class="btn btn-outline-success mr-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal" >Signup</button>
            </form>';
            }
                
                

           echo ' </div>
            
        </div>
    </div>
</nav>';
    include 'partials\_loginmodal.php';
    include 'partials\_signupmodal.php';
     if(isset($_GET['signupsuccess']) and ($_GET['signupsuccess']=="true"))
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> You have registered successfully. Now you can login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    else if(isset($_GET['signupsuccess'])){
        
        $err= substr($_GET['signupsuccess'],6,strlen($_GET['signupsuccess']));
        // var_dump(substr$_GET['signupsuccess']);
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Failure!</strong>  ' .$err.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
     
?>
