<?php

namespace Auth;

class Auth {

    public function verifyAuthenticated()
    {
        if(!empty($_SESSION)) {
            return true;
            exit;
        }
        return false;
    }

}