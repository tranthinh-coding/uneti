<style>
    .wrapper {
        max-height: calc(100vh - 80px);
    }
    .boxed {
        margin-top: 40px;
        max-height: calc(100vh - 80px);
        overflow: hidden;
    }
</style>

<div class="wrapper" style="width: 100%;">
    <div class="boxed container">
        <h3 class="table-header">Danh sách sinh viên</h3>
        <?php if (!! $list ): ?>
            <style>
            .table-wrapper {
                max-height: calc(100vh - 80px);
                overflow-y: scroll;
                padding-bottom: 100px;
            }
            </style>
            <div class="table-wrapper hide-scrollbar">
                <table class="te-table">
                    <tr class="te-table-heading">
                        <th style="min-width: 80px !important;">Mã</th>
                        <th style="min-width: 80px !important;">Họ</th>
                        <th style="min-width: 80px !important;">Tên</th>
                        <th style="min-width: 100px !important;">Giới tính</th>
                        <th style="min-width: 80px !important;">Ngày sinh</th>
                        <th style="min-width: 100px !important;">Khoá</th>
                        <th style="min-width: 100px !important;">Tên lớp</th>
                        <th style="min-width: 100px !important;">Tên khoa</th>
                    </tr>

                    <?php foreach ($list as $student) : ?>
                    <tr class="te-row">
                        <td style="min-width: 80px;" class="te-property"><?php echo $student['id'] ?></td>
                        <td style="min-width: 80px; text-align: left;" class="te-property"><?php echo $student['ho'] ?></td>
                        <td style="min-width: 80px;" class="te-property"><?php echo $student['ten'] ?></td>
                        <td style="min-width: 100px;" class="te-property"><?php echo $student['gioi_tinh'] === '1' ? 'Nam' : 'Nữ'; ?></td>
                        <td style="min-width: 100px;" class="te-property"><?php echo $student['ngay_sinh'] ?></td>
                        <td style="min-width: 100px;" class="te-property"><?php echo $student['ten_khoa'] ?></td>
                        <td style="min-width: 100px;" class="te-property"><?php echo $student['ten_lop'] ?></td>
                        <td style="min-width: 100px;" class="te-property"><?php echo $student['khoa'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>