<?php

namespace App\DAO;


use tete0148\App\Models\AbstractModel;
use tete0148\App\Models\User;

class UserDAO extends DAO {

    /**
     * @param $id
     * @return User
     */
    public function find($id)
    {
        $query = $this->getPDO()->query('SELECT * FROM users WHERE id = ' . $id);
        $row = $query->fetch();
        $query->closeCursor();

        return $this->buildDomainObject($row);
    }
    /**
     * @param array $row
     * @return AbstractModel
     */
    public function buildDomainObject(array $row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setFname($row['fname']);
        $user->setLname($row['lname']);
        $user->setEmail($row['email']);
        $user->setPseudo(['pseudo']);
        $user->setPassword($row['password']);
        $user->setPasswordSalt($row['password_salt']);
        $user->setCreatedAt($row['created_at']);
        $user->setUpdatedAt($row['updated_at']);

        return $user;
    }
}