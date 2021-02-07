<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="index.php">
    <h3>Aakrut</h3>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="services.php">Services</a>
      </li>
      <li class="nav-item">
        <?php echo ($_SESSION['valid'] ? '<a class="nav-link" id="logout" href="#">Logout</a>' : '<a class="nav-link" href="#" data-toggle="modal" data-target=".start-modal-xl">Login</a>');  ?>
      </li>
    </ul>
  </div>
</nav>