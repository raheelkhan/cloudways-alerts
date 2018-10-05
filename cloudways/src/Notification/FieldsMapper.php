<?php

namespace Cloudways\Notification;

trait FieldsMapper {
    
    static $fields = [
        'cpu_usage' => 'CPU Usage',
        'load_average_15' => 'Load Average',
        'wp_version_installed' => 'Wordpress Installed Version',
        'wp_version_available' => 'Wordpress Available Version',
        'memory_peak_usage' => 'Memory Peak Usage'
    ];

}