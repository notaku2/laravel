<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Resources\TitleResource;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TitlesApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/titles",
     *      operationId="getTitlesList",
     *      tags={"Titles"},
     *      summary="Get list of titles",
     *      description="Returns list of titles",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TitleResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        abort_if(Gate::denies('title_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TitleResource(Title::with(['user'])->get());
    }

    /**
     * @OA\Post(
     *      path="/titles",
     *      operationId="storeTitle",
     *      tags={"Titles"},
     *      summary="Store new title",
     *      description="Returns title data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTitleRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Title")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(StoreTitleRequest $request)
    {
        $title = Title::create($request->all());

        return (new TitleResource($title))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/titles/{id}",
     *      operationId="getTitleById",
     *      tags={"Titles"},
     *      summary="Get title information",
     *      description="Returns title data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Title id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Title")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show(Title $title)
    {
        abort_if(Gate::denies('title_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TitleResource($title->load(['user']));
    }

    /**
     * @OA\Put(
     *      path="/titles/{id}",
     *      operationId="updateTitle",
     *      tags={"Titles"},
     *      summary="Update existing title",
     *      description="Returns updated title data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Title id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTitleRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Title")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(UpdateTitleRequest $request, Title $title)
    {
        $title->update($request->all());

        return (new TitleResource($title))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/titles/{id}",
     *      operationId="deleteTitle",
     *      tags={"Titles"},
     *      summary="Delete existing title",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Title id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Title $title)
    {
        abort_if(Gate::denies('title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}