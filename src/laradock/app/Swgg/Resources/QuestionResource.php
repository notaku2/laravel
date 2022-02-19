<?php

/**
 * @OA\Schema(
 *     title="QuestionResource",
 *     description="Question resource",
 *     @OA\Xml(
 *         name="QuestionResource"
 *     )
 * )
 */
class QuestionResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Swgg\ApiModels\Question[]
     */
    private $data;
}