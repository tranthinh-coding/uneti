<style>
    .boxed-form {
        padding: 12px;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: start;
        flex-direction: column;
        margin-top: 40px;
    }

    .boxed-tab {
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
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

    .tab .tab-item+.tab-item {
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
        <?php require_once "views/admin/formStudent.php"; ?>
    </div>
    
    <div>
        <?php require_once "views/admin/formTeacher.php"; ?>
    </div>
</div>

<script>
    const tabList = document.querySelectorAll(".tab .tab-item");
    const formList = document.querySelectorAll(".form");

    tabList.forEach((e, i, arr) => {
        e.addEventListener("click", () => {
            arr.forEach((e) => e.classList.remove("active"));
            formList.forEach((e) => e.classList.remove("active"));
            formList[i].classList.add("active");
            e.classList.add("active");
        })
    })
</script>