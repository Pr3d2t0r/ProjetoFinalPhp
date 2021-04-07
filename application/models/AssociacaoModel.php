<?php


class AssociacaoModel extends MainModel{
    public function __construct($info = null){
        parent::__construct($info);
        $this->tableName = "Associacao";
    }

    public function getAssociacaoInfo($id){
        $assocInfo = $this->db->select()->from($this->tableName)->where("id=:id")->runQuery([':id'=>$id]);
        if (isset($assocInfo[0])) {
            $assocInfo[0]->socios = $this->db->select()->from('socio')->where("associacaoId=:id")->runQuery([':id' => $id]);
            return $assocInfo[0];
        }
        return false;
    }

    public function getAll(){
        return $this->db->select()->from($this->tableName)->runQuery();
    }

    public function userIsOnAssociacao($id){
        $result = $this->db->select(['id'])->from('socio')->where("id=:id and associacaoId=:associacaoId")->runQuery([':id'=>$this->info->id, ':associacaoId'=>$id]);
        return isset($result[0]);
    }
}