<?php

class AccountSession
{

    private $id_session;
    private $id_account;
    private $jwt_token;
    private $insert_time;
    private $is_active;

    private $cookie_name = "SL_SESSION";

    public function getIdSession()
    {
        return $this->id_session;
    }

    public function getIdAccount()
    {
        return $this->id_account;
    }

    public function getJwtToken()
    {
        return $this->jwt_token;
    }

    public function getInsertTime()
    {
        return $this->insert_time;
    }

    public function getIsActive()
    {
        return $this->is_active;
    }

    private function getCookie($index)
    {
        try {
            if (isset($_COOKIE[$index])) {
                if ($_COOKIE[$index] !== null && $_COOKIE[$index] !== "") {
                    return $_COOKIE[$index];
                }
            }
        } catch (Exception $exception) {
            error_log("getCookie: " . $exception);
        }
        return null;
    }

    private function getRequest($index)
    {
        global $postdata;
        $json = json_decode($postdata);
        try {
            if (property_exists($json, $index) && isset($json->$index)) {
                return $json->$index;
            }
        } catch (Exception $exception) {
            error_log("This error" . $exception);
        }
        return null;
    }

    public function storeSession()
    {
        global $database;
        try {
            $jwt = $this->getRequest("sl_se");
            $id_account = $this->getRequest("sl_id");
            if ($jwt !== null) {
                if ($id_account !== null) {

                    $database->query("SELECT id_session,id_account, jwt_token FROM accounts_session WHERE id_account = ? AND jwt_token = ?");
                    $database->bind(1, $id_account);
                    $database->bind(2, $jwt);
                    $result = $database->resultset();
                    if (count($result) < 1) {
                        $database->query("INSERT INTO accounts_session (id_account, jwt_token, is_active) VALUES (?,?,'Y')");
                        $database->bind(1, $id_account);
                        $database->bind(2, $jwt);
                        $database->execute();
                        $id_session = $database->lastInsertId();
                    } else {
                        $id_session = $result[0]['id_session'];
                    }

                    //$this->cleanSession();
                    $this->createSessionCookie($id_session);
                    return true;

                }
            }

            return false;
        } catch (Exception $exception) {
            error_log("storeSession " . $exception);
        }
    }

    private function cleanSession()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                if ($name !== "PHPSESSID") {
                    setcookie($name, '', time() - 1000);
                    setcookie($name, '', time() - 1000, '/');
                    unset($name);
                }
            }
        }
    }

    private function createSessionCookie($session)
    {
        $cookie_name = $this->cookie_name;
        if (!isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, md5($session), time() + (86400 * 30), "/");
        }
    }

    public function isLogged()
    {
        global $database;
        $cookie = $this->getCookie($this->cookie_name);
        if ($cookie !== null) {
            $database->query("SELECT id_session FROM accounts_session WHERE MD5(id_session) = ?");
            $database->bind(1, $cookie);
            $result = $database->resultset();
            if (count($result) > 0) {
                return $cookie;
            }
        }
        $this->cleanSession();
        return false;

    }
}
