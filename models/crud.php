<?php

interface crud {

    public function create($table, $obj);

    public function readAll($table, $obj);

    public function readOne($table, $obj, $id);

    public function update();

    public function delete($id);

}