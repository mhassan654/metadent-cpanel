<?php

namespace App\Modules\Examples;

use App\Modules\Common\Helper;

class ExamplesMapper
{
    public static function mapFrom(array $data): Examples
    {
        return new Examples(
            Helper::nullStringToInt($data["id"] ?? null),
            $data["name"],
            $data["email"],
            $data["deletedAt"] ?? null,
            $data["createdAt"] ?? date("Y-m-d H:i:s"),
            $data["updatedAt"] ?? null,

        );

    }

}
