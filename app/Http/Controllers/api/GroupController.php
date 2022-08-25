<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\GroupListResource;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class GroupController extends BaseController
{
    public function index(): JsonResponse
    {
        $groups = Group::all();
        return $this->sendResponse($groups->toArray(), 'Groups retrieved successfully.');
    }

    public function store(Request $request)
    {
      //
    }

    public function show(Request $request, $id): JsonResponse
    {
        $group = Group::with('students')->find($id);
        if (is_null($group)) {
            return $this->sendError('Group not found.');
        }
        $withStudents = $request->query('withStudents');
        if($withStudents=='true'){
            return $this->sendResponse($group->toArray(), 'Group with students retrieved successfully.');
        }
        else{
            return $this->sendResponse(new GroupResource($group), 'Group retrieved successfully.');
        }
    }

    public function update()
    {
        //
    }

    public function destroy(Group $group): JsonResponse
    {
        $group->delete();
        return $this->sendResponse($group->toArray(), 'Group deleted successfully.');
    }

}
