<?php
    function has_access($access, $targetAccess)
    {
        return strhas($access, "|$targetAccess|") ? true: false;
    }

    function get_access_name()
    {
        if (isGuest()) {
            return _guest;
        }

        $access = $_SESSION["access"];
        $accessName = "";

        if (isSuperAdmin()){
            $accessName .= " - " . _super;
        } else if (isAdmin()){
            $accessName .= " - " . _manage;
        }

        if (isVip()){
            $accessName .= " - " . _member;
        } else if (isUser()){
            $accessName .= " - " . _user;
        }

        if (isVipAuthor()) {
            $accessName .= " - " . _author_vip;
        } else if (isAuthor()){
            $accessName .= " - " . _author;
        }

        return $accessName;
    }

    function isAdmin()
    {
        if (isGuest()){ return false; }

        $access = $_SESSION["access"];

        if (has_access($access, 'admin') || has_access ($access,'superadmin')){
            return true;
        }

        return false;
    }

    function isSuperAdmin()
    {
        if (isGuest()){ return false; }
        $access = $_SESSION["access"];

        if (has_access($access,'superadmin')){
            return true;
        }

        return false;
    }

    function isAuthor()
    {
        if (isGuest()){ return false; }
        $access = $_SESSION["access"];

        if (has_access($access, 'vipauthor') || has_access ($access,'author')){
            return true;
        }

        return false;
    }

    function isVipAuthor()
    {
        if (isGuest()){ return false; }
        $access = $_SESSION["access"];

        if (has_access($access, 'vipauthor')){
            return true;
        }

        return false;
    }

    function isVip()
    {
        if (isGuest()){ return false; }
        $access = $_SESSION["access"];

        if (has_access($access, 'vip')){
            return true;
        }

        return false;
    }

    function isUser()
    {
        return isset($_SESSION["access"]) ? true : false;
    }

    function isGuest()
    {
        $userId = getUserId();
        return $userId == 0;
    }

    function grantSuperAdmin()
    {
        if (!isSuperAdmin()){
            echo "Forbidden";
            exit;
        }
    }

    function grantAdmin()
    {
        if (!isAdmin()){
            echo "Forbidden";
            exit;
        }
    }