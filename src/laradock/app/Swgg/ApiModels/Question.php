<?php

namespace App\Swgg\ApiModels;

/**
 * @OA\Schema(
 *     title="Question",
 *     description="Question Swagger",
 *     @OA\Xml(
 *         name="Question"
 *     )
 * )
 */
class Question
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
     *      title="User ID",
     *      description="User's id of the new title",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;
    
    /**
     * @OA\Property(
     *      title="Title ID",
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
     *      title="Chapter ID",
     *      description="Chaper's id of the new question",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $chapter_id;


    /**
     * @OA\Property(
     *     title="Chapter",
     *     description="question's chapter model"
     * )
     *
     * @var \App\Swgg\ApiModels\Chapter
     */
    private $chapter;
}