<?php
/**
 **Created by MUWONGE HASSAN on 20/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\SessionHandlers;

use App\Models\User;
use Illuminate\Session\DatabaseSessionHandler;

class CustomSessionHandler extends DatabaseSessionHandler
{
    /**
     * {@inheritdoc}
     *
     * @return string|false
     */
    #[\ReturnTypeWillChange]
    public function read($sessionId)
    {
        // $userId = User::current()?->id;
        // $session = (object) $this->getQuery()->where('user_id', $userId)->find($sessionId);

        // if ($this->expired($session)) {
        //     $this->exists = true;

        //     return '';
        // }

        // if (isset($session->payload)) {
        //     $this->exists = true;

        //     return base64_decode($session->payload);
        // }

        // return '';
    }

}
