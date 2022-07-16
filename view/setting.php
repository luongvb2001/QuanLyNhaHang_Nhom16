<!-- <?php include_once("layout.php") ?> -->

<?php 
    require('../model/db.php');
    require('../controller/settingController.php');  
    $member = get_Member();
    $MN1 = get_MonAn_MN1();
    $MN2 = get_MonAn_MN2();
    $MN3 = get_MonAn_MN3();
    $MN4 = get_MonAn_MN4();
?>
<head>
    <link rel="stylesheet" href="../css/setting.css">
    <script src="../js/setting.js"></script>
</head>
<body>
    <div class="table">
    <table>
        <thead>
            <tr>
                <th>Tên Menu</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Món phụ</td>
                <td><button onclick="showTable1()">Edit</button></td>
            </tr>
            <tr>
                <td>Món chính</td>
                <td><button onclick="showTable2()">Edit</button></td>
            </tr>
            <tr>
                <td>Đồ uống</td>
                <td><button onclick="showTable3()">Edit</button></td>
            </tr>
            <tr>
                <td>Hoa Quả</td>
                <td><button onclick="showTable4()">Edit</button></td>
            </tr>
        </tbody>
    </table>


    <?php
        if(!empty($_POST["ma_mon_del"])){
            $ma_mon_del = $_POST["ma_mon_del"];
            delete_MonAn($ma_mon_del);
            header("Location: .?ma_mon_del=$ma_mon_del");
            header("Location: ./setting.php");
        }
    ?>

    <?php 
        if(!empty($_POST["add_mon"]) && $_POST["Gia"] >0 ){
            $ten_mon = $_POST["Ten_mon"];
            $gia = $_POST["Gia"];
            $ma_menu = $_POST["add_mon"];
            add_MonAn($ten_mon, $gia, $ma_menu );
            header("Location: ./setting.php");
        }
    ?>
    <?php 
        if(!empty($_POST["ma_mon_up"])){
            $ma_mon_up = $_POST["ma_mon_up"];
            $gia_mon_up = $_POST["gia_mon"];
            update_gia($ma_mon_up, $gia_mon_up);
            header("Location: ./setting.php");
        }
    ?>

    <?php 
        if(isset($_POST["Save_Mb"])){
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $birthday = $_POST["birthday"];
            $sex = $_POST["sex"];
            update_member($fullname, $email, $birthday, $sex);
            header("Location: ./setting.php");
        }
    ?>

    <form action="" method="post">
        <table id="mon_phu">
            <thead>
                <tr>
                    <th class="contener_th">Tên Món</th>
                    <th class="contener_th">Giá Món</th>
                    <th class="contener_short">Xóa</th>
                    <th class="contener_short">Save</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><input placeholder="Tên Món" name="Ten_mon"/></td>
                <td><input placeholder="Giá" name="Gia"/></td>
                <td></td>
                <td><button type="submit" name="add_mon" value="1">Save</button></td>
            </tr>
            </form>
            <tr>
                <?php if(!empty($MN1)) { ?>
                <?php foreach ($MN1 as $mn1) : ?>
                <?php if($mn1['DEL'] == 0) { ?>
                    <form action="" method="post">
                    <div class="list__item">
                        <td class="contener_th" name = "ma_mon" value="<?php echo $mn1['MA_MON'] ?>"><?php echo $mn1['TEN_MON'] ?></td>
                        <td class="contener_th"><input name = "gia_mon" value="<?php echo $mn1['GIA'] ?>" type="number" step = "1000" min="0"/></td>
                    </div>
                    <div class="list__removeItem">  
                        <td class="contener_short"><button type = "submit"name="ma_mon_del" value="<?= $mn1['MA_MON'] ?>">❌</button></td>
                        <td class="contener_short"><button type = "submit"name="ma_mon_up" value="<?= $mn1['MA_MON'] ?>">Save</button></td>
                    </div>
                    </tr>
                    </form>
                <?php } endforeach; ?>           
                <?php } else { ?>
                    <p>CHƯA CÓ KHÁCH HÀNG NÀO</p>
                <?php } ?>
            </tbody>
        </table>
 

    <form action="" method="post">
        <table id="mon_chinh">
            <thead>
                <tr>
                    <th class="contener_th">Tên Món</th>
                    <th class="contener_th">Giá Món</th>
                    <th class="contener_short">Xóa</th>
                    <th class="contener_short">Save</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><input placeholder="Tên Món" name="Ten_mon"/></td>
                <td><input placeholder="Giá" name="Gia"/></td>
                <td></td>
                <td><button type="submit" name="add_mon" value="2">Save</button></td>
            </tr>
            </form>
            <tr>
                <?php if(!empty($MN2)) { ?>
                <?php foreach ($MN2 as $mn2) : ?>
                <?php if($mn2['DEL'] == 0) { ?>
                    <form action="" method="post">
                    <div class="list__item">
                        <td class="contener_th" name = "ma_mon" value="<?php echo $mn2['MA_MON'] ?>"><?php echo $mn2['TEN_MON'] ?></td>
                        <td class="contener_th"><input name = "gia_mon" value="<?php echo $mn2['GIA'] ?>" type="number" step = "1000" min="0"/></td>
                    </div>
                    <div class="list__removeItem">  
                        <td class="contener_short"><button type = "submit"name="ma_mon_del" value="<?= $mn2['MA_MON'] ?>">❌</button></td>
                        <td class="contener_short"><button type = "submit"name="ma_mon_up" value="<?= $mn2['MA_MON'] ?>">Save</button></td>
                    </div>
                    </tr>
                    </form>
                <?php } endforeach; ?>           
                <?php } else { ?>
                    <p>CHƯA CÓ KHÁCH HÀNG NÀO</p>
                <?php } ?>
            </tbody>
        </table>

    <form action="" method="post">
        <table id="do_uong">
            <thead>
                <tr>
                    <th class="contener_th">Tên Món</th>
                    <th class="contener_th">Giá Món</th>
                    <th class="contener_short">Xóa</th>
                    <th class="contener_short">Save</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><input placeholder="Tên Món" name="Ten_mon"/></td>
                <td><input placeholder="Giá" name="Gia"/></td>
                <td></td>
                <td><button type="submit" name="add_mon" value="3">Save</button></td>
            </tr>
            </form>
            <tr>
                <?php if(!empty($MN3)) { ?>
                <?php foreach ($MN3 as $mn3) : ?>
                <?php if($mn3['DEL'] == 0) { ?>
                    <form action="" method="post">
                    <div class="list__item">
                        <td class="contener_th" name = "ma_mon" value="<?php echo $mn3['MA_MON'] ?>"><?php echo $mn3['TEN_MON'] ?></td>
                        <td class="contener_th"><input name = "gia_mon" value="<?php echo $mn3['GIA'] ?>" type="number" step = "1000" min="0"/></td>
                    </div>
                    <div class="list__removeItem">  
                        <td class="contener_short"><button type = "submit"name="ma_mon_del" value="<?= $mn3['MA_MON'] ?>">❌</button></td>
                        <td class="contener_short"><button type = "submit"name="ma_mon_up" value="<?= $mn3['MA_MON'] ?>">Save</button></td>
                    </div>
                    </tr>
                    </form>
                <?php } endforeach; ?>           
                <?php } else { ?>
                    <p>CHƯA CÓ KHÁCH HÀNG NÀO</p>
                <?php } ?>
            </tbody>
        </table>

    <form action="" method="post">
        <table id="hoa_qua">
            <thead>
                <tr>
                    <th class="contener_th">Tên Món</th>
                    <th class="contener_th">Giá Món</th>
                    <th class="contener_short">Xóa</th>
                    <th class="contener_short">Save</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><input placeholder="Tên Món" name="Ten_mon"/></td>
                <td><input placeholder="Giá" name="Gia"/></td>
                <td></td>
                <td><button type="submit" name="add_mon" value="4">Save</button></td>
            </tr>
            </form>
            <tr>
                <?php if(!empty($MN4)) { ?>
                <?php foreach ($MN4 as $mn4) : ?>
                <?php if($mn4['DEL'] == 0) { ?>
                    <form action="" method="post">
                    <div class="list__item">
                        <td class="contener_th" name = "ma_mon" value="<?php echo $mn4['MA_MON'] ?>"><?php echo $mn4['TEN_MON'] ?></td>
                        <td class="contener_th"><input name = "gia_mon" value="<?php echo $mn4['GIA'] ?>" type="number" step = "1000" min="0"/></td>
                    </div>
                    <div class="list__removeItem">  
                        <td class="contener_short"><button type = "submit"name="ma_mon_del" value="<?= $mn4['MA_MON'] ?>">❌</button></td>
                        <td class="contener_short"><button type = "submit"name="ma_mon_up" value="<?= $mn4['MA_MON'] ?>">Save</button></td>
                    </div>
                    </tr>
                    </form>
                <?php } endforeach; ?>           
                <?php } else { ?>
                    <p>CHƯA CÓ KHÁCH HÀNG NÀO</p>
                <?php } ?>
            </tbody>
        </table>      
    </div>
    <div class="get_member">
        <button >Update Member</button>
        <?php foreach ($member as $mb) :  ?>
            <form action="" method="post">
                <div class="list__item">
                    <input class="contener_th" name = "fullname" value="<?php echo $mb['fullname'] ?>" />
                    <input class="contener_th" name = "email" value="<?php echo $mb['email'] ?>" />
                    <input class="contener_th" name = "birthday" type="date" value="<?php echo $mb['birthday'] ?>" />
                    <input class="contener_th" name = "sex" value="<?php echo $mb['sex'] ?>" />
                    <button name="Save_Mb" type="Submit"> Save</button>
                </div>
        <?php endforeach ?>
    </div>
    <a href="../view/Security/register.php">Register</a>
</body>