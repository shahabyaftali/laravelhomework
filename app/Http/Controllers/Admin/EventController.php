<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
      $events_en = Event::orderBy('created_at', 'desc')->where('language', 'en')->paginate(6, ['*'], 'en');
      $events_ps = Event::orderBy('created_at', 'desc')->where('language', 'ps')->paginate(6, ['*'], 'ps');
      $events_fa = Event::orderBy('created_at', 'desc')->where('language', 'fa')->paginate(6, ['*'], 'fa');
      return view('back.event.index', compact(['events_en', 'events_ps', 'events_fa']));
    }

    public function create()
    {
      return view('back.event.create');
    }

    public function store(EventRequest $request)
    {
      $event_data = $request->validated();
      $imagePath = $request->file('image')->store('public/images/event');
      $image = basename($imagePath);
      $event_data['image'] = $image;
      Event::create($event_data);
      return redirect(route('admin.event.index'));
    }

    public function edit(Event $event)
    {
      return view('back.event.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
      $event_data = $request->validated();
      if ($request->hasFile('image')){
        $preImage = Event::find($event['id'])['image'];
        Storage::delete('public/images/event/' . $preImage);
        $imagePath = $request->file('image')->store('public/images/event');
        $image = basename($imagePath);
        $event_data['image'] = $image;
      }
      Event::where('id', $event['id'])->update($event_data);
      return redirect(route('admin.event.index'));
    }
    
    public function destroy(Event $event)
    {
      $preImage = Event::find($event['id'])['image'];
      Storage::delete('public/images/event/' . $preImage);
      $event->delete();
      return back();
    }
}
