<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{
    public function index()
    {
        return new JsonResponse(
            Item::all()
        );
    }

    public function store()
    {
        $item = new Item();
        $customer_owner = Customer::findOrFail(Input::get('id_customer'));

        $item->name = Input::get('name');
        $item->description = Input::get('description');
        $item->code = Input::get('code');

        $customer_owner->getAllItems()->save($item);

        return response('Item created!', 201);
    }

    public function update()
    {
        $actual_item = Item::findOrFail(Input::get('id_item'));

        $actual_item->name = Input::get('name');
        $actual_item->description = Input::get('description');
        $actual_item->code = Input::get('code');

        $actual_item->save();

        return new JsonResponse('OK');
    }

    public function delete()
    {
        Item::destroy(Input::get('id_item'));

        return new JsonResponse('Item deleted');
    }

    public function getCustomer(Item $item)
    {
        return new JsonResponse(
            $item->getCustomer
        );
    }

    public function test()
    {
        return new JsonResponse(Item::where('customer_id', 1)
            ->orderBy('id', 'desc')
            ->take(10)->get());
    }
}
