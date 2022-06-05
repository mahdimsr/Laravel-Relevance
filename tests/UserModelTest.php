<?php

namespace Msr\LaravelRelevance\Tests;

use Illuminate\Foundation\Auth\User;
use Msr\LaravelRelevance\Traits\CanDoRelevance;

class UserModelTest extends User
{
    use CanDoRelevance;
    protected $guarded = ['id'];
    protected $table = 'users';
}
