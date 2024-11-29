<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function createUser(array $data): User
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'photo' => $data['photo'] ?? null,
        ]);

        $user->assignRole('user');

        return $user;
    }

    public static function updatePhoneNumber(User $user, $newPhoneNumber): void
    {
        $user->update(['phone_number' => $newPhoneNumber]);
    }

    public static function updatePassword($user, $newPassword): void
    {
        $user->update([
            'password' => Hash::make($newPassword),
        ]);
    }

    public static function findUserByPhoneNumber($phoneNumber): User
    {
        return User::where('phone_number', $phoneNumber)->firstOrFail();
    }
}
