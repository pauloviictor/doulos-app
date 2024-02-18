<?php

namespace App\Http\Controllers\Api;

use App\DTO\Ministry\CreateUpdateMinistryDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\Ministry;
use App\Services\MinistryService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;

class MinistryController extends Controller
{
    public function __construct(
        protected MinistryService $service
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $ministries = $this->service->index($request->amount ? $request->amount : 15);
            return DefaultResource::collection($ministries);
        }catch(Exception $error){
            Log::error("Failed list ministry $error");
            return response('Failed list Ministry', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $dto = CreateUpdateMinistryDTO::makeFromRequest($request);
            return $this->service->store($dto);
        }catch(Exception $error){
            Log::error("Failed store ministry $error");
            return response('Failed store Ministry', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return $this->service->show($id);
        }catch(Exception $error){
            Log::error("Failed show ministry id: $id = $error");
            return response('Failed show Ministry', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $dto = CreateUpdateMinistryDTO::makeFromRequest($request);
            $this->service->update($dto, $id);
            return response('Ministry updated', Response::HTTP_OK);
        } catch (Exception $error) {
            return response("Failed update Ministry id $id = $error", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return response('Ministry destroyed', Response::HTTP_NO_CONTENT);
        } catch(Exception $error){
            Log::error("Failed destroyed Ministry id $id = $error");
            return response('Failed destroyed Ministry', Response::HTTP_BAD_REQUEST);
        }
    }

    public function attach(Request $request){
        try{
            $ministry = $this->service->show($request->ministryId);
            Gate::authorize('attachMinistry', [$ministry->name]);
            $this->service->attachNewmember($request->newMemberUserId, new Ministry((array) $ministry));
        } catch(Exception $error){
            Log::error("Failed attach user ID: $request->newMemberUserId to Ministry ID: $request->ministryId = $error");
            return response('Failed attach user to Ministry ' .$error , Response::HTTP_BAD_REQUEST);
        } catch (UnauthorizedException $unauthorized){
            return response($unauthorized->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }
}
