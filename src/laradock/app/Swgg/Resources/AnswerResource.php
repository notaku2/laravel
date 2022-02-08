<?php

/**
 * @OA\Schema(
 *     title="AnswerResource",
 *     description="Answer resource",
 *     @OA\Xml(
 *         name="AnswerResource"
 *     )
 * )
 */
class AnswerResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Swgg\ApiModels\Answer[]
     */
    private $data;
}