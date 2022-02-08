<?php

/**
 * @OA\Schema(
 *      title="Store Title request",
 *      description="Store Title request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreTitleRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new title",
     *      example="A nice title"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="User's id of the new title",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;
}