<?php

namespace App\Http\Controllers;

use App\Http\Response\BaseResponse;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deposit(Request $request, User $user)
    {
        $amount = $request->input('amount');
        $user->deposit($amount);
        if($user->balance){
             BaseResponse::success("Success Changed!");
        }
        BaseResponse::error("Error Changed!");
    }

    public function withdraw(Request $request, User $user)
    {
        // Валидация данных, например, проверка на наличие достаточного баланса

        $amount = $request->input('amount');
        if ($user->withdraw($amount)) {
            BaseResponse::success("Success Changed!");
        } else {
            BaseResponse::error("Error Changed!");
        }
    }

    public function transactions(User $user)
    {
        $transactions = $user->transactions;
        // Вернуть список транзакций в JSON
        return response()->json($transactions);
    }

}
