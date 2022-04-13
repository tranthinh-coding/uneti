<style>
  .boxed {
    margin-top: 40px;
    max-height: calc(100vh - 220px);
    overflow: hidden;
  }
</style>
<?php if (!!$listStudent) : ?>
  <div class="container">
    <form action="/?c=1&a=save-score&de=<?php echo $depart; ?>&class=<?php echo $class; ?>" method="post">
      <div class="boxed">
        <h3 class="table-header">Nhập điểm sinh viên</h3>
          <?php if ($statusClass): ?>
            <button type="submit" name="submit" class="btn btn-red">Lưu điểm</button>
            <a href="/?c=1&a=finish&de=<?php echo $depart; ?>&class=<?php echo $class; ?>" class="btn btn-red">Kết thúc môn</a>
          <?php endif; ?>
        <style> 
          .table-wrapper {
            max-height: calc(100vh - 280px);
            overflow: scroll;
            padding-bottom: 100px;
            width: 100%;
          }
        </style>
        <div class="table-wrapper">
          <table class="score-table">
            <tr class="score-table-heading">
              <th style="min-width: 120px !important;">Mã sinh viên</th>
              <th style="min-width: 120px !important;">Họ</th>
              <th style="min-width: 120px !important;">Tên</th>
              <th style="min-width: 120px !important;">Điểm hệ 1</th>
              <th style="min-width: 120px !important;">Điểm hệ 2</th>
              <th style="min-width: 120px !important;">Điểm chuyên cần</th>
              <th style="min-width: 100px !important;">TB thường kì</th>
              <th style="min-width: 100px !important;">Điểm thi</th>
              <th style="min-width: 100px !important;">Điểm tổng kết</th>
              <th style="min-width: 100px !important;">Thang điểm 4</th>
              <th style="min-width: 100px !important;">Xếp loại</th>
            </tr>

            <?php foreach ($listStudent as $each) : ?>
              <tr class="score-row">
                <td name="id-<?php echo $each['ma_sinh_vien'] ?>" style="min-width: 120px;" class="score-property score-name"><?php echo $each['ma_sinh_vien'] ?></td>
                <td style="min-width: 120px;" class="score-property"><?php echo $each['ho'] ?></td>
                <td style="min-width: 120px;" class="score-property"><?php echo $each['ten'] ?></td>
                <td style="min-width: 120px;" class="score-property">
                  <?php if ($each['he_so_1'] || $each['he_so_1'] == '0' || !$statusClass): ?>
                    <span><?php echo $each['he_so_1'] ?></span>
                  <?php else: ?>
                    <input name="hs1-<?php echo $each['ma_sinh_vien'] ?>" class="form-control" type="text">
                  <?php endif; ?>
                </td>
                <td style="min-width: 120px;" class="score-property">
                  <?php if ($each['he_so_2'] || $each['he_so_2'] == '0' || !$statusClass): ?>
                    <span><?php echo $each['he_so_2'] ?></span>
                  <?php else: ?>
                    <input name="hs2-<?php echo $each['ma_sinh_vien'] ?>" class="form-control" type="text">
                  <?php endif; ?>
                </td>
                <td style="min-width: 120px;" class="score-property">
                  <?php if ($each['diem_chuyen_can'] || $each['diem_chuyen_can'] == '0' || !$statusClass): ?>
                    <span><?php echo $each['diem_chuyen_can'] ?></span>
                  <?php else: ?>
                    <input name="cc-<?php echo $each['ma_sinh_vien'] ?>" class="form-control" type="text">
                  <?php endif; ?>                
                </td>
                <td style="min-width: 100px;" class="score-property"><?php echo $each['diem_qua_trinh'] ?></td>
                <td style="min-width: 100px;" class="score-property">
                  <?php if ($each['diem_thi'] || $each['diem_thi'] == '0' || !$statusClass): ?>
                    <span><?php echo $each['diem_thi'] ?></span>
                  <?php else: ?>
                    <input name="thi-<?php echo $each['ma_sinh_vien'] ?>" class="form-control" type="text">
                  <?php endif; ?>
                </td>
                <td style="min-width: 100px;" class="score-property"><?php echo $each['diem_tong_ket'] ?></td>
                <td style="min-width: 100px;" class="score-property"><?php echo $each['tong_ket_he_4'] ?></td>
                <td style="min-width: 100px;" class="score-property"><?php echo $each['xep_loai'] ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </form>
  </div>
<?php endif; ?>