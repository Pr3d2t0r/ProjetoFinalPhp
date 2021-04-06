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
        if (!isset($this->info->id)){
            include_once APPLICATIONPATH.'/views/includes/404.php';
            return null;
        }
        return $this->db->getUserInfo($this->info->id);
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

    public function usernameExists($username): bool{
        $result = $this->db->select(['id'])->from('socio')->where('username=:username')->runQuery([':username'=>$username]);
        if (isset($result[0]))
            return true;
        return false;
    }
}