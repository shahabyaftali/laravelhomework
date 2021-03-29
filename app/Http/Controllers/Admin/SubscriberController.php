<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function store(SubscriberRequest $request)
    {
      $subscriber = $request->validated();
      Subscriber::create($subscriber);
      return back()->with('subscribed', 'true');
    }

    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
