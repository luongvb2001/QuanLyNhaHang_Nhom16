<?php include_once("../model/db.php") ?>
<?php include_once("layout.php") ?>
<?php 
    require('../controller/homeController.php');  
    $KHs = get_KH();
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
                                        <th scope="col" style="width :10%">Mã</th>
                                        <th scope="col" style="width :40%">Tên</th>
                                        <th scope="col" style="width :20%">Giá</th>
                                        <th scope="col" style="width :10%">Chọn</th>
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
                                            <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :10%">
                                                <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
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
                                        <th scope="col" style="width :10%">Chọn</th>
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
                                            <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :10%">
                                            <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
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
                                        <th scope="col" style="width :10%">Chọn</th>
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
                                            <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :10%">
                                            <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
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
                                        <th scope="col" style="width :10%">Chọn</th>
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
                                            <td style="width :40%"><?php echo $row["GIA"]; ?></td>
                                            <td style="width :10%">
                                            <button id="addMeal<?php echo $row["TEN_MON"] ?>" onclick="addMealFunction('<?php echo $row["MA_MON"] ?>', '<?php echo $row["TEN_MON"] ?>', '<?php echo $row["GIA"] ?>')" class="add_mon">Add</button>
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
        <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#nav-home-bill" type="button" role="tab" aria-controls="nav-home-bill" aria-selected="true">Hóa đơn</button>
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-home-booking" type="button" role="tab" aria-controls="nav-home-booking" aria-selected="false">Lịch đặt</button>
      </div>
    </div>
    <div style="padding: 15px; height:630px;overflow:auto" class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home-bill" role="tabpanel" aria-labelledby="nav-home-bill-tab"> 
        <form id="homeForm" name="homeForm" action="" method="post" onsubmit=" return validateHomeForm()">
          <input hidden id="ipid" name="ipname" value="69">
          <div class="row">
            <div class="col">
              <p style="font-weight: bold;margin: 3px">Số bàn : <?php echo $row["SO_BAN"] ?> </p>
              <p style="font-weight: bold;margin: 3px">Họ tên: {{hotenkhachhang}}</p>
                                              <div style ="display: flex">
                                <p style="font-weight: bold;margin: 3px">Khách hàng: </p>
                                <input list="Khach_Hang">
                                <datalist id="Khach_Hang">
                                <?php foreach ($KHs as $KH) : ?>
                                            <?php if($KH['DEL'] == 0) { ?>
                                                <option value="<?= $KH['TEN_KHACH_HANG']; ?> -<?= $KH['SO_DIEN_THOAI']; ?>">
                                            <?php } endforeach; ?>
                                </datalist> 
                                </div>
            </div>
            <div class="col">
              <p style="font-weight: bold;margin: 3px">Mã hóa đơn : {{hoadon.ma_hoa_don}}</p>
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
              <?php
                    $menu = "SELECT mon_an.TEN_MON, dat_mon.SO_LUONG, mon_an.GIA FROM dat_mon, mon_an WHERE dat_mon.MA_MON = mon_an.MA_MON" ;
                    $result = $connect->query($menu);
                    while ($row = $result->fetch_assoc()) {
                ?>
                  <tr >
                    <!-- <td style="width :30%" class="ten__mon"><?php echo $row["TEN_MON"]; ?></td>
                    <td style="width :20%" class="so__luong"><?php echo $row["SO_LUONG"]; ?></td>
                    <td style="width :20%" class="gia__mon"><?php echo $row["GIA"]; ?></td>
                    <td style="width :20%" class="thanh__tien"> <?php echo $row["GIA"]*$row["SO_LUONG"]; ?></td>
                    <td style="width :10%"></td> -->
                  </tr>   
                  <?php } ?>                   
              </tbody>
            </table>
          </div>
          <div style="height: 190px; margin-top: 15px">
            <div style="font-weight: bold; padding-left:65%" class="tong_tien">Tổng tiền: 
              {% if hoadon.tre_em == "yes"%}
                <input hidden name="tt" value="{{tong_tien_tre_em}}"> 
                  {{tong_tien_tre_em}}
              {% else %}
                {{hoadon.don_gia}}
                <input hidden name="tt" value="{{hoadon.don_gia}}"> 
              {% endif %}
            </div>
            <button onclick="saveHFunction()" class="save_del_pay" type="submit" value='{{so_ban}}' name="add_hoa_don" id="luuhoadon1">Lưu hóa đơn</button>
            <button class="save_del_pay" type="submit" value='{{hoadon.ma_hoa_don}}' name="remove_hoa_don" id="xoahoadon1">Xóa hóa đơn</button> 
            <button class="save_del_pay" type="submit" value='{{hoadon.ma_hoa_don}}' name="pay_hoa_don" id="thanhtoan1">Thanh toán</button>
          </div>
        </form>
      </div>
    </div>             
  </div>
</div>

    </div>
</body>

</html>
