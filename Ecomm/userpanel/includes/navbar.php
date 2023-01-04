

<style>
    *{
        font-family: 'Rajdhani';
    }
    
</style>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: black;">
  <div class="container">
    <a class="navbar-brand" href="adminlogin1.php"><img src="img/logo2.png" alt="Shea's Fashion Online Shop"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="categories.php">Fashion Collections</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cart.php"></span>Cart</a>
            </li>
        <?php 
          if(isset($_SESSION['auth']))
          {
            ?>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Welcome
            <?php echo $_SESSION['auth_user']['name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
            <?php
          }
          else{
            ?>
            <li class="nav-item">
            <a class="nav-link" href="login.php">Log in</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="registration.php">Create Account</a>
          </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

<style>
.nav-item:hover{
    background-color:#8B0000;
    color: white;
}
</style>