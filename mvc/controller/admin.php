<?php

class AdminController {
    public function __construct()
    {
        grantAdmin();
    }
}
