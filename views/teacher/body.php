<div class="wrapper">
  <div class="container">
    <form class="form" action="/?c=1&a=view">
      <input type="hidden" name="c" value="1" hidden>
      <input type="hidden" name="a" value="view" hidden>
      <div class="form-wrapp-group">
        <div class="form-group">
          <label class="form-label" for="department">Khoa</label>
          <select class="form-control" name="de" id="department">
            <option value="-1"></option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label" for="class">Lớp học phần</label>
          <select class="form-control" name="class" id="class">
            <option value="-1"></option>
          </select>
        </div>
      </div>
      <div class="form-button" style="margin-top: -20px;">
        <button class="btn btn-green btn-full" class="form-submit">Tìm</button>
      </div>
    </form>
  </div>

  <?php if(in_array($action, [
              'view',
            'find-bad-score',
            'find-good-score'
      ])):
  ?>
      <?php require_once "views/teacher/tableStudentScore.php"; ?>
  <?php endif; ?>
</div>

<?php if (isset($res) && !strpos($res, 'error')): ?>
<script>
  const department = document.getElementById("department");
  const className = document.getElementById("class");

  const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
  });
  const classId = params.class;
  const depart = params.de;

  function changeOptionClassName(arr) {
    let classOption = '<option value="-1"></option>';
    if (arr) {
      arr.forEach(e => {  
        classOption += `<option ${e['ma_lop'] == classId && 'selected'} value="${e['ma_lop']}">${e['ten_mon']} ${e['ten_lop']}</option>`;
      })
    }
    className.innerHTML = classOption;
  }

  function generalOption(element, object, keyOfValue) {
    const id = Object.keys(object);
    let strOption = '<option value="-1"></option>';
    id.forEach(e => {
      strOption += `<option value="${object[e][0][keyOfValue]}">${e}</option>`;
    })
    element.innerHTML = strOption;
  }

  let a = <?php echo($res); ?>;
  let objGroupDepart = a.reduce((obj, currData) => {
    if (!obj[currData['ma_khoa']] && obj[currData['ma_khoa']] != 0) {
      obj[currData['ma_khoa']] = [];
    } 
    obj[currData['ma_khoa']].push(currData);
    return obj;
  }, {})

  console.log(objGroupDepart);

  const departmentId = Object.keys(objGroupDepart);
  let departMentOption = '<option value="-1"></option>';
  departmentId.forEach(e => {
    departMentOption += `<option ${objGroupDepart[e][0]['ma_khoa'] == depart && 'selected'} value="${e}">${objGroupDepart[e][0]['ten_khoa']}</option>`;
  })
  department.innerHTML = departMentOption;

  if (depart || depart == 0) changeOptionClassName(objGroupDepart[depart])

  department.addEventListener('change', (event) => changeOptionClassName(objGroupDepart[event.target.value]))
  
</script>
<?php endif; ?>