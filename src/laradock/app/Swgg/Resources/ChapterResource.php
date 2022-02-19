<?php

/**
 * @OA\Schema(
 *     title="ChapterResource",
 *     description="Chapter resource",
 *     @OA\Xml(
 *         name="ChapterResource"
 *     )
 * )
 */
class ChapterResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Swgg\ApiModels\Chapter[]
     */
    private $data;
}