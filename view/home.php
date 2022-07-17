<?php include_once("../model/db.php") ?>
<?php include_once("layout.php") ?>
<html>

<head>
    <link rel="stylesheet" href="../css/home.css">
    <script src="../js/home.js"></script>
</head>

<body>

    <div class="container-home">
        <div id="container_1">
            <div>
                <div>
                    <button onclick="show_DsBan()" class="btn_menu" >Danh Sách Bàn</button>
                    <button onclick="show_Menu()" class="btn_menu" >Menu</button>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <!-- Content Danh sách bàn -->
                <div id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div style="height: 630px; overflow:auto;" class="btn_matrix" role="group" aria-label="Three Column Button Matrix">
                        <form action="" method="post">
                            <?php
                            $sql = "SELECT * FROM ban";
                            $result = $connect->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <button id="ban<?php echo $row["SO_BAN"] ?>" style="margin:5px; " type="submit" class="btn_ban" value='<?php echo $row["SO_BAN"] ?>' name="choose_ban">
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
                <div style="overflow:auto; height: 630px; display: none" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button onclick="show_Menu1()">Khai vị</button>
                            <button onclick="show_Menu2()">Món chính</button>
                            <button onclick="show_Menu3()">Hoa quả</button>
                            <button onclick="show_Menu4()">Thức uống</button>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabMenuContent">
                        <div id="menu1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
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
                                                <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu2" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
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
                                                <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu3" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
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
                                                <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                                <td style="width :10%">
                                                    <button id="addMeal{{mon.ten_mon}}" onclick="addMealFunction('{{mon.ma_mon}}', '{{mon.ten_mon}}', '{{mon.gia}}')" class="add_mon">Add</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu4" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
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
                                                <td style="width :40%"><?php echo $row["GIA"]; ?></td>
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