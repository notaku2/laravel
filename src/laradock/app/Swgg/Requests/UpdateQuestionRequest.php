<?php

/**
 * @OA\Schema(
 *      title="Update Question request",
 *      description="Update Question request body data",
 *      type="object",
 *      required={"character","line","user_id","title_id","chapter_id"}
 * )
 */

class UpdateQuestionRequest
{
    /**
     * @OA\Property(
     *      title="character",
     *      description="Character of the new question",
     *      example="A nice question"
     * )
     *
     * @var string
     */
    public $character;

    /**
     * @OA\Property(
     *      title="line",
     *      description="Line of the new question",
     *      example="A nice question"
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
}