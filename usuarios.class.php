<?php

class usuarios 
{
    function get($conn, $ad_user_id){

        $q = "SELECT * FROM system.ad_user WHERE ad_user_id = $ad_user_id ";

        $r = $conn->Execute($q);
        //die($q);
        if(!$r->EOF){
            $this->ad_user_id = $r->fields['ad_user_id'];
            $this->ad_org_id = $r->fields['ad_org_id'];
            $this->created = $r->fields['created'];
            $this->createdby = $r->fields['createdby'];
            $this->updated = $r->fields['updated'];
            $this->updatedby = $r->fields['updatedby'];
            $this->isactive = $r->fields['isactive'];
            $this->username = $r->fields['username'];
            $this->password = $r->fields['password'];
            $this->email = $r->fields['email'];
            $this->firstname = $r->fields['firstname'];
            $this->lastname = $r->fields['lastname'];
            $this->m_warehouse_id = $r->fields['m_warehouse_id'];
            $this->nombre = $r->fields['firstname']." ".$r->fields['lastname'];
            $this->estado = ($r->fields['isactive']=='Y') ? "Activo" : "Inactivo";
            // $this->ad_employee_id = $r->fields['ad_employee_id'];

                return $this;
            }   
    }

    function getall($conn, $desc, $inicio, $tamano_pagina){
            
        $q = "SELECT a.ad_user_id FROM system.ad_user AS a ";
        $q.= "WHERE 1=1 ";
        $q.= (!empty($desc)) ? "AND firstname ILIKE '%$desc%' OR lastname ILIKE '%$desc%' " : "";
        $q.= (!empty($desc)) ? "AND username ILIKE '%$desc%' " : "";
        $q.= (!empty($desc) && is_numeric($desc)) ? "OR ad_user_id = '$ad_user_id' " : "";
//      $q.= "AND tipo = 'V' ";
        $q.= "ORDER BY a.ad_user_id ";
        //die($q);
        
        $r = $conn->Execute($q);
        $this->total = $r->RecordCount();
        $r = ($tamano_pagina!=0) ? $conn->SelectLimit($q, $tamano_pagina, $inicio) : $conn->Execute($q);
        $collection=array();
        while(!$r->EOF){
            $op = new usuarios;
            $op->get($conn, $r->fields['ad_user_id']);
            $coleccion[] = $op;

            $r->movenext();
        }
        return @$coleccion;
    }
 
    function add($conn, $datos, $ad_user_id)
    {
        $obj = json_decode($datos);
        $isactive = estatus(@$obj->isactive); 
        $password = md5($obj->password);

        $trabajador = new trabajador;
        $trab = $trabajador->get($conn, $obj->ad_employee_id);

        try {
            $conn->BeginTrans();
            $q = "INSERT INTO system.ad_user ";
            $q.= "(ad_user_id,ad_org_id, created, createdby, updated, updatedby,username, password, isactive, m_warehouse_id, firstname, lastname) ";
            $q.= "VALUES ";
            $q.= "($obj->ad_employee_id, $obj->ad_org_id, now(), $ad_user_id, now(), $ad_user_id, '$obj->username', '$password', '$isactive', '$obj->m_warehouse_id','$trab->name','$trab->name2') ";
            //die($q);

            if($conn->Execute($q)){
                
                $isactiv = "Y";
                $q2 = "INSERT INTO system.ad_session ";
                $q2.= "(ad_org_id, isactive, created, createdby, updated, updatedby,ad_user_id) ";
                $q2.= "VALUES ";
                $q2.= "($obj->ad_org_id, '$isactiv', now(), $ad_user_id, now(), $ad_user_id, $obj->ad_employee_id) ";
                //die($q2);

                $r2 = $conn->Execute($q2);

                $conn->CommitTrans();
                $this->ad_user_id = $obj->ad_employee_id;//getLastID($conn,"system.ad_user","ad_user_id");
                $this->op = true;
                $this->msj = GUARDAR;
            }

        } catch (ADODB_Exception $e) {
            $conn->RollbackTrans();
            $this->op = false;
            $this->msj = ERROR_GUARDAR." --> ".$conn->ErrorMsg();
        }

    return $this;
    }

    function update($conn, $datos, $user_id)
    {
        $obj = json_decode($datos);
        $isactive = estatus(@$obj->isactive); 
        $password = md5($obj->password);

        try {
           $q = "UPDATE system.ad_user SET updated=now(),updatedby=$user_id,ad_org_id=$obj->ad_org_id,  ";
            $q.= "username='$obj->username', password='$password', isactive = '$isactive', m_warehouse_id = '$obj->m_warehouse_id' ";
            $q.= "WHERE ad_user_id = $obj->ad_user_id";
            //die($q);
            $r = $conn->Execute($q);

            $this->op = true;
            $this->msj = ACTUALIZAR;

        } catch (Exception $e) {
            $this->op = false;
            $this->msj = ERROR_ACTUALIZAR." --> ".$conn->ErrorMsg();
        }
            
    return $this;
    }
 

}

   


?>