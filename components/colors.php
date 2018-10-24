<?php

    require_once("utility.php");

    function getColorList() {
        $result = pg_query(getDb(), "SELECT id, name, hex FROM color ORDER BY hex");
        return pg_fetch_all($result);
    }

    function deleteColor($id) {

        // TODO: we definitely need to make sure that $id is safe

        $sql = "DELETE FROM color WHERE id = " . $id;
        $result = pg_query(getDb(), $sql);
        if ($result) {
            $GLOBALS["statusMessage"] = "The color was deleted.";
            $GLOBALS["statusMessageClass"] = "alert-success";
        }
        else {
            $GLOBALS["statusMessage"] = "The color was not deleted.";
            $GLOBALS["statusMessageClass"] = "alert-danger";
        }
    }



?>
