<?php

namespace App\DAO;


use App\Models\User;
use App\Models\AbstractModel;

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
     * @return array
     */
    public function findAll()
    {
        $query = $this->getPDO()->query('SELECT * FROM users');
        $rows = $query->fetchAll();
        $users = [];
        foreach($rows as $row)
            $users[] = $this->buildDomainObject($row);

        return $users;
    }

    /**
     * Save an user into the database
     *
     * @param $user User
     */
    public function save($user)
    {
        if($user->getId() == NULL) {
            $sql = 'INSERT INTO users VALUES(?,?,?,?,?,?,?,?,?)';
            $statement = $this->getPDO()->prepare($sql);
            $statement->execute([
                $user->getId(),
                $user->getLname(),
                $user->getFname(),
                $user->getEmail(),
                $user->getPseudo(),
                $user->getPassword(),
                $user->getPasswordSalt(),
                $user->getCreatedAt(),
                $user->getUpdatedAt()
            ]);
        }
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
        $user->setPseudo($row['pseudo']);
        $user->setPassword($row['password']);
        $user->setPasswordSalt($row['password_salt']);
        $user->setCreatedAt($row['created_at']);
        $user->setUpdatedAt($row['updated_at']);

        return $user;
    }
}