<div class="boxed-form">
    <div>
        <form action="/?c=0&a=ud" method="post" class="form">
            <div class="form-wrapp-group">
                <div class="form-group">
                    <label class="form-label" for="teacher">
                        <span>Giảng viên</span>
                    </label>
                    <select class="form-control" name="teacher" id="teacher">
                        <?php foreach ($giangVien as $each) : ?>
                            <option value="<?php echo $each['id']; ?>">
                                <?php echo $each['ho'] .  ' ' . $each['ten']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="class-section">
                        <span>Lớp học phần</span>
                    </label>
                    <select class="form-control" name="class-section" id="class-section">
                        <?php foreach ($lopHocPhan as $each) : ?>
                            <option value="<?php echo $each['id']; ?>">
                                <?php echo $each['ten_mon'] . " " . $each['ten_lop']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-submit">
                <button name="submit" class="btn btn-green">Đồng ý</button>
            </div>
        </form>
    </div>
</div>