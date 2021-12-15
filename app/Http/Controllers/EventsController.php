<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function index()
    {
        return view("Events.events");
    }

    public function fetch()
    {
        $events = Event::query()->select('id', 'title', 'start', 'end', 'location', 'description', 'category_fk_id',
            'type', 'sponsors_image', 'details_image', 'photo_gallery', 'video_gallery', 'created_at')->get();
        //$events = Event::all();
        return response()->json($events);
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'event_key' => 'required|unique:events,event_key|max:255',
                'title_ar' => 'required:events,title|max:255',
                'title_en' => 'required:events,title|max:255',
                'description_ar' => 'required:events,description|max:255',
                'description_en' => 'required:events,description|max:255',
            ], [
                'title_ar.required' => "Arabic title required",
                'title_en.required' => "English title required",
                'description_ar.required' => "Arabic Description required",
                'description_en.required' => "English Description required",
            ]);
            if ($validator->passes()) {
                $event = new Event();
                //$event->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
                //$event->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
                $event->title = $request->title_en;
                $event->description = $request->description_en;
                $event->start = $request->event_start;
                $event->end = $request->event_end;
                $event->location = $request->location;
                $event->category_fk_id = $request->category;
                $event->type = $request->event_type;
                $event->event_key = $request->event_key;
                $event->url = $request->event_external_link;
                $event->sponsors_image = $request->sponsors_image;
                $event->details_image = $request->details_image;
                $event->photo_gallery = $request->photo_image;
                $event->video_gallery = $request->video_image;
                $event->created_at = Carbon::now();
                $event->updated_at = Carbon::now();
                $event->save();
                $event_fk_id = $event->id;
                /*Save event user*/
                /*Organizer*/
                $event_organizer = new EventUser();
                $event_organizer->event_fk_id = $event_fk_id;
                $event_organizer->name = $request->organizer_ar_name;
                $event_organizer->name = $request->organizer_en_name;
                $event_organizer->phone = $request->organizer_phone;
                $event_organizer->email = $request->organizer_email;
                $event_organizer->website_name = $request->organizer_website_name;
                $event_organizer->website_url = $request->organizer_website_url;
                $event_organizer->save();
                /*Manager*/
                $event_manager = new EventUser();
                $event_organizer->event_fk_id = $event_fk_id;
                $event_manager->name = $request->manager_ar_name;
                $event_manager->name = $request->manager_en_name;
                $event_manager->phone = $request->manager_phone;
                $event_manager->email = $request->manager_email;
                $event_manager->save();
                return response()->json(['success' => 'Successfully create new event', 'event' => $event]);
            }

            return response()->json(['error' => $validator->errors()->toArray()]);
            //return response()->json(['error' => 'Failed to create event']);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
