<?php
    function get_MonAn_MN1() {
        global $db;
        $query = 'SELECT * FROM mon_an  WHERE mon_an.MA_MENU = 1' ;
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }

    function get_MonAn_MN2() {
        global $db;
        $query = 'SELECT * FROM mon_an  WHERE mon_an.MA_MENU = 2' ;
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }

    function get_MonAn_MN3() {
        global $db;
        $query = 'SELECT * FROM mon_an  WHERE mon_an.MA_MENU = 3' ;
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }

    function get_MonAn_MN4() {
        global $db;
        $query = 'SELECT * FROM mon_an  WHERE mon_an.MA_MENU = 4' ;
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }

    function delete_MonAn($ma_mon) {
        global $db;
        $query = 'UPDATE mon_an
        SET DEL=1
        WHERE MA_MON = :ma_mon;';
        $statement = $db->prepare($query);
        $statement->bindValue(':ma_mon', $ma_mon);
        $statement->execute();
        $statement->closeCursor();
    }
    function add_MonAn($ten_MonAn, $Gia, $ma_Menu ) {
        global $db;
        $query = 'INSERT INTO mon_an (TEN_MON, GIA, MA_MENU, DEL)
              VALUES
                 (:ten_MonAn, :Gia, :ma_Menu, 0)';
        $statement = $db->prepare($query);
        $statement->bindValue(':ten_MonAn', $ten_MonAn);
        $statement->bindValue(':Gia', $Gia);
        $statement->bindValue(':ma_Menu', $ma_Menu);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_gia($ma_mon, $gia_moi) {
        global $db;
        $query = 'UPDATE mon_an
        SET GIA = :gia_moi
        WHERE MA_MON = :ma_mon;';
        $statement = $db->prepare($query);
        $statement->bindValue(':ma_mon', $ma_mon);
        $statement->bindValue(':gia_moi', $gia_moi);
        $statement->execute();
        $statement->closeCursor();
    }

    session_start();
    function get_Member() {
        global $db;
        $query = 'SELECT * FROM member WHERE username=:username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }

    function update_member($fullname, $email, $birthday, $sex) {
        global $db;
        $query = 'UPDATE member
        SET fullname = :fullname, 
            email = :email,
            birthday = :birthday,
            sex = :sex
        WHERE username = :username;';
        $statement = $db->prepare($query);
        $statement->bindValue(':fullname', $fullname);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':birthday', $birthday);
        $statement->bindValue(':sex', $sex);
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_ban($so_ban) {
        global $db;
        $query = 'UPDATE ban
        SET DEL=1
        WHERE SO_BAN = :so_ban;';
        $statement = $db->prepare($query);
        $statement->bindValue(':so_ban', $so_ban);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_ban($so_ban) {
        global $db;
        $query = 'UPDATE ban
        SET DEL=0
        WHERE SO_BAN = :so_ban;';
        $statement = $db->prepare($query);
        $statement->bindValue(':so_ban', $so_ban);
        $statement->execute();
        $statement->closeCursor();
    }
        
?>