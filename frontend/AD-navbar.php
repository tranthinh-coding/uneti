<style>
.ad-navbar {
  width: 240px;
  height: 100%;
  min-height: 100vh;
  background: #334155;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  border-bottom: 1px solid #ccc;
  color: var(--white-primary);
}

.ad-navbar .logo {
  height: 90px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 48px;
}

.ad-navlist {
  padding: 12px 14px;
}

.ad-navlist .ad-navitem .ad-navlink {
  padding: 18px 12px;
  width: 100%;
  transition: all .25s linear;
  border-radius: 12px;
  margin: 4px 0;
}

.ad-navlist .ad-navitem.active .ad-navlink,
.ad-navlist .ad-navitem .ad-navlink:hover {
  background: #475569;
}

</style>

<nav class="ad-navbar">
  <div class="logo">
    <i class='bx bx-bug' ></i>
  </div>
  <ul class="ad-navlist">
    <li class="ad-navitem active">
      <a href="?c=ad&a=create" class="ad-navlink">Thêm tài khoản</a>
    </li>
    <li class="ad-navitem">
      <a href="?c=ad&a=view&ty=st" class="ad-navlink">Tìm sinh viên</a>
    </li>
    <li class="ad-navitem">
      <a href="?c=ad&a=read&ty=te" class="ad-navlink">Tìm giảng viên</a>
    </li>
  </ul>
</nav>