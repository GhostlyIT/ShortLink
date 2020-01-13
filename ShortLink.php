<?php
require 'Db.php';
        
        // generating short link
        $letters='QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890';
        $count = strlen($letters);
        $intval = time();
        $short_key = '';
        for($i=0;$i<4;$i++) {
            $last=$intval%$count;
            $intval=($intval-$last)/$count;
            $short_key.=$letters[$last];
        }
        $rand = random_int(10, 99);
        $key = $short_key.$rand;
        if(isset($_POST['link'])) {
        $db = Db::getConnection();

        $link = $_POST['link'];
        $sql = 'INSERT INTO `short` (`id`, `url`, `short_key`) VALUES (NULL, "'.$link.'", "'.$key.'");';
        $result = $db->prepare($sql);
        $result->execute();
        echo $key;
        }
?>