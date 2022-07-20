<?php include_once("../model/db.php") ?>
<?php include_once("layout.php") ?>
<?php 
    require('../controller/homeController.php');  
    $KHs = get_KH();
    $choose_ban = "";
    $trang_thai_ban = "";
    if(isset($_POST['choose_ban'])){
        $choose_ban = $_POST['choose_ban'];
    }
    
    $HD_bans = get_HD_ban($choose_ban); 
    foreach ($HD_bans as $HD_ban) :
        $ma_HD = $HD_ban["MA_HOA_DON"];
        $don_gia = $HD_ban["DON_GIA"];
    endforeach;

    if(isset($_POST['add_hoa_don'])){
        $So_ban = $_POST["add_hoa_don"];
        $Kh = $_POST["khach_Hang"];
        $mkh = get_KH_bysdt($Kh);
        $tong_tien =0;
        for ($x = 0; $x <= sizeof($_POST["so_luongs"]); $x++) {
            $tong_tien+= $_POST["so_luongs"][$x]*$_POST["gia_mons"][$x];

        }
        $ma_hoa_don=add_hoadon($mkh,$tong_tien, $So_ban);
        for ($i = 0; $i < sizeof($_POST["so_luongs"]); $i++) {
            add_datmon($ma_hoa_don,$_POST["ten_mons"][$i] ,$_POST["so_luongs"][$i]);

        }
        update_ban_1($So_ban, $ma_hoa_don);
        header("Location: .?choose_ban=$So_ban");
        header("Location: ./home.php");
    }

    $ban = get_ban($choose_ban);
    $trang_thai_ban = $ban["TRANG_THAI"];

    ?>
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
                                <?php
                                    if($row["DEL"]==0){  ?>
                                    <button id="ban<?php echo $row["SO_BAN"] ?>" style="margin:5px; " type="submit" class="btn_ban" value='<?php echo $row["SO_BAN"] ?>' name="choose_ban">
                                    <p style="float: left; margin: 0;font-weight: bold"> <?php echo $row["SO_BAN"] ?> </p>
                                        <?php 
                                            if ($row["TRANG_THAI"] == 0 ) {
                                                echo '<img style="width:30%; float: right " src="../images/tick-xanh.png" alt="Table" >';
                                            } else if ($row["TRANG_THAI"] == 1) {
                                                echo '<img style="width:30%; float: right " src="../images/tick-yellow.png" alt="Table" >';
                                            } ?>
                                        <img style="width:84px " src="../images/tablebusy.png" alt="Table">
                                     <?php } ?>
                                </button>
                            <?php } ?>
                        </form>
                    </div>
                </div>

                <!-- danh sách thực đơn -->
                <div style="overflow:auto; height: 630px; display: none" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div>
                        <div>
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
                                        <th style="width :10%">Mã</th>
                                        <th style="width :40%">Tên</th>
                                        <th style="width :20%">Giá</th>
                                        <th style="width :30%">Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 1";
                                        $result = $connect->query($menu);
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                            <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                            <td style="width :20%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :30%">
                                            <?php if ($trang_thai_ban == 0){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
                                            <?php } else if ($trang_thai_ban == 1){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon" disabled>Add</button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" style="display: none">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :30%">Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 2";
                                        $result = $connect->query($menu);
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                            <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                            <td style="width :20%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :30%">
                                            <?php if ($trang_thai_ban == 0){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
                                            <?php } else if ($trang_thai_ban == 1){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon" disabled>Add</button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="menu3" style="display: none">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :30%">Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 3";
                                        $result = $connect->query($menu);
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                            <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                            <td style="width :20%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :30%">
                                            <?php if ($trang_thai_ban == 0){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
                                            <?php } else if ($trang_thai_ban == 1){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon" disabled>Add</button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="menu4" style="display: none">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :30%">Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $menu = "SELECT * FROM mon_an WHERE mon_an.MA_MENU = 4";
                                        $result = $connect->query($menu);
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td style="width :10%"><?php echo $row["MA_MON"]; ?></td>
                                            <td style="width :40%"><?php echo $row["TEN_MON"]; ?></td>
                                            <td style="width :20%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :30%">
                                            <?php if ($trang_thai_ban == 0){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
                                            <?php } else if ($trang_thai_ban == 1){ ?>
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon" disabled>Add</button>
                                            <?php } ?>
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

        <div id="container_2">
    <div>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
 
      </div>
    </div>

    <div style="padding: 15px; height:630px;overflow:auto" class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active" id="nav-home-bill" role="tabpanel" aria-labelledby="nav-home-bill-tab"> 
        <form id="homeForm" name="homeForm" action="" method="post" onsubmit=" return validateHomeForm()">
          <input hidden id="ipid" name="ipname" value="69">
          <div class="row">
            <div class="col">
              <p style="font-weight: bold;margin: 3px" name = "so_ban_chon" value = "">Số bàn : <?php echo $choose_ban?> </p>
                <div style ="display: flex">
                <p style="font-weight: bold;margin: 3px">Khách hàng: </p>
                <input list="Khach_Hang" name = "khach_Hang" value="">
                <datalist id="Khach_Hang">
                <?php foreach ($KHs as $KH) : ?>
                            <?php if($KH['DEL'] == 0) { ?>
                                <option value="<?= $KH['TEN_KHACH_HANG']; ?> - <?= $KH['SO_DIEN_THOAI']; ?>">
                            <?php } endforeach; ?>
                </datalist> 
                </div>
            </div>
            <div class="col">
              <p style="font-weight: bold;margin: 3px" name = "ma_hoa_don" value = "<?php echo $ma_HD; ?>">Mã hóa đơn : <?php echo $ma_HD; ?></p>
            </div>
          </div>
          <table style="margin: 0" class="table">
            <thead>
              <tr>
                <th style="width :30%" scope="col">Tên</th>
                <th style="width :20%" scope="col">Số lượng</th>
                <th style="width :20%" scope="col"> Đơn Giá </th>
                <th style="width :20%" scope="col">Thành tiền</th>
                <th style="width :10%" scope="col"></th>
              </tr>
            </thead>
          </table>    
          <div style="height: 230px; overflow:auto;" >
            <table class="table">
              <tbody  id="bang_hoa_don">
                  <?php foreach ($HD_bans as $HD_ban) : ?>
                    <tr >
                                <td style="width :30%" class="ten__mon"><?php echo $HD_ban["TEN_MON"]; ?></td>
                                <td style="width :20%" class="ten__mon"><?php echo $HD_ban["SO_LUONG"]; ?></td>
                                <td style="width :20%" class="ten__mon"><?php echo $HD_ban["GIA"]; ?></td>
                                <td style="width :20%" class="ten__mon"><?php echo $HD_ban["GIA"]*$HD_ban["SO_LUONG"]; ?></td>
                                <td style="width :10%"></td>
                  </tr>     
                  <?php  endforeach; ?>            
              </tbody>
            </table>
          </div>
          <div style="height: 190px; margin-top: 15px">
            <div style="font-weight: bold; padding-left:65%" class="tong_tien">Tổng tiền:
            <?php echo $don_gia; ?>
            </div>
            
            <?php
                if ($trang_thai_ban == 0) {
                    echo '<button onclick="saveHFunction()" class="save_del_pay" type="submit" name="add_hoa_don" id="luuhoadon1">Lưu hóa đơn</button>
                    <button class="save_del_pay" type="submit" name="remove_hoa_don" id="xoahoadon1" disabled>Xóa hóa đơn </button>
                    <button class="save_del_pay" type="submit" name="pay_hoa_don" id="thanhtoan1" disabled>Thanh toán</button>';
                } else if ($trang_thai_ban == 1) {
                    echo '<button onclick="saveHFunction()" class="save_del_pay" type="submit" name="add_hoa_don" id="luuhoadon1" disabled>Lưu hóa đơn</button>
                    <button class="save_del_pay" type="submit" name="remove_hoa_don" id="xoahoadon1" >Xóa hóa đơn</button>
                    <button class="save_del_pay" type="submit" name="pay_hoa_don" id="thanhtoan1">Thanh toán</button>';
                }
            ?>
            
          </div>
        </form>
      </div>
    </div>             
  </div>
</div>

</body>

</html>