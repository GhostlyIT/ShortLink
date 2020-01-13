<?php require 'header.php';
require 'Db.php';

//redirection
$shortUrl = $_GET['url'];
if(isset($shortUrl)){
    $db = Db::getConnection();
    $sql = 'SELECT `url` FROM `short` WHERE `short_key` = "'.$shortUrl.'"';
    $result = $db->prepare($sql);
    $result->execute();
    $redirect = $result->fetch()['url'];
    header('Location: '.$redirect);
    exit;
} ?>

<div class="text-center form-container">    
<form method="post" action="" class="justify-content-center">
    <label for="url">Paste your link:</label>
    <input type="text" id="input" name="link">
    <button type="button" id="submit" name="submit" class="btn btn-dark ml-2">Submit</button>
</form>
<div id="result-form">
        
</div>
</div>


<?php require 'footer.php'; ?>