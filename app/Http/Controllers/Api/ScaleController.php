<?php

namespace App\Http\Controllers\Api;

use App\Comunication\Telegram\ScaleAlert;
use App\DTO\Scale\CreateUpdateScaleDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\Ministry;
use App\Models\User;
use App\Services\ScaleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScaleController extends Controller
{

    public function __construct(
        protected ScaleService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $scales = $this->service->index($request->amount ? $request->amount : 15);
        return DefaultResource::collection($scales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dto = CreateUpdateScaleDTO::makeFromRequest($request);
        $scale = $this->service->store($dto);
        $user = User::find($scale->user_id);
        $ministry = Ministry::find($scale->ministry_id);
        ScaleAlert::sendMessage("$user->name foi escalado para o ministerio $ministry->name para o dia $scale->date");
        return $scale;
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
    public function update(Request $request, string $id)
    {
        try {
            $dto = CreateUpdateScaleDTO::makeFromRequest($request);
            $this->service->update($dto, $id);
            return response('Scale updated', Response::HTTP_OK);
        } catch (Exception $error) {
            return response('Failed update Scale', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->service->destroy($id);
            return response('Scale destroyed', Response::HTTP_NO_CONTENT);
        } catch (Exception $error) {
            return response('Failed update Scale', Response::HTTP_BAD_REQUEST);
        }
    }
}
