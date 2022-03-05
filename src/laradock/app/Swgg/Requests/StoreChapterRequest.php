<?php

/**
 * @OA\Schema(
 *      title="Store Chapter request",
 *      description="Store Chapter request body data",
 *      type="object",
 *      required={"name","user_id","title_id"}
 * )
 */

class StoreChapterRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new chapter",
     *      example="A nice chapter"
     * )
     *
     * @var string
     */
    public $name;

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
}