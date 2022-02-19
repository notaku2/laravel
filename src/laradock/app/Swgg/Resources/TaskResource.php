<?php

/**
 * @OA\Schema(
 *     title="TaskResource",
 *     description="Task resource",
 *     @OA\Xml(
 *         name="TaskResource"
 *     )
 * )
 */
class TaskResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Swgg\ApiModels\Task[]
     */
    private $data;
}