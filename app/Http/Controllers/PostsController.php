<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{


       /**
     * Get List Post
     * @OA\Get (
     *     path="/api/posts",
     *     tags={"Post"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="example description"
     *                     ),
     *                      @OA\Property(
     *                          property="slug",
     *                          type="string",
     *                          example="example slug"
     *                      ),
     *                      @OA\Property(
     *                          property="status",
     *                          type="string",
     *                          example="example status"
     *                      ),
     *                      @OA\Property(
     *                          property="visibility",
     *                          type="string",
     *                          example="example visibility"
     *                      ),
     *                      @OA\Property(
     *                          property="publicationDate",
     *                          type="string",
     *                          example="example publicationDate"
     *                      ),
     *                      @OA\Property(
     *                          property="image",
     *                          type="string",
     *                          example="example image"
     *                      ),
     *                      @OA\Property(
     *                          property="extract",
     *                          type="string",
     *                          example="example extract"
     *                      ),
     *                      @OA\Property(
     *                          property="author",
     *                          type="string",
     *                            example="example author"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2022-08-11T09:25:53.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2022-08-11T09:25:53.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $posts = Posts::all();
        return response()->json(['posts'=>$posts], 200);
    }

/**
 * Get Detail Post
 * @OA\Get (
 *     path="/api/posts/{slug}",
 *     tags={"Post"},
 *     @OA\Parameter(
 *         in="path",
 *         name="slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="success",
 *         @OA\JsonContent(
 *              @OA\Property(property="id", type="number", example=1),
 *              @OA\Property(property="title", type="string", example="title"),
 *              @OA\Property(property="description", type="string", example="description"),
 *              @OA\Property(property="status", type="string", example="status"),
 *              @OA\Property(property="slug", type="string", example="slug"),
 *              @OA\Property(property="visibility", type="string", example="visibility"),
 *              @OA\Property(property="publicationDate", type="string", example="publicationDate"),
 *              @OA\Property(property="image", type="string", example="image"),
 *              @OA\Property(property="extract", type="string", example="extract"),
 *              @OA\Property(property="author", type="string", example="author"),
 *              @OA\Property(property="updated_at", type="string", example="2022-O8-11T09:25:53.000000Z"),
 *              @OA\Property(property="created_at", type="string", example="2022-O8-11T09:25:53.000000Z")
 *         )
 *     )
 * )
 */
    public function show($slug)
    {
        $posts = Posts::find($slug);
        if($posts){
            return response()->json(['posts'=>$posts], 200);
        }else{
            return response()->json(['message'=>'Aucun post Trouvé'], 404);
        }
        
    }


/**
 * Create Post
 * @OA\Post (
 *     path="/api/posts/add",
 *     tags={"Post"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                      type="object",
 *                      @OA\Property(
 *                          property="title",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="description",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="slug",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="visibility",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="publicationDate",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="image",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="extract",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="author",
 *                          type="string"
 *                      )
 *                 ),
 *                 example={
 *                     "title":"example title",
 *                     "description":"example description",
 *                     "slug":"example slug",
 *                     "statut":"example statut",
 *                     "visibility":"example visibility",
 *                     "publicationDate":"example publicationDate",
 *                     "image":"example image",
 *                     "extract":"example extract",
 *                     "author":"example author"
 *                }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="number", example=1),
 *              @OA\Property(property="title", type="string", example="title"),
 *              @OA\Property(property="description", type="string", example="description"),
 *              @OA\Property(property="status", type="string", example="status"),
 *              @OA\Property(property="slug", type="string", example="slug"),
 *              @OA\Property(property="visibility", type="string", example="visibility"),
 *              @OA\Property(property="publicationDate", type="string", example="publicationDate"),
 *              @OA\Property(property="image", type="string", example="image"),
 *              @OA\Property(property="extract", type="string", example="extract"),
 *              @OA\Property(property="author", type="string", example="author"),
 *              @OA\Property(property="updated_at", type="string", example="2022-O8-11T09:25:53.000000Z"),
 *              @OA\Property(property="created_at", type="string", example="2022-O8-11T09:25:53.000000Z")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="invalid",
 *          @OA\JsonContent(
 *              @OA\Property(property="msg", type="string", example="fail"),
 *          )
 *      )
 * )
 */

    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|max:191',
            'description'=>'required|max:191',
            'slug'=>'required|max:191',
            'status'=>'required|max:191',
            'visibility'=>'required|max:191',
            'publicationDate'=>'required|max:191',
            'image'=>'required|max:191',
            'extract'=>'required|max:191',
            'author'=>'required|max:191',
        ]);


        $post = new Posts;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->status = $request->status;
        $post->visibility = $request->visibility;
        $post->publicationDate = $request->publicationDate;
        $post->image = $request->image;
        $post->extract = $request->extract;
        $post->author = $request->author;
        $post->save();
        return response()->json(['message'=>'post ajouter avec Succès !'], 200);

    }

/**
 * Update Post
 * @OA\Put (
 *     path="/api/posts/update/{slug}",
 *     tags={"Post"},
 *     @OA\Parameter(
 *         in="path",
 *         name="slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                      type="object",
 *                      @OA\Property(
 *                          property="title",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="description",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="slug",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="visibility",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="publicationDate",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="image",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="extract",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="author",
 *                          type="string"
 *                      )
 *                 ),
 *                 example={
 *                     "title":"example title",
 *                     "description":"example description",
 *                     "slug":"example slug",
 *                     "statut":"example statut",
 *                     "visibility":"example visibility",
 *                     "publicationDate":"example publicationDate",
 *                     "image":"example image",
 *                     "extract":"example extract",
 *                     "author":"example author"
 *                }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="number", example=1),
 *              @OA\Property(property="title", type="string", example="title"),
 *              @OA\Property(property="description", type="string", example="description"),
 *              @OA\Property(property="status", type="string", example="status"),
 *              @OA\Property(property="slug", type="string", example="slug"),
 *              @OA\Property(property="visibility", type="string", example="visibility"),
 *              @OA\Property(property="publicationDate", type="string", example="publicationDate"),
 *              @OA\Property(property="image", type="string", example="image"),
 *              @OA\Property(property="extract", type="string", example="extract"),
 *              @OA\Property(property="author", type="string", example="author"),
 *              @OA\Property(property="updated_at", type="string", example="2022-O8-11T09:25:53.000000Z"),
 *              @OA\Property(property="created_at", type="string", example="2022-O8-11T09:25:53.000000Z")
 *          )
 *      )
 * )
 */


    public function update(Request $request, $slug)
    {
        
        $request->valslidate([
            'title'=>'required|max:191',
            'description'=>'required|max:191',
            //'slug'=>'required|max:191',
            'status'=>'required|max:191',
            'visibility'=>'required|max:191',
            'publicationDate'=>'required|max:191',
            'image'=>'required|max:191',
            'extract'=>'required|max:191',
            'author'=>'required|max:191',
        ]);


        $post = Posts::find($slug);
      if($post){
         
        $post->title = $request->title;
        $post->description = $request->description;
        //$post->slug = $request->slug;
        $post->status = $request->status;
        $post->visibility = $request->visibility;
        $post->publicationDate = $request->publicationDate;
        $post->image = $request->image;
        $post->extract = $request->extract;
        $post->author = $request->author;
        $post->update();
        return response()->json(['message'=>'post modifier avec Succès !'], 200);
      }else{
        return response()->json(['message'=>'Aucun post trouvé !'], 404);
      }

    } 

    /**
     * Delete Post
     * @OA\Delete (
     *     path="/api/posts/delete/{slug}",
     *     tags={"Post"},
     *     @OA\Parameter(
     *         in="path",
     *         name="slug",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="delete post success")
     *         )
     *     )
     * )
     */
    public function destroy($slug)
    {
        $post = Posts::find($slug);
      if($post){
        $post->delete();
        return response()->json(['message'=>'post supprimé avec Succès !'], 200);
      }else{
        return response()->json(['message'=>'Aucun post trouvé !'], 404);
      }

    } 

}
