<div class="wrapper">
    <div class="boxed">
      <h3 class="table-header">Kết quả học tập</h3>
      <?php if (!! $scoreInfos ): ?>
      <div class="table-wrapper">
          <table class="score-table">
              <tr class="score-table-heading">
                  <th style="min-width: 160px !important;">Tên môn học phần</th>
                  <th style="min-width: 90px !important;">Số tín chỉ</th>
                  <th style="min-width: 90px !important;">Chuyên cần</th>
                  <th style="min-width: 90px !important;">Điểm hệ 1</th>
                  <th style="min-width: 90px !important;">Điểm hệ 2</th>
                  <th style="min-width: 100px;">TB thường kì</th>
                  <th style="min-width: 100px !important;">Điểm thi</th>
                  <th style="min-width: 120px;">Điểm tổng kết</th>
                  <th style="min-width: 120px;">Thang điểm 4</th>
                  <th style="min-width: 110px !important;">Xếp loại</th>
              </tr>

              <?php foreach ($scoreInfos as $score) : ?>
              <tr class="score-row">
                  <td style="min-width: 120px;" class="score-property score-name"><?php echo $score->ten_mon_hoc_phan ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->so_tin_chi ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->diem_chuyen_can ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->he_so_1 ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->he_so_2 ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->diem_qua_trinh ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->diem_thi ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->diem_tong_ket ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->tong_ket_he_4 ?></td>
                  <td style="min-width: 120px;" class="score-property"><?php echo $score->xep_loai ?></td>
              </tr>
              <?php endforeach; ?>
          </table>
        </div>
        <?php endif; ?>
    </div>
</div>