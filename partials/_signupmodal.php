<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up to iForum</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="partials\_handlesignup.php" method="POST">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter your email addresss" id="signupemail" name="signupemail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User name</label>
                        <input type="text" maxlength="10" placeholder="Enter your username" class="form-control" id="signupuser" name="signupuser" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">You will be identified by your username on this website.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" placeholder="Enter password" class="form-control" id="signuppass" name="signuppass">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" placeholder="Confirm password" class="form-control" id="signupcpass" name="signupcpass">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </form>
    </div>
  </div>
</div>