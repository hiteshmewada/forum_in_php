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
        $id=$_GET['catid'];
        $sql="select * from `category` where `cat_id`=$id ";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res)){
            $catname=$row['cat_name'];
            $catdesc=$row['cat_desc'];
        }
    ?>
    <!-- Category container starts here -->
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> </h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>1. The Forum exists to provide a safe and friendly place for coders to learn, share and socialise.<br>
               2. Bad language/profanity is not permitted. As a rule of thumb, if you wouldn't say it in front of a child don't say it here. <br>
               3. Any form of prejudice is not permitted. <br>
               4. Spamming is not permitted. <br>
               5. The use of multiple accounts is not permitted.
            </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <div class="media my-3">
            
            <div class="media-body">
                <h5 class="mt-0"><img src="images\profile.jpg" class="inline mr-3" width="21px" height="25px" class="mr-3" alt="..."> Media heading Media heading Media heading</h5>
                <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
            </div>
        </div>
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