<h1>Регистрация</h1>

<div class="row">
    <div class="col-md-6">
        <form method="post" action="/user/signup">
            <div class="form-group">
                <label for="loginInput">Login address</label>
                <input type="text" name="login"  class="form-control" id="loginInput" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="nameInput">Name address</label>
                <input type="text" name="name" class="form-control" id="nameInput" placeholder="Name" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="emailInput">Email address</label>
                <input type="text" name="email" class="form-control" id="emailInput" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ?>">
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
