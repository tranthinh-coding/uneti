<style>
  .boxed-form {
    padding: 12px;
  }
  .boxed-tab {
    height: 90px;
    display: flex;
    align-items: center;
  }
  .tab {
    --ui-background: #334155;
    display: inline-flex;
    padding: 10px;
    background-color: var(--ui-background);
    border-radius: 10px;
  }
  .tab .tab-item {
    display: inline-block;
    padding: 10px 30px;
    color: white;
    cursor: pointer;
    white-space: nowrap;
    border-radius: inherit;
    transition: all 0.2s linear;
  }
  .tab .tab-item + .tab-item {
    margin-left: 15px;
  }
  .tab .tab-item.active {
    background-color: white;
    color: var(--ui-background);
  }

  .form {
    display: none;
  }
  
  .form.active {
    display: block;
  }

</style>

<div class="boxed-form">
  <div class="boxed-tab">
    <div class="tab">
      <div class="tab-item active">Sinh viên</div>
      <div class="tab-item">Giảng viên</div>
    </div>
  </div>

  <div>
    <form id="form-st" class="form form-st active" action="#" method="POST">
      <h3>Thông tin sinh viên</h3>
      <input type="hidden" name="ty" value="ST">
    </form>
  </div>

  <div>
    <form id="form-te" class="form form-te" action="#">
      <h3>Thông tin giảng viên</h3>
      <input type="hidden" name="ty" value="ST">
    </form>
  </div>
</div>

<script>
const tabList   = document.querySelectorAll(".tab .tab-item");
const formList  = document.querySelectorAll(".form");

tabList.forEach((e, i, arr) => {
  e.addEventListener("click", () => {
    arr.forEach((e) => e.classList.remove("active"));
    formList.forEach((e) => e.classList.remove("active"));
    formList[i].classList.add("active");
    e.classList.add("active");
  })
})

</script>