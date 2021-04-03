<?php


class AssociacaoModel extends MainModel{
    public function __construct($info = null){
        parent::__construct($info);
        $this->tableName = "Associacao";
    }

    public function getAssociacaoInfo($id){
        $assocInfo = $this->db->select()->from($this->tableName)->where("id=:id")->runQuery([':id'=>$id]);
        if (in_array('Gerir Associações', $this->info->permissions) && $this->userIsOnAssociacao($id))
            $assocInfo['socios'] = $this->db->select()->from('inscricoes')->where("associacaoId=:id")->runQuery([':id'=>$id]);
        return $assocInfo;
    }

    public function getAll(){
        $result = $this->db->select()->from($this->tableName)->runQuery();
        for ($i=0;$i<count($result);$i++){
            $result[$i]->permissions = unserialize($result[$i]->permissions);
        }
        return $result;
    }

    private function userIsOnAssociacao($id){
        $result = $this->db->select(['id'])->from($this->tableName)->where("userId=:userId and associacaoId=:associacaoId")->runQuery([':userId'=>$this->info->id, ':associacaoId'=>$id]);
        return isset($result[0]);
    }
}