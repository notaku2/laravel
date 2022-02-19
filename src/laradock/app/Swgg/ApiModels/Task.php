<?php

namespace App\Swgg\ApiModels;

/**
 * @OA\Schema(
 *     title="Task",
 *     description="Task Swagger",
 *     @OA\Xml(
 *         name="Task"
 *     )
 * )
 */
class Task
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
     *      title="Title",
     *      description="Title of the new task",
     *      example="A nice title"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Content",
     *      description="Content of the new task",
     *      example="A nice content"
     * )
     *
     * @var string
     */
    public $content;

    /**
     * @OA\Property(
     *      title="Person_in_charge",
     *      description="Person_in_charge of the new task",
     *      example="A nice person_in_charge"
     * )
     *
     * @var string
     */
    public $person_in_charge;

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
}