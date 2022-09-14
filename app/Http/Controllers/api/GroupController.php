<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\GroupResources\GroupResource;
use App\Models\Group;
use App\Service\GroupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupController extends BaseController
{

    protected GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(): JsonResponse
    {
        $groups = $this->groupService->findAll();
        return $this->sendResponse($groups->toArray(), 'Groups retrieved successfully.');
    }

    public function store(Request $request)
    {
      //
    }

    public function show(Request $request, $code): JsonResponse
    {
        $group = $this->groupService->findGroupByCode($code);
        $withStudents = $request->query('withProducts');
        if($withStudents=='true'){
            return $this->sendResponse($group->toArray(), 'Group with products retrieved successfully.');
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
