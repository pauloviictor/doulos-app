<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Services\MemberService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{

    public function __construct(
        protected MemberService $service,
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index($amount = 15)
    {
        return $this->service->index($amount);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        try{
            return $this->service->store($request);
        } catch(Exception $error){
            Log::error("Falied store Member: $error");
            return response('Failed store Member', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, string $id)
    {
        try{
            $this->service->update($request, $id);
            return response('Member Updated', Response::HTTP_OK);
        } catch(Exception $error){
            Log::error("Falied update Member: $error");
            return response('Failed Update Member', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);
        return response('Member Destroyed', Response::HTTP_NO_CONTENT);
    }
}
