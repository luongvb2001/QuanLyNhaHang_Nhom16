<?php
    require_once('../controller/auth.php');
?>
<?php include_once("../model/db.php") ?>
<?php include_once("layout.php") ?>
<html>
    <head>
        <link rel="stylesheet" href="../css/home.css">
    </head>

    <body>

    <div class="container">
        <div id="container_1">
            <div>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Danh Sách Bàn</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Menu</button>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <!-- Content Danh sách bàn -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div style="height: 630px; overflow:auto;" class="btn_matrix" role="group" aria-label="Three Column Button Matrix">
                        <form action="" method="post">
                            <?php
                                $sql = "SELECT * FROM ban";
                                $result = $connect->query($sql);
                                while($row = $result->fetch_assoc()) {
                            ?>
                            <button id="ban<?php echo $row["SO_BAN"] ?>" style="margin:5px; " type="submit" class="btn btn-outline-primary btn_ban" value='<?php echo $row["SO_BAN"] ?>' name = "choose_ban">
                                <p style= "float: left; margin: 0;font-weight: bold">  <?php echo $row["SO_BAN"] ?> </p>
                                <?php 
                                    if($row["TRANG_THAI"] == 0){
                                        echo'<img style="width:30%; float: right " src="../images/tick-xanh.png" alt="Table" >';
                                    }
                                    else if($row["TRANG_THAI"] == 1){
                                        echo'<img style="width:30%; float: right " src="../images/tick-yellow.png" alt="Table" >';
                                    }
                                ?>
                                <img style="width:84px " src="../images/tablebusy.png" alt="Table" >
                            </button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>