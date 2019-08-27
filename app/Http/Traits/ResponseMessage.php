<?php
/**
 * Created by PhpStorm.
 * User: SSE
 * Date: 2/24/2019
 * Time: 3:17 PM
 */

namespace App\Http\Traits;


Trait ResponseMessage
{
    /*public $create = "Created Successfully";
    public $create_fail = "Sorry !! Create Failed";
    public $update = "Updated Successfully";
    public $update_fail = "Sorry !! Update Failed";
    public $delete = "Delete Successfully";
    public $delete_fail = "Sorry !! Delete Failed";*/

    public $message =
        [
            'message' => "Created Successfully",
            'alert-type' => 'success'
        ];
    public $create_success_message = [
        'message' => 'Created Successfully',
        'alert-type' => 'success',
    ];
    public $create_fail_message = [
        'message' => 'Sorry !! Create Failed',
        'alert-type' => 'error',
    ];

    public $edit_fail_message = [
        'message' => 'Sorry !! Edit Failed',
        'alert-type' => 'error',
    ];

    public $not_found_message = [
        'message' => 'Sorry !! Not Found',
        'alert-type' => 'info',
    ];

    public $update_success_message = [
        'message' => 'Update Successfully',
        'alert-type' => 'success',
    ];

    public $update_fail_message = [
        'message' => 'Sorry!! Update Failed',
        'alert-type' => 'error',
    ];
    public $delete_success_message =
        [
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        ];

    public $delete_fail_message =
        [
            'message' => 'Sorry !! Delete Failed',
            'alert-type' => 'error'
        ];


}