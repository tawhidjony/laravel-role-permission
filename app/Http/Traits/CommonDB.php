<?php
/**
 * Created by PhpStorm.
 * User: SSE
 * Date: 2/3/2019
 * Time: 10:57 AM
 */

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;

Trait CommnDB
{
    public function setEnv($key, $value, $old_value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '="' . $old_value.'"',
            $key . '="'. $value .'"',
            file_get_contents(app()->environmentFilePath())
        ));
    }

}