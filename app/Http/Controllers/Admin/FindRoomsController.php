<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class FindRoomsController extends Controller
{

    public function index(Request $request)
    {
        if (!Gate::allows('find_room_access')) {
            return abort(401);
        }
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');
        $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $category_id = $request->input('category_id');
        if ($request->isMethod('POST')) {
            $rooms = Room::where('category_id', '==', $category_id)->with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->where('time_from', '>=', $time_to)
                        ->orWhere('time_to', '<=', $time_from);
                });
            })->orWhereDoesntHave('booking')->get();
        } else {
            $rooms = null;
        }

        if (!is_null($rooms)) {
            $new_rooms = array();
            foreach ($rooms as $room) {
                if ($room->category_id == $category_id) {
                    array_push($new_rooms, $room);
                }
            }
        } else {
            $new_rooms = null;
        }

        return view('admin.find_rooms.index', compact('new_rooms', 'time_from', 'time_to', 'categories'));
    }
}