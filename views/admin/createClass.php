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
</style>
<div class="boxed-form">
    <div>
        <form id="form-class" class="form form-class" action="?c=0&a=create-class" method="POST">
            <h3>Tạo lớp học phần</h3>
            <div style="padding-top: 16px;" class="form-wrapp-group">
                <div class="form-group">
                    <label for="teacher" class="form-label">
                        <span>Giảng viên</span>
                    </label>
                    <select class="form-control" name="teacher" id="teacher">
                        <option value=""></option>
                        <?php foreach ($giangVien as $each) : ?>
                            <option value="<?php echo $each['id']; ?>"><?php echo $each['ho'] .  ' ' . $each['ten']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-wrapp-group">
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
                <div class="form-group">
                    <label for="subject" class="form-label">
                        <span>Môn học phần</span>
                    </label>
                    <select class="form-control" name="subject" id="subject">
                        <?php foreach ($monHocPhan as $each) : ?>
                            <option value="<?php echo $each['id']; ?>"><?php echo $each['ten_mon_hoc_phan']; ?></option>
                        <?php endforeach; ?>
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
            <div class="form-submit">
                <button name="submit" class="btn btn-green btn-full">Thêm</button>
            </div>
        </form>
    </div>
</div>