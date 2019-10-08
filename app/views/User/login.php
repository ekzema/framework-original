<h1>Войти</h1>

<div class="row">
    <div class="col-md-6">
        <form method="post" action="/user/login">
            <div class="form-group">
                <label for="loginInput">Login address</label>
                <input type="text" name="login"  class="form-control" id="loginInput" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="passwordInput">Password</label>
                <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']) ?>
    </div>
</div>