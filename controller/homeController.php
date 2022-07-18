<?php
    function get_KH() {
        global $db;
        $query = 'SELECT * FROM khach_hang ORDER BY MA_KHACH_HANG';
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }
?>