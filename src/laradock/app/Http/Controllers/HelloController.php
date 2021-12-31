<?php

namespace App\Http\Controllers;

class HelloController extends Controller
{
    /**
     * @OA\Get(
     *     path="/test/hello",
     *     operationId="hello",
     *     tags={"タグ"},
     *     summary="ハロー",
     *     description="こんにちは",
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="test_message",
     *                 type="string",
     *                 description="メッセージ",
     *                 example="Hello"
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $test = 'test';

        return ['test_message' => 'tes'];
    }
}