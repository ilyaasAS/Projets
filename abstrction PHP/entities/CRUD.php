<?php

interface CRUD{

     public function getOne($id);
     public function getAll();
     public function delete($id);
     public function insert($obj);
     public function update($obj);     

}