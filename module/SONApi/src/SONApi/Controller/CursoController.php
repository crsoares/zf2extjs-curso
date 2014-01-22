<?php

namespace SONApi\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class CursoController extends AbstractRestfulController {
    
    public function getList() {}
    
    public function get($id);
    
    public function create($data){}
    
    public function update($id, $data) {}
    
    public function delete($id);
    
}
