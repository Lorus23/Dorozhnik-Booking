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
        $category_id = $request->input('category_id');
        $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        if ($request->isMethod('POST')) {
            $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->where('time_from', '>=', $time_to)
                        ->orWhere('time_to', '<=', $time_from);
                });
            })->orWhereDoesntHave('booking')->with('category')->
                where('category_id','=',$category_id)->get();
        } else {
            $rooms = null;
        }



        return view('admin.find_rooms.index', compact('rooms', 'time_from', 'time_to','categories'));
    }
}