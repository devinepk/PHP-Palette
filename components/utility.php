<?php

    function getDb() {
        return pg_connect("host=localhost port=5432 dbname=palettemaker user=palettemakeruser password=colorcolorcolor");
    }

    function getColorList() {
        $result = pg_query(getDb(), "SELECT name, hex FROM color ORDER BY hex");
        return pg_fetch_all($result);
    }

?>
