<?php

/**
 * @OA\Schema(
 *     title="TitleResource",
 *     description="Title resource",
 *     @OA\Xml(
 *         name="TitleResource"
 *     )
 * )
 */
class TitleResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Swgg\ApiModels\Title[]
     */
    private $data;
}