<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\DefaultResource;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{

    public function __construct(
        protected RoleService $service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = $this->service->index($request->amount ? $request->amount : 15);
        return DefaultResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        return $this->service->store($request->role);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->service->show($id);
        return DefaultResource::collection($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->service->update($request->role, $id);
        return response('Role updated',Response::HTTP_OK);
    }

    /**
     * Remove the specified resoeurce from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);
        return response('Role Removed', Response::HTTP_NO_CONTENT);
    }
}
