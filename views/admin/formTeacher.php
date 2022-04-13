<form id="form-st" class="form form-st" action="?c=0&a=create-account" method="POST">
    <h3>Thông tin giảng viên</h3>
    <input type="hidden" name="ty" value="te">
    <div style="padding-top: 16px;" class="form-wrapp-group">
        <div class="form-group">
            <label for="firstname" class="form-label">
                <span>Họ</span>
            </label>
            <input type="text" class="form-control" name="firstname" id="firstname">
        </div>
        <div class="form-group">
            <label for="lastname" class="form-label">
                <span>Tên</span>
            </label>
            <input type="text" class="form-control" name="lastname" id="lastname">
        </div>
    </div>
    <div class="form-wrapp-group">
        <div class="form-group">
            <label for="birthday" class="form-label">
                <span>Ngày sinh</span>
            </label>
            <input type="date" class="form-control" name="birthday" id="birthday">
        </div>
        <div class="form-group">
            <label for="gender" class="form-label">
                <span>Giới tính</span>
            </label>
            <select class="form-control" name="gender" id="gender">
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="department" class="form-label">
            <span>Khoa</span>
        </label>
        <select class="form-control" name="department" id="department">
            <?php foreach ($khoa as $each) : ?>
                <option value="<?php echo $each['id']; ?>"><?php echo $each['ten_khoa']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-submit">
        <button name="submit" class="btn btn-green btn-full">Thêm</button>
    </div>
</form>