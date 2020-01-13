<?php require 'header.php';
require 'Db.php';  ?>

<?php 
function login($login, $password) {
    $db = Db::getConnection();

    $sql = 'SELECT * FROM `users` WHERE `login` = "'.$login.'" AND `pass` = "'.$password.'"';
    $result = $db->prepare($sql);
    $result->execute();

    if($result->rowCount()) {
        return true;
    }else{
        unset($_SESSION['login'],$_SESSION['password']);
        return false;
    }
}

if(isset($_POST['login']) && isset($_POST['password'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}

if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
    if(login($_SESSION['login'], $_SESSION['password'])) {
        header('Location: admin');
    }else{
        echo "Wrong login or password";
    }
}
?>
 
<div style="margin-left: 37%;"><h3>Login to admin panel</h3></div>
<div class="text-center form-container">   
    <form method="post" action="" class="justify-content-center">
        <label for="login">Login</label>
        <input class="float-right" type="text" id="input" name="login" required>
        <br>
        <label for="pass">Password</label>
        <input class="mt-3" type="password" id="input" name="password" required>
        <br>
        <button type="submit" name="submit" class="btn btn-dark mt-3 ml-5">login</button>
    </form>
</div>


<?php require 'footer.php'; ?>