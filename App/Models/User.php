<?php

namespace App\Models;

use App\Core\Model;
use PDO;
use PDOException;

class User extends Model
{
    protected int $id = 0;
    protected string $first_name = "";
    protected string $surname = "";
    protected string $username = "";
    protected string $email = "";
    protected string $passhash = "";

    static public function setDbColumns()
    {
        return [ 'id', 'first_name', 'surname', 'username', 'email', 'passhash' ];
    }

    static public function setTableName()
    {
        return "users";
    }

    static public function getOneByUsername($username): ?static
    {
        if ($username == null) return null;
        self::getConnection();
        try {
            $sql = "SELECT * FROM `" . static::getTableName() . "` WHERE username =?";
            $stmt = parent::getConnection()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, static::class);
            $stmt->execute([$username]);
            $ret = $stmt->fetch();
            if (!$ret) {
                return null;
            }
            return $ret;
        } catch (PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage(), 0, $e);
        }
    }

    static public function getOneByEmail($email): ?static
    {
        if ($email == null) return null;
        self::getConnection();
        try {
            $sql = "SELECT * FROM `" . static::getTableName() . "` WHERE email =?";
            $stmt = parent::getConnection()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, static::class);
            $stmt->execute([$email]);
            $ret = $stmt->fetch();
            if (!$ret) {
                return null;
            }
            return $ret;
        } catch (PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage(), 0, $e);
        }
    }

    static public function userExists()
    {
        $username = $_REQUEST["username"];
        $exists = User::getOneByUsername($username);
        $output = "";
        if ($exists) {
            $output = "Username is already used.";
        } else {
            $output = "You can use this username.";
        }
        echo $output;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPasshash(): string
    {
        return $this->passhash;
    }

    /**
     * @param string $passhash
     */
    public function setPasshash(string $passhash): void
    {
        $this->passhash = $passhash;
    }

}