<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChaptersApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/chapters",
     *      operationId="getChaptersList",
     *      tags={"Chapters"},
     *      summary="Get list of chapters",
     *      description="Returns list of chapters",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ChapterResource")
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
        //abort_if(Gate::denies('chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //return new ChapterResource(Chapter::with(['title'])->get());
        return Chapter::all();
    }

    /**
     * @OA\Post(
     *      path="/chapters",
     *      operationId="storeChapter",
     *      tags={"Chapters"},
     *      summary="Store new chapter",
     *      description="Returns chapter data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreChapterRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Chapter")
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
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->all());
        /*
        return (new ChapterResource($chapter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
        */
        //return (new ChapterResource($chapter));
        return $chapter;
    }

    /**
     * @OA\Get(
     *      path="/chapters/{id}",
     *      operationId="getChapterById",
     *      tags={"Chapters"},
     *      summary="Get chapter information",
     *      description="Returns chapter data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Chapter id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Chapter")
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
    public function show(Chapter $chapter)
    {
        //abort_if(Gate::denies('chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //return new ChapterResource($chapter->load(['title']));
        return $chapter;
    }

    /**
     * @OA\Put(
     *      path="/chapters/{id}",
     *      operationId="updateChapter",
     *      tags={"Chapters"},
     *      summary="Update existing chapter",
     *      description="Returns updated chapter data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Chapter id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateChapterRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Chapter")
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
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->all());
        /*
        return (new ChapterResource($chapter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
        */
        //return (new ChapterResource($chapter));
        return $chapter;
    }

    /**
     * @OA\Delete(
     *      path="/chapters/{id}",
     *      operationId="deleteChapter",
     *      tags={"Chapters"},
     *      summary="Delete existing chapter",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Chapter id",
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
    public function destroy(Chapter $chapter)
    {
        //abort_if(Gate::denies('chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chapter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}