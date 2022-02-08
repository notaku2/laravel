<?php

/**
 * @OA\Schema(
 *      title="Update Answer request",
 *      description="Update Answer request body data",
 *      type="object",
 *      required={"character","line"}
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