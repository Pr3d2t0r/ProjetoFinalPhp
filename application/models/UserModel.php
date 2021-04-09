<?php


/**
 * Class UserModel
 * @author Rafael Velosa
 */
class UserModel extends MainModel{
    public function __construct($info = null){
        parent::__construct($info);
        $this->tableName = "socio";
    }

    public function getUserInfo(){
        if (!isset($this->info->id))
            return null;
        return $this->db->getUserInfo($this->info->id);
    }

    public function getUserAssociacao($id){
        if (!LoginCore::isSuperAdmin($id)) {
            $result = $this->db->select()->from('associacao')->where("id=(select associacaoId from socio where id=:id)")->runQuery([":id" => $id]);
            if (isset($result[0]))
                return $result[0];
            return false;
        }
        $result = $this->db->select()->from('associacao')->runQuery();
        if (count($result) > 0)
            return $result;
        return false;
    }

    function getUserEventos($userId){
        $result = $this->db->select(['eventos.*'])->from('eventos inner join eventoinscricoes')->on('eventoinscricoes.eventoId=eventos.id and eventoinscricoes.socioId=:socioId')->runQuery([':socioId'=>$userId]);
        return $result;
    }

    function getUserNoticiasGostadas($userId){
        $result = $this->db->select(['noticias.*'])->from('noticias inner join noticiasgostos')->on('noticiasgostos.noticiaId=noticias.id and noticiasgostos.socioId=:socioId')->runQuery([':socioId'=>$userId]);
        return $result;
    }

    function getUserQuotas($userId){
        $result = $this->db->select(['quotas.*'])->from('quotas')->where('socioId=:socioId')->runQuery([':socioId'=>$userId]);
        return $result;
    }

    public function getAll(){
        $result = $this->db->select()->from($this->tableName)->runQuery();
        for ($i=0;$i<count($result);$i++){
            $result[$i]->permissions = unserialize($result[$i]->permissions);
        }
        return $result;
    }

    public function getUser($id=null, $username=null){
        if ($username !== null)
            return $this->db->select()->from('socio')->where('username=:username')->limit(1)->runQuery([':username'=>$username]);
        if ($id !== null)
            return $this->db->select()->from('socio')->where('id=:id')->limit(1)->runQuery([':id'=>$id]);
        return $this->db->select()->from('socio')->where('id=:id')->limit(1)->runQuery([':id'=>$this->info->id]);
    }

    public function insert($username, $hashedPassword, $email, $nome, $assocId){
        $this->db->insert('socio')->values([':username', ':password', ':nome', ':email', ':permissions', ':associacaoId'], ['username','password','nome','email','permissions','associacaoId'])->runQuery([':username'=>$username, ':password'=>$hashedPassword,':permissions'=>serialize(['Any']), ':nome'=>$nome, ':email'=>$email, ':associacaoId'=>$assocId]);
    }

    public function updateUsername($username){
        if (!isset($this->info->id))
            return false;
        $this->db->update('socio')->set(['username=:username'])->where('id=:id')->runQuery([':id'=>$this->info->id, ':username'=>$username]);
        return true;
    }

    public function updatePassword($newPasswordHash){
        if (!isset($this->info->id))
            return false;
        $this->db->update('socio')->set(['password=:password'])->where('id=:id')->runQuery([':id'=>$this->info->id, ':password'=>$newPasswordHash]);
        return true;
    }

    public function updateNome($nome){
        if (!isset($this->info->id))
            return false;
        $this->db->update('socio')->set(['nome=:nome'])->where('id=:id')->runQuery([':id'=>$this->info->id, ':nome'=>$nome]);
        return true;
    }

    public function updateEmail($email){
        if (!isset($this->info->id))
            return false;
        $this->db->update('socio')->set(['email=:email'])->where('id=:id')->runQuery([':id'=>$this->info->id, ':email'=>$email]);
        return true;
    }

    public function usernameExists($username): bool{
        $result = $this->db->select(['id'])->from('socio')->where('username=:username')->runQuery([':username'=>$username]);
        if (isset($result[0]))
            return true;
        return false;
    }
}