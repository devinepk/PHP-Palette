<?php

    require_once("utility.php");

    function getColorList() {
        $result = pg_query(getDb(), "SELECT id, name, hex FROM color ORDER BY name");
        return pg_fetch_all($result);
    }

    function addColor($name, $hex) {
        $sql = "INSERT INTO color (name, hex) VALUES ('$name', '$hex')";
        $result = pg_query(getDb(), $sql);
        if ($result) {
            $GLOBALS["statusMessage"] = "<strong>$name</strong> was added.";
            $GLOBALS["statusMessageClass"] = "alert-success";
        }
        else {
            $GLOBALS["statusMessage"] = "<strong>$name</strong> was not added.";
            $GLOBALS["statusMessageClass"] = "alert-danger";
        }
    }

    function deleteColor($id) {
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
