<h1>Регистрация</h1>

<div class="row">
    <div class="col-md-6">
        <form method="post" action="/user/signup">
            <div class="form-group">
                <label for="loginInput">Login address</label>
                <input type="text"name="login"  class="form-control" id="loginInput" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="nameInput">Name address</label>
                <input type="text" name="name" class="form-control" id="nameInput" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="emailInput">Email address</label>
                <input type="text" name="email" class="form-control" id="emailInput" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="passwordInput">Password</label>
                <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
