<form method="POST" action="/models/inc/signin.inc.php" class="signin-form form">
    <div class="sigin-title">
      <span>Đăng nhập</sp>
    </div>
    <div class="form-group">
        <label for="account" class="form-label">
            <i class='bx bx-user'></i>
            <span>Tài khoản</span>
        </label>
        <input
            type="text"
            id="account"
            class="form-control"
            name="account"
            placeholder="Mã đăng nhập"
        >
        <div class="form-error"></div>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">
            <i class='bx bxs-key'></i>
            <span>Mật khẩu</span>
        </label>
        <input
            type="password"
            id="password"
            class="form-control"
            name="password"
            placeholder="********"
        >
        <div class="form-error"></div>
    </div>
    <div class="form-group">
        <label for="extra" class="form-label">
            <span>Chức vụ</span>
        </label>
        <select name="extra" id="extra" class="form-control">
            <?php foreach($extras as $each): ?>
                <option value="<?php echo $each['id']; ?>">
                    <?php echo $each['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="form-error"></div>
    </div>
    <div class="form-button">
        <button class="btn btn-green btn-full" type="submit" name="submit">Đăng nhập</button>
    </div>
</form>

<script>
    Validator({
        form: ".signin-form",
        rules: [
            Validator.isRequired("#account", "Tài khoản không được bỏ trống"),
            Validator.isRequired("#password", "Mật khẩu không được bỏ trống"),
            Validator.isRequired("#extra", "Chọn chức vụ"),
        ],
        formGroupSelector: ".form-group",
        errorSelector: ".form-error",
        classDanger: "error"
    });
</script>