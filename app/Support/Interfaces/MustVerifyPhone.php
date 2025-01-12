<?php

namespace App\Support\Interfaces;

interface MustVerifyPhone
{

    public function hasVerifiedPhone(): bool;

    public function markPhoneAsVerified(): bool;

    public function sendPhoneVerificationNotification();

    public function getPhoneForVerification(): string;

}
