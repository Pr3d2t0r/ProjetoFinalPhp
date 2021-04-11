<?php


class EventoModel extends MainModel{
    public function __construct($info = null){
        parent::__construct($info);
        $this->tableName = 'eventos';
    }

    public function getEvento($eventoId){
        $result = $this->db->select()
            ->from($this->tableName)
            ->where('id=:id')
            ->runQuery([':id'=>$eventoId]);
        if (isset($result[0]))
            return $result[0];
        return false;
    }

    public function getAll(){
        return $this->db->select([$this->tableName.'.*', 'associacao.nome as associacaoNome'])
            ->from($this->tableName.' inner join associacao')
            ->on($this->tableName.'.associacaoId=associacao.id')
            ->runQuery();
    }

    public function getAllAssociacao($associacaoId){
        return $this->db->select()
            ->from($this->tableName)
            ->where('associacaoId=:associacaoId')
            ->runQuery([':associacaoId'=>$associacaoId]);
    }

    public function exists($eventoId){
        if($this->getEvento($eventoId) === false)
            return false;
        return true;
    }

    public function isInscrito($userId, $eventoId){
        $result = $this->db->select()
            ->from('eventoinscricoes')
            ->where('eventoId=:eventoId and socioId=:socioId')
            ->runQuery([':eventoId'=>$eventoId, ':socioId'=>$userId]);
        return isset($result[0]);
    }

    public function inscreve($userId, $eventoId){
        $this->db->insert('eventoinscricoes')
            ->values([':eventoId', ':socioId'], ['eventoId', 'socioId'])
            ->runQuery([':eventoId'=>$eventoId, ':socioId'=>$userId]);
    }

    public function ableToParticipate($userId, $eventoId){
        $result = $this->db->select()
            ->from('eventos inner join socio')
            ->on('eventos.associacaoId=socio.associacaoId')
            ->where('eventos.id=:eventoId and socio.id=:socioId')
            ->runQuery([':eventoId'=>$eventoId, ':socioId'=>$userId]);
        return isset($result[0]);
    }
}