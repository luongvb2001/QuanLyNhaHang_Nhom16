<?php
    require_once('../controller/auth.php');
?>
<?php include_once("../model/db.php") ?>
<!-- <?php include_once("layout.php") ?> -->
<html>
    <head>
        <link rel="stylesheet" href="../css/home.css">
    </head>

    <body>
        <div class="container-home">
        <h1>Phuong Do</h1>
            <!-- Danh sách bàn -->
            <!-- Hiển thị bàn và trạng thái 0 là rảnh 1 là bận-->
            <nav>
                <ul>
                    <li></li>
                    <li></li>
                </ul>
            </nav>
            <div class="table-home">
                <form method="POST">
                    <?php
                        $sql = "SELECT * FROM ban";
                        $result = $connect->query($sql);
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <button>
                            <img src="../images/tabkebusy.png" alt="">
                        <?php 
                            if($row["TRANG_THAI"] == 0){
                                echo'<img src="../images/tick-xanh.png" alt="">';
                            }
                            else if($row["TRANG_THAI"] == 1){
                                echo'<img src="../images/tick-red.png" alt="">';
                            }
                        ?>
                        <!-- <img src="../images/tick-red.png" alt=""> -->
                        <!-- <img src="../images/tick-xanh.png" alt=""> -->
                    </button>                  
                    <?php } ?>
                </form>
            </div>
            <!-- Hoa don -->
            <!-- Gồm các món, giá, tổng tiền, Khách hàng -->
            <div class="add-mon-home">
                <table>
                    <thead>
                        <tr>
                            <th>Mon an</th>
                            <th>So luong</th>
                            <th>Don  gia</th>
                        </tr>
                    </thead>
                </table>
                <button>Tong tien</button>
            </div>
            <!-- Thanh toan -->
            <div class="hoa-don-home">
                <button>Thanh toan</button>
            </div>
            
        </div>
    </body>
</html>