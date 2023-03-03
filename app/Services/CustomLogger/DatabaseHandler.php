<?php

namespace App\Services\CustomLogger;
use Monolog\Handler\AbstractProcessingHandler;
use App\Services\CustomLogger\Models\LogMessage;


/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

 class DatabaseHandler extends AbstractProcessingHandler
 {
    /**
     *   @inheritDoc
     */

     public function write(array $record):void
     {
        LogMessage::create([
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'message' => $record['message'],
            'logged_at' => $record['datetime'],
            'context' => $record['context'],
            'extra' => $record['extra'],
        ]);
     }
 }
