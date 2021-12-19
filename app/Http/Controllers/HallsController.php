<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Hall;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HallsController extends Controller
{

    public function index(Request $request)
    {
        $halls = Hall::query()->get();
        if ($request->ajax()) {
            return DataTables::of($halls)
                ->addColumn('gallery', function ($halls) {
                    $banner = asset('uploadhalls/' . $halls->gallery);
                    return '<img style="width: 60px; height: 30px;" src="' . $banner . '">';//object-position: center; object-fit: none;
                })
                ->addColumn('name', function ($halls) {
                    return '<p>' . $halls->name . '</p>';
                })
                ->addColumn('title', function ($halls) {
                    return '<p>' . $halls->title . '</p>';
                })
                ->addColumn('description', function ($halls) {
                    return '<p>' . $halls->description . '</p>';
                })
                ->addColumn('created_at', function ($halls) {
                    return '<p>' . \Carbon\Carbon::parse($halls->created_at)->diffForHumans() . '</p>';
                })
                ->addColumn('status', function ($halls) {
                    $status = '';
                    if ($halls->status == 0)
                        $status .= '<p class="text-danger">Pended</p>';
                    else
                        $status .= '<p class="text-primary">Active</p>';
                    return $status;
                })
                ->addColumn('action', function ($halls) {
                    $button = '<button data-id="' . $halls->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $halls->id . '" data-type="' . $halls->type . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['name'], ['gallery'], ['title'], ['description'], ['created_at'], ['status'])
                ->escapeColumns(['action' => 'action'])
                ->make(true);
        }
        return view("Hall.hall", compact('halls'));
    }

    public function create()
    {
        return view('Hall.create_halls');
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
        //
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
