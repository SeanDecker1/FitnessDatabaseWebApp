<div class="col-sm-1"></div> 

<div class="col-sm-10">

    <h2 class="centerHeader">Login</h2>

    <hr />

    <!--- Begins the form to login the user --->
    <form name="loginForm" action="../../views/testLogin.php?action=login" method="POST">

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <button type="submit" id="loginButton" class="btn blueButton">Login</button>

    <hr/>

    </form>
    <!--- Ends the form to login the user --->

</div>

<div class="col-sm-1"></div>