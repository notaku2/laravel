<?php

/**
 * @OA\Schema(
 *      title="Update Answer request",
 *      description="Update Answer request body data",
 *      type="object",
 *      required={"character","line","user_id","title_id","chapter_id","question_id"}
 * )
 */

class UpdateAnswerRequest
{
    /**
     * @OA\Property(
     *      title="character",
     *      description="Character of the new answer",
     *      example="A nice answer"
     * )
     *
     * @var string
     */
    public $character;

    /**
     * @OA\Property(
     *      title="line",
     *      description="Line of the new answer",
     *      example="A nice answer"
     * )
     *
     * @var string
     */
    public $line;

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="Title's id of the new chapter",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="title_id",
     *      description="Title's id of the new chapter",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $title_id;

    /**
     * @OA\Property(
     *      title="chapter_id",
     *      description="Chapter's id of the new question",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $chapter_id;

    /**
     * @OA\Property(
     *      title="question_id",
     *      description="Question's id of the new answer",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $question_id;
}