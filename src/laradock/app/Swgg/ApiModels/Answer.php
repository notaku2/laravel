<?php

namespace App\Swgg\ApiModels;

/**
 * @OA\Schema(
 *     title="Answer",
 *     description="Answer Swagger",
 *     @OA\Xml(
 *         name="Answer"
 *     )
 * )
 */
class Answer
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Character",
     *      description="Name of the new Character",
     *      example="A nice character"
     * )
     *
     * @var string
     */
    public $character;

    /**
     * @OA\Property(
     *      title="Line",
     *      description="Name of the new Line",
     *      example="A nice line"
     * )
     *
     * @var string
     */
    public $line;

    
    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="Question ID",
     *      description="Question's id of the new answer",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $question_id;


    /**
     * @OA\Property(
     *     title="Question",
     *     description="answer's question model"
     * )
     *
     * @var \App\Swgg\ApiModels\Question
     */
    private $question;
}