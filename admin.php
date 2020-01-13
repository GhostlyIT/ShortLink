<?php require 'header.php';
require 'Db.php'; ?>
<?php
if(isset($_SESSION['login']) && isset($_SESSION['password'])){ ?>
    <?php
        function adminPage() {
            $db = Db::getConnection();

            $sql = 'SELECT * FROM `short` ORDER BY `id` DESC';
            $result = $db->prepare($sql);
            $result->execute();
            
            if($result->rowCount()){
                return $result;
            }else{
                return false;
            }
        }
        $adminPage = adminPage();
        if($adminPage){ ?>
            <h3 style="margin-left: 37%;">Added links</h3>
            <table style="word-break: break-all;" class="center-block table-striped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>Original link</th>
                        <th>Shortened link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
            while ($row = $adminPage->fetch()){ ?>
                <tr>
                    <td style="width: 25%;"><?php echo $row['url']; ?></td>
                    <td style="width: 25%;"><?php echo $row['short_key']; ?></td>
                    <td style="width: 25%;"><button class="text-danger delete" type="button" value="<?php echo $row['id']?>">Delete</button></td>
                </tr>          
          <?php }
                ?>
            </table>
  <?php }else{ ?>
            <div style="margin-left: 37%;"><h3>No links have been added.</h3></div>
       <?php }
    ?>
<?php }else{ ?>
    <h3 style="margin-left: 37%;">You don't have permissions.</h3>
<?php } ?>



<?php require 'footer.php'; ?>