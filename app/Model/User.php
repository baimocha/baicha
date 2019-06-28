<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 模型的连接名称
     *
     * @var string
     */
    protected $connection = 'student';

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'login';

     /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'u_id';

}