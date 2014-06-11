<?php
// Create the ProjectMaintainer model
use Illuminate\Database\Capsule\Manager as Capsule;

class SpdxLicense extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'spdx_license_list';
    public $timestamps = false;
    protected $primaryKey = 'license_list_pk';
}