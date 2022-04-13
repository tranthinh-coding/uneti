<nav class="ad-navbar">
  <div class="wrapper">  
    <div class="logo">
      <i class='bx bx-bug'></i>
    </div>
    <div class="ad-navbar-name">
      <?php echo "Hello, " . $userSession->name; ?>
    </div>
    <ul class="ad-navlist">
      <li class="ad-navitem">
        <a href="?c=0&a=create-account" class="ad-navlink">Thêm tài khoản</a>
      </li>
      <li class="ad-navitem">
        <a href="?c=0&a=create-class" class="ad-navlink">Thêm lớp học phần</a>
      </li>
      <li class="ad-navitem">
        <a href="?c=0&a=ud" class="ad-navlink">Phân lớp học phần</a>
      </li>
      <li class="ad-navitem">
        <a href="?c=0&a=view-te" class="ad-navlink">Danh sách giảng viên</a>
      </li>
      <li class="ad-navitem">
        <a href="?c=0&a=view-st" class="ad-navlink">Danh sách sinh viên</a>
      </li>
      <li class="ad-navitem">
        <a href="?c=0&a=view-st-top" class="ad-navlink">Danh sách sinh viên điểm cao từng khoa</a>
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