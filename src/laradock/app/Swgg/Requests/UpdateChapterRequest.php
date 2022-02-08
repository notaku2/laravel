<?php

/**
 * @OA\Schema(
 *      title="Update Chapter request",
 *      description="Update Chapter request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateChapterRequest
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