<?php


class EventoModel extends MainModel{
    public function __construct($info = null){
        parent::__construct($info);
        $this->tableName = 'eventos';
    }

    public function getEvento($eventoId){
        $result = $this->db->select([$this->tableName.'.*', 'associacao.nome as associacaoNome'])
            ->from($this->tableName.' inner join associacao')
            ->on($this->tableName.'.associacaoId=associacao.id')
            ->where($this->tableName.'.id=:id')
            ->runQuery([':id'=>$eventoId]);
        if (isset($result[0]))
            return $result[0];
        return false;
    }

    public function delete($id){
        $this->db->delete($this->tableName)
            ->where('id=:id')
            ->runQuery([':id'=>$id]);
        $this->db->delete('eventoinscricoes')
            ->where('eventoId=:eventoId')
            ->runQuery([':eventoId'=>$id]);
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
            ->where('associacaoId=:associacaoId and eventos.data > NOW()')
            ->runQuery([':associacaoId'=>$associacaoId]);
    }

    public function exists($eventoId){
        if($this->getEvento($eventoId) === false)
            return false;
        return true;
    }

    public function userIsOnAssociacao($id){
        $result = $this->db->select(['id'])->from('socio')->where("id=:id and associacaoId=:associacaoId")->runQuery([':id'=>$this->info->id, ':associacaoId'=>$id]);
        return isset($result[0]);
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

    public function getAllAssocs(){
        return $this->db->select()->from('associacao')->runQuery();
    }

    public function insert($titulo, $conteudo, $assocId, $data){
        $this->db->insert('eventos')
            ->values([':titulo', ':conteudo', ':associacaoId', ':data'], ['titulo', 'conteudo', 'associacaoId', 'data'])
            ->runQuery([':titulo'=>$titulo, ':conteudo'=>$conteudo, ':associacaoId'=>$assocId, ':data'=>$data]);
        return $this->db->select(['id'])
            ->from('eventos')
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->runQuery()[0]->id;
    }

    public function update($id, $titulo, $conteudo, $data){
        $this->db->update('eventos')
            ->set(['titulo=:titulo', 'conteudo=:conteudo', 'data=:data'])
            ->where('id=:id')
            ->runQuery([':id'=>$id, ':titulo'=>$titulo, ':conteudo'=>$conteudo, ':data'=>$data]);
    }

    public function eventoIsOnAssociacao($eventoId, $associacaoId){
        $result = $this->db->select(['associacaoId'])
            ->from('eventos')
            ->where('associacaoId=:associacaoId and id=:id')
            ->runQuery([':associacaoId'=>$associacaoId, ':id'=>$eventoId]);
        return isset($result[0]);
    }

    public function clone($eventoId, $associacaoId){
        $evento = $this->getEvento($eventoId);
        if ($evento == false)
            return false;
        return $this->insert($evento->titulo, $evento->conteudo, $associacaoId, $evento->data);
    }
}