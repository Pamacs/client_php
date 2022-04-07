<?php require_once 'base.php'; generate_head("Pamacs", ['dashboard']); ?>
<body>
    <?php generate_sidebar(); ?>
    <main>
        <span id="header">Containers</span>
        <div id="containers">
            <?php

            session_start();
            // I'll implement accesstoken validation later
            require_once '../util/req_util.php';

            $res = sendReq("containers/get_containers", ReqMethod::GET, true, [], $_SESSION['access_token']);

            if (count($res['data']['containers']) == 0) {
                echo '<img src="/image/no_containers.png"/>';
            }
            ?>
        </div>
    </main>
</body>
<?php end_dom(); ?>