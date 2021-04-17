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

    public function insert($nome, $morada, $telefone, $nContribuinte){
        $this->db->insert('associacao')
            ->values([':nome', ':morada', ':telefone', ':nContribuinte'], ['nome', 'morada', 'telefone', 'nContribuinte'])
            ->runQuery([':nome'=>$nome, ':morada'=>$morada, ':telefone'=>$telefone, ':nContribuinte'=>$nContribuinte]);
        return $this->db->select(['id'])
            ->from('associacao')
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->runQuery()[0]->id;
    }

    public function insertImage($image, $assocId){
        $this->db->insert('imagensassociacao')
            ->values([':caminho', ':associacaoId'], ['caminho', 'associacaoId'])
            ->runQuery([':caminho'=>$image, ':associacaoId'=>$assocId]);
    }

    public function update($id, $nome, $morada, $telefone, $nContribuinte){
        $this->db->update('associacao')
            ->set(['nome=:nome', 'morada=:morada', 'telefone=:telefone', 'nContribuinte=:nContribuinte'])
            ->where('id=:id')
            ->runQuery([':id'=>$id, ':nome'=>$nome, ':morada'=>$morada, ':telefone'=>$telefone, ':nContribuinte'=>$nContribuinte]);
    }

    public function delete($id){
        $this->db->delete('associacao')
            ->where('id=:id')
            ->runQuery([':id'=>$id]);
        $this->deleteImgs($id);
    }

    public function deleteImgs($assocId){
        $caminhos = $this->db->select(['caminho'])
            ->from('imagensassociacao')
            ->where('associacaoId=:associacaoId')
            ->runQuery([':associacaoId'=>$assocId]);
        $this->db->delete('imagensassociacao')
            ->where('associacaoId=:associacaoId')
            ->runQuery([':associacaoId'=>$assocId]);
        iterate($caminhos, function ($el){
            $path = $el->caminho;
            $img = explode('/', $path);
            $img = end($img);
            $path = UP_ABSPATH.'/associacoes/'.$img;
            if (file_exists($path))
                unlink($path);
        });
    }
}