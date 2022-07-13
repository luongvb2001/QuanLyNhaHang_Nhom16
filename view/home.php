<?php
    require_once('../controller/auth.php');
?>
<?php include_once("../model/db.php") ?>
<?php include_once("layout.php") ?>
<html>
    <body>
    <div class="container">
    <table>
        <thead>
            <tr><th style="border: solid">Table</th></tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM ban";
                $result = $connect->query($sql);
                while($row = $result->fetch_assoc()) {
             ?>
            <form method="POST">
                 <tr>
                    <td style="border: solid"><?php echo $row["SO_BAN"] ?></td>
                </tr>
            </form>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </body>
</html>