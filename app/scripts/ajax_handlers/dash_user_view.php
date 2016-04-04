<?php
    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 3/9/2016
     * Time: 5:07 PM
     */

    require_once('app/init.php');

    if(isset($_POST['method'])=== true && empty($_POST['method'])===false){

        $method = trim($_POST['method']);
        if($method === 'fetch') {
            $active_users = $ajaxHandle->fetchData($auth->getUserInfo('council_id'));
            foreach ($active_users as $user) {
                ?>
                <tr>
                    <td><?php echo $user['usr_userName']; ?></td>
                    <td><?php echo $user['usr_login_active']; ?></td>
                </tr>
                <?php
            }
        }
    }

?>

