<?php

namespace App\Repositories\Eloquent;

use App\DTO\Users\AuthDTO;
use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\UsersRepositoryInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

class UserRepository implements UsersRepositoryInterface
{
    public function index(int $amount): Paginator{
        return User::simplePaginate($amount);
    }

    public function show(string $idUser): stdClass{
        $user = User::find($idUser);
        return (Object) $user->toArray();
    }

    public function store(CreateUserDTO $userDto): stdClass
    {
        $user = User::create((array) $userDto);
        return (object) $user->toArray();
    }

    public function update(UpdateUserDTO $userDto): void{
        try{
            User::where('id', $userDto->id)
            ->update([
                'name' => $userDto->name,
                'email' => $userDto->email,
                'password' => Hash::make($userDto->password)
            ]);
        } catch (Exception $e){
            throw new Exception('Error on change User');
        }
    }

    public function login(AuthDTO $userDto): string
    {
        $user = User::where('email', $userDto->email)->first();
        if (!$user || !Hash::check($userDto->password, $user->password)) {
            return response('Credentials incorrects', 400)
                ->header('Content-Type', 'text/plain');
        }
        $token = $user->createToken($userDto->device_name)->plainTextToken;
        return $token;
    }

    private function disconnectOtherDevices(User $user): void{
        $user->tokens()->delete();
    }


    public function destroy(string $idUser): void{
        User::destroy($idUser);
    }

    public function find(string $idUser): User{
        return User::find($idUser);
    }
}
