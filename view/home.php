<?php
// require_once('../controller/auth.php');
?>
<?php include_once("../model/db.php") ?>
<?php include_once("layout.php") ?>
<html>

<head>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>

    <div class="container-home">
        <div id="container_1">
            <div>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Danh Sách Bàn</button>
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
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <button id="ban<?php echo $row["SO_BAN"] ?>" style="margin:5px; " type="submit" class="btn btn-outline-primary btn_ban" value='<?php echo $row["SO_BAN"] ?>' name="choose_ban">
                                    <p style="float: left; margin: 0;font-weight: bold"> <?php echo $row["SO_BAN"] ?> </p>
                                    <?php
                                    if ($row["TRANG_THAI"] == 0) {
                                        echo '<img style="width:30%; float: right " src="../images/tick-xanh.png" alt="Table" >';
                                    } else if ($row["TRANG_THAI"] == 1) {
                                        echo '<img style="width:30%; float: right " src="../images/tick-yellow.png" alt="Table" >';
                                    }
                                    ?>
                                    <img style="width:84px " src="../images/tablebusy.png" alt="Table">
                                </button>
                            <?php } ?>
                        </form>
                    </div>
                </div>

                <!-- danh sách thực đơn -->
                <div style="overflow:auto; height: 630px" class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-menu1" type="button" role="tab" aria-controls="nav-menu1" aria-selected="true">Khai vị</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-menu2" type="button" role="tab" aria-controls="nav-menu2" aria-selected="false">Món chính</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-menu3" type="button" role="tab" aria-controls="nav-menu3" aria-selected="false">Hoa quả</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-menu4" type="button" role="tab" aria-controls="nav-menu4" aria-selected="false">Thức uống</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-menudb" type="button" role="tab" aria-controls="nav-menudb" aria-selected="false">Đặc biệt</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabMenuContent">
                        <div class="tab-pane fade show active" id="nav-menu1" role="tabpanel" aria-labelledby="nav-menu1-tab">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <!-- <th scope="col" style="width :20%">Đơn vị</th> -->
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :10%">Chọn</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="style_menu">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 1";
                                            $result = $connect->query($menu);
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["DON_GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-menu2" role="tabpanel" aria-labelledby="nav-menu2-tab">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <!-- <th scope="col" style="width :20%">Đơn vị</th> -->
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :10%">Chọn</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="style_menu">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 2";
                                            $result = $connect->query($menu);
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["DON_GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-menu3" role="tabpanel" aria-labelledby="nav-menu3-tab">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <!-- <th scope="col" style="width :20%">Đơn vị</th> -->
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :10%">Chọn</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="style_menu">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 3";
                                            $result = $connect->query($menu);
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["DON_GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-menu4" role="tabpanel" aria-labelledby="nav-menu4-tab">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <!-- <th scope="col" style="width :20%">Đơn vị</th> -->
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :10%">Chọn</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="style_menu">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 4";
                                            $result = $connect->query($menu);
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                                <td style="width :40%"><?php echo $row["DON_GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>