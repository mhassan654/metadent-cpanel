<?php
namespace App\Services\CustomLogger;

use App\Services\CustomLogger\DatabaseHandler;



/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */


 use Monolog\Logger;

 class DatabaseLogger
 {
    /**
     *  Create a custom Monolog instance
     * @return Logger
     */

     public function __invoke(array $config)
     {
        return new Logger('Database',[
            new DatabaseHandler(),
        ]);
     }
 }
