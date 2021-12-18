<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;


class CustomUsersController extends Controller
{

    public function index(Request $request)
    {
        $user_type = $request->type;
        $custom_users = CustomUser::query()->where('type', $user_type);
        if ($request->ajax()) {
            return DataTables::of($custom_users)
                ->addColumn('created_at', function ($projects) {
                    return '<p>' . \Carbon\Carbon::parse($projects->created_at)->diffForHumans() . '</p>';
                })
                ->addColumn('status', function ($custom_users) {
                    $status = '';
                    if ($custom_users->status == 0)
                        $status .= '<p class="text-danger">Pended</p>';
                    else
                        $status .= '<p class="text-primary">Active</p>';
                    return $status;
                })
                ->addColumn('action', function ($custom_users) {
                    $button = '<button data-id="' . $custom_users->id . '" id="delete" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></button>&nbsp;
                           <button data-id="' . $custom_users->id . '" data-type="' . $custom_users->type . '" id="edit" class="btn btn-info btn-sm" title="settings"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['created_at'], ['status'])
                ->escapeColumns(['action' => 'action'])
                ->make(true);
        }

        return view("CustomUser.custom_user", compact('custom_users', 'user_type'));
    }

    public function create_agents()
    {
        return view('CustomUser.create_agents');
    }

    public function create_partners()
    {
        return view('CustomUser.create_partners');
    }

    public function create_managers()
    {
        return view('CustomUser.create_managers');
    }

    public function create_providers()
    {
        return view('CustomUser.create_providers');
    }

    public function store_agents()
    {
        /*if ($request->ajax()) {
            if ($request->action == "create") {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:activities|max:255',
                    'description' => 'required',
                ], [
                    'name.required' => __('strings.name_required'),
                    'description.required' => __('strings.description_required'),
                ]);


                if ($validator->passes()) {
                    $data = new Activity();
                    $data->name = $request->name;
                    $data->description = $request->description;
                    $data->user_fk_id = $request->worker;
                    $data->subproject_fk_id = $request->subproject;
                    $data->type = $request->type;
                    $data->status = $request->status;
                    $data->created_at = Carbon::now();
                    $data->create_by_id = Auth::user()->id;
                    $data->save();
                    $activity_fk_id = $data->id;
                    //$this->createForm($activity_fk_id, $request->worker, $request->subproject);
                    return response()->json(['success' => __('strings.created_user'), 'activity_fk_id' => $activity_fk_id]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
                //return response()->json(['error' => $validator->errors()->all()]);
            }
        }*/
    }

    public function store_partners()
    {

    }

    public function store_managers()
    {

    }

    public function store_providers()
    {

    }

    public function edit(Request $request, $id)
    {
        $customuser = CustomUser::query()->find($id);
        $user_type = $customuser->type;
        switch ($user_type) {
            case 0:
                return view('CustomUser.edit_agents', compact('customuser'));
            case 1:
                return view('CustomUser.edit_partners', compact('customuser'));
            case 2:
                return view('CustomUser.edit_managers', compact('customuser'));
            case 3:
                return view('CustomUser.edit_providers', compact('customuser'));
        }
    }


    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->action == "update") {
                $update = CustomUser::query()->find($id);
                $update->name = $request->name;
                $update->phone = $request->phone;
                $update->status = $request->status;
                $update->updated_at = Carbon::now();
                $update->save();
                /* $update = Activity::query()->find($id)->update([
                     'name' => $request->name,
                     'description' => $request->description,
                     'status' => $request->status,
                 ]);*/
                if ($update)
                    return response()->json(['success' => __('Save update succeeded')]);
                else
                    return response()->json(['error' => __('Save update failed, Please try again')]);
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $customuser = CustomUser::query()->find($id);
            if ($customuser->delete()) {
                return response()->json(['success' => 'Remove succeeded']);
            }
            return response()->json(['error' => 'Remove failed!, Please try again']);
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
        //
    }

}
