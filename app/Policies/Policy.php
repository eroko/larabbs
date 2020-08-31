<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
	{
	    // before 方法会在策略中其他所有方法执行之前执行
        // 三种返回值 1.true：通过授权；2.false：拒绝所有授权；3.null：通过其他策略决定授权通过与否。

        if ($user->can('manage_contents')){
            return true;
        }
	}
}
