<?php

class AdminController {
    public function _construct()
    {
        grantAdmin();
    }

}