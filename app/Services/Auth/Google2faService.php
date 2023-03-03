<?php

namespace App\Services\Auth;

use App\Mail\Verify2faCode;
use Illuminate\Support\Facades\Mail;
use App\Services\Images\QrCodeService;
use Illuminate\Database\Eloquent\Model;
use PragmaRX\Google2FAQRCode\Google2FA;

class Google2faService
{

    private static function generate2faSecretAndQRCode(string $email): array
    {
        $google2fa = app('pragmarx.google2fa');
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

        $twoFa = new Google2FA();
        $qr_code_url = $twoFa->getQRCodeUrl(
            config('app.name'),
            $email,
            $registration_data['google2fa_secret']
        );

        // $data = QrCodeService::storeImage($qr_code_url);

        return [
            // 'QR_Image' => $data['filepath'],
            'QR_Image' => $qr_code_url,
            'secret' => $registration_data['google2fa_secret']
        ];
    }

    public static function checkUserEnabled2FA(Model $user)
    {
        if (!$user->google2fa_secret) {
            // send user an email to verify 2FA
            self::generate2faSecret($user);
            throw new \Exception('Check your email to enable 2fa login app to continue');
        }
        return true;
    }

    public static function generate2faSecret(Model $user): void
    {
        $data = self::generate2faSecretAndQRCode($user->email);
        $user->update([
            'google2fa_secret' => $data['secret']
        ]);

        // $qr_code = $data["QR_Image"];

        $qr_code = "https://media.istockphoto.com/id/1385983273/vector/qr-code-with-skull-and-crossbones-qr-code-scam-concept-flat-style-illustration.jpg?s=612x612&w=0&k=20&c=w_whc-_twqGOpPFxubcAnulgIuw_Wt79sFndLBNQhEw=";

        $details = [
            'title' => 'Two-step verification setup',
            'code' => $data['secret'],
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'qr_code' => $qr_code
        ];

        Mail::to($user->email)->send(new Verify2faCode($details));
    }
}
