<?php

interface crud {

    public function create($table, $data);

    public function readAll($table, $obj);

    public function readOne($table, $obj, $id);

    public function update($table, $data);

    public function delete($table, $id);

}