<?php

interface iColecciones{ 
    public function getSmart($select = null, $where = null, $fetch = 'object', $actualizarColeccion = true);
    public function buscarPorId($id);
    public function guardar($data);
    public function consultarColeccion($where);
    public function consultarTodo();
    public function papelera($data);
    public function eliminar($data);
}