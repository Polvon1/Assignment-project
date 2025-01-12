<?php

namespace App\Support\Traits;

trait HasVerifyPhone
{

    public function hasVerifiedPhone(): bool
    {
        return $this->phone_verified_at !== null;
    }

    public function markPhoneAsVerified(): bool
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();

    }

    public function sendPhoneVerificationNotification(): void
    {

    }

    public function getPhoneForVerification(): string
    {
        return $this->phone;
    }

}
