<?php

namespace App\Http\ManualOpenApi\Product;

use OpenApi\Annotations as OA;

class FavouriteProductSwaggerController
{
    /**
     * @OA\Get(
     *     path="/favourites/products",
     *     tags={"Favourites"},
     *     summary="Get user products favourites",
     *     description="Retrieve the authenticated user's favourite products.",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved favourite products",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(
     *                 property="favourites",
     *                 type="array",
     *
     *                 @OA\Items(ref="#/components/schemas/Product")
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Authentication is required",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=500,
     *         description="Failed to retrieve favourites",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="error", type="string", example="Failed to retrieve favourites"),
     *             @OA\Property(property="message", type="string", example="Server error message")
     *         )
     *     )
     * )
     */
    public function getFavourites() {}

    /**
     * @OA\Post(
     *     path="/favourites/products/{product}",
     *     tags={"Favourites"},
     *     summary="Add a product to favourites",
     *     description="Add a product to the authenticated user's favourite list.",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\Parameter(
     *         name="product",
     *         in="path",
     *         required=true,
     *         description="The ID of the product to be added to favourites",
     *
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Product added to favourites successfully",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="message", type="string", example="Product added to favourites")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=400,
     *         description="Product is already in the favourite list",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Product is already in your favourite list")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Authentication is required",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=500,
     *         description="Failed to add favourite",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="error", type="string", example="Failed to add favourite"),
     *             @OA\Property(property="message", type="string", example="Server error message")
     *         )
     *     ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Product not found in favourites",
     *
     *          @OA\JsonContent(
     *              type="object",
     *
     *              @OA\Property(property="error", type="string", example="Not Found"),
     *              @OA\Property(property="message", type="string", example="Object not fount ")
     *          )
     *      )
     * )
     */
    public function addFavourite() {}

    /**
     * @OA\Delete(
     *     path="/favourites/products/{product}",
     *     tags={"Favourites"},
     *     summary="Remove a product from favourites",
     *     description="Remove a product from the authenticated user's favourite list.",
     *     security={{"bearerAuth": {}}},
     *
     *     @OA\Parameter(
     *         name="product",
     *         in="path",
     *         required=true,
     *         description="The ID of the product to be removed from favourites",
     *
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Product removed from favourites successfully",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="message", type="string", example="Product removed from favourites")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=404,
     *         description="Product not found in favourites",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="error", type="string", example="Not Found"),
     *             @OA\Property(property="message", type="string", example="Object not fount")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Authentication is required",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     )
     * )
     */
    public function removeFavourite() {}
}
