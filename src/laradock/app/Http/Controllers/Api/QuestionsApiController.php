<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/questions",
     *      operationId="getQuestionsList",
     *      tags={"Questions"},
     *      summary="Get list of questions",
     *      description="Returns list of questions",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/QuestionResource")
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
        //abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //return new QuestionResource(Question::with(['chapter'])->get());
        return new QuestionResource(Question::all());
    }

    /**
     * @OA\Post(
     *      path="/questions",
     *      operationId="storeQuestion",
     *      tags={"Questions"},
     *      summary="Store new question",
     *      description="Returns question data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreQuestionRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Question")
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
    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->all());

        return (new QuestionResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/questions/{id}",
     *      operationId="getQuestionById",
     *      tags={"Questions"},
     *      summary="Get question information",
     *      description="Returns question data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Question id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Question")
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
    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionResource($question->load(['chapter']));
    }

    /**
     * @OA\Put(
     *      path="/questions/{id}",
     *      operationId="updateQuestion",
     *      tags={"Questions"},
     *      summary="Update existing question",
     *      description="Returns updated question data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Question id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateQuestionRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Question")
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
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->all());

        return (new QuestionResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/questions/{id}",
     *      operationId="deleteQuestion",
     *      tags={"Questions"},
     *      summary="Delete existing question",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Question id",
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
    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}