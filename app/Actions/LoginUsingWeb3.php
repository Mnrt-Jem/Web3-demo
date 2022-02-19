<?php

namespace App\Actions;

use App\Models\Rewards;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Elliptic\EC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use kornrunner\Keccak;
use function PHPUnit\Framework\isNull;

class LoginUsingWeb3
{
    public function __invoke(Request $request)
    {
        if (! $this->authenticate($request)) {
            throw ValidationException::withMessages([
                'signature' => 'Invalid signature.'
            ]);
        }

        Auth::login(User::firstOrCreate([
            'eth_address' => $request->address,
            'current_team_id' => 1,
        ]));

        $user = Auth::user();
        $userInfo = User::getUser($user->id);
        $userReward = User::getUserReward($user->id);

        if ($userInfo->name === NULL) {
            $user->name = 'Player#'.rand(1000, 9999);
            $user->save();
        }

        if ($userReward === NULL) {
            $reward = new Rewards();
            $reward->user_id = $user->id;
            $reward->reward_number = "0";
            $reward->save();
        }

        return Redirect::route('dashboard');
    }

    protected function authenticate(Request $request): bool
    {
        return $this->verifySignature(
            $request->message,
            $request->signature,
            $request->address,
        );
    }

    protected function verifySignature($message, $signature, $address): bool
    {
        $messageLength = strlen($message);
        $hash = Keccak::hash("\x19Ethereum Signed Message:\n{$messageLength}{$message}", 256);
        $sign = [
            "r" => substr($signature, 2, 64),
            "s" => substr($signature, 66, 64)
        ];

        $recId  = ord(hex2bin(substr($signature, 130, 2))) - 27;

        if ($recId != ($recId & 1)) {
            return false;
        }

        $publicKey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recId);

        return $this->pubKeyToAddress($publicKey) === Str::lower($address);
    }

    protected function pubKeyToAddress($publicKey): string
    {
        return "0x" . substr(Keccak::hash(substr(hex2bin($publicKey->encode("hex")), 1), 256), 24);
    }
    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
