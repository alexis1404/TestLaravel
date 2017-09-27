<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            Customer::all()
        );
    }

    public function store()
    {

        $customer = new Customer();

        $customer->name = Input::get('name');
        $customer->mail = Input::get('mail');

        $customer->save();

        return response('Customer created!', 201);
    }

    public function update()
    {
        $actual_customer = Customer::findOrFail(Input::get('id_user'));

        $actual_customer->name = Input::get('name');
        $actual_customer->mail = Input::get('mail');

        $actual_customer->save();

        return new JsonResponse('User updated');
    }

    public function delete()
    {
        Customer::destroy(Input::get('id_user'));

        return new JsonResponse('User deleted');
    }

    public function getItems(Customer $customer)
    {
        return new JsonResponse(
            $customer->getAllItems
        );
    }

    //temporary....................................................

    public function reltest()
    {
        $actual_customer = Customer::findOrFail(1);

        return new JsonResponse(
            $actual_customer->getAllTikets
        );
    }
}
