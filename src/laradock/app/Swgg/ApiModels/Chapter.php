<?php

namespace App\Swgg\ApiModels;

/**
 * @OA\Schema(
 *     title="Chapter",
 *     description="Chapter Swagger",
 *     @OA\Xml(
 *         name="Chapter"
 *     )
 * )
 */
class Chapter
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
     *      title="Name",
     *      description="Name of the new chapter",
     *      example="A nice chapter"
     * )
     *
     * @var string
     */
    public $name;

    
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
     *     title="Title",
     *     description="chapter title's title model"
     * )
     *
     * @var \App\Swgg\ApiModels\Title
     */
    private $title;
}