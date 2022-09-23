<?php

namespace App\Http\Controllers\api;

use App\Exceptions\NotFoundException;
use App\Http\Resources\GroupResources\GroupListResource;
use App\Http\Resources\GroupResources\GroupResource;
use App\Services\GroupService;
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
        $withProducts = $request->query('withProducts');
        if($withProducts=='true'){
            return $this->sendResponse(new GroupListResource($group), 'Group with products retrieved successfully.');
        }
        else{
            return $this->sendResponse(new GroupResource($group), 'Group retrieved successfully.');
        }
    }

    public function update()
    {
        //
    }

    /**
     * @throws NotFoundException
     */
    public function destroy($id): JsonResponse
    {
        $deletedGroup=$this->groupService->deleteGroup($id);
        return $this->sendResponse($deletedGroup, 'Group deleted successfully.');
    }

}
