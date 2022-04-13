<form id="form-st" class="form form-st active" action="?c=0&a=create-account" method="POST">
    <h3>Thông tin sinh viên</h3>
    <input type="hidden" name="ty" value="st">
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
    <div class="form-wrapp-group">
        <div class="form-group">
            <label for="course" class="form-label">
                <span>Khoá</span>
            </label>
            <select class="form-control" name="course" id="course">
                <?php foreach ($khoaHoc as $each) : ?>
                    <option value="<?php echo $each['id']; ?>"><?php echo $each['ten_khoa']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="payroll" class="form-label">
                <span>Lớp biên chế</span>
            </label>
            <select class="form-control" name="payroll" id="payroll">
                <?php foreach ($lopBienChe as $each) : ?>
                    <option value="<?php echo $each['id']; ?>"><?php echo $each['ten_lop']; ?></option>
                <?php endforeach; ?>
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