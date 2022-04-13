<nav class="ad-navbar">
  <div class="wrapper">  
    <div class="logo">
      <i class='bx bxl-react'></i>
    </div>
    <div class="ad-navbar-name">
      <?php echo "Hello, " . $userSession->name; ?>
    </div>
    <ul class="ad-navlist">
      <li class="ad-navitem active">
        <a href="?c=0&a=view" class="ad-navlink">Danh sách điểm</a>
      </li>
    </ul>
  </div>
  <div class="btn-signout">
    <a href="?c=sy&a=signout">
      <button class="btn btn-red">
        Thoát
      </button>
    </a>
  </div>
</nav>