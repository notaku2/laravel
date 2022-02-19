<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnswersApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/answers",
     *      operationId="getAnswersList",
     *      tags={"Answers"},
     *      summary="Get list of answers",
     *      description="Returns list of answers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/AnswerResource")
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
        abort_if(Gate::denies('answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnswerResource(Answer::with(['question'])->get());
    }

    /**
     * @OA\Post(
     *      path="/answers",
     *      operationId="storeAnswer",
     *      tags={"Answers"},
     *      summary="Store new answer",
     *      description="Returns answer data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreAnswerRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Answer")
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
    public function store(StoreAnswerRequest $request)
    {
        $answer = Answer::create($request->all());

        return (new AnswerResource($answer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/answers/{id}",
     *      operationId="getAnswerById",
     *      tags={"Answers"},
     *      summary="Get answer information",
     *      description="Returns answer data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Answer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Answer")
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
    public function show(Answer $answer)
    {
        abort_if(Gate::denies('answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnswerResource($answer->load(['question']));
    }

    /**
     * @OA\Put(
     *      path="/answers/{id}",
     *      operationId="updateAnswer",
     *      tags={"Answers"},
     *      summary="Update existing answer",
     *      description="Returns updated answer data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Answer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateAnswerRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Answer")
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
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $answer->update($request->all());

        return (new AnswerResource($answer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/answers/{id}",
     *      operationId="deleteAnswer",
     *      tags={"Answers"},
     *      summary="Delete existing answer",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Answer id",
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
    public function destroy(Answer $answer)
    {
        abort_if(Gate::denies('answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}