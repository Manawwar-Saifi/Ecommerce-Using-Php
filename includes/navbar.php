<!-- <?php session_start(); ?> -->

<nav class="navbar navbar-expand-lg bg-dark text-white">
  <div class="container text-white">
    <a class="navbar-brand text-white" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-center">
        <li class="nav-item">

          <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
            {
              ?>
              <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <span>Welcome </span><?= isset($_SESSION['username']) ? $_SESSION['username'] : " " ?>
                      </a>
                      <ul class="dropdown-menu text-white">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <form action="functions/authcode.php" method="POST">
                            <button type="submit" name="logoutbtn" class="btn btn-primary dropdown-item">Logout</button>
                          </form>
                      
                      </li>
                      </ul>
                    </li>
           
              <?php
            }
            else 
            {
            ?>  
                <a class="nav-link active text-white" aria-current="page" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="register.php">Register</a>
              </li>   
                    
            <?php

            }
          ?>
        
        
        
      </ul>
     
    </div>
  </div>
</nav>