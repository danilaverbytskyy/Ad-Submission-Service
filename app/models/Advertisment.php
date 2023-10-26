<?php

namespace App\models;

use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;

class Advertisment {
    private QueryFactory $queryFactory;
    private Auth $auth;

    public function __construct(QueryFactory $queryFactory, Auth $auth) {
        $this->queryFactory = $queryFactory;
        $this->auth = $auth;
    }


}