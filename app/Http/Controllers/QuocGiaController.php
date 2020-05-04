<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\quocgia as QuocGiaResources;
use App\quocgia;

class QuocGiaController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/quocgia",
	 *   summary="Create quocgia",
	 *   operationId="quocgia_POST",
	 *   tags={"QuocGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="qg_ten",
	 *       in="formData",
	 *       required=true,
	 *       type="string"
	 *   ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function create(Request $request) {
		$create = new quocgia();
        $create->qg_ten = $request->qg_ten;
		$create->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/quocgia",
	 *   summary="Get all quocgia..",
	 *   operationId="quocgia_GET",
	 *   tags={"QuocGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function index() {
		$data = quocgia::with('nhasanxuat')->paginate();
		return quocgiaResources::collection($data);
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/quocgia/{id}",
	 *   summary="Delete quocgia...",
	 *   operationId="quocgia_DELETE",
	 *   tags={"QuocGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input quocgia_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = quocgia::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/quocgia/{id}",
	 *   summary="Get quocgia by ID..",
	 *   operationId="quocgia_SHOW",
	 *   tags={"QuocGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_quocgia..",
	 *          in="path",
	 *          required=true,
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function show($id) {
		$data = quocgia::findOrFail($id);
		return new quocgiaResources($data);
	}

	 /**
	  * @SWG\Patch(
	  *   path="/api/quocgia/{id}",
	  *   summary="Update quocgia",
	  *   operationId="quocgia_PATCH",
	  *   tags={"QuocGia"},
	  *   security={
	  *       {"ApiKeyAuth": {}}
	  *   },
	  *   @SWG\Parameter(
	  *       name="id",
	  *       in="path",
	  *		  required=true,
	  *       type="integer"
      *   ),
      *   @SWG\Parameter(
	  *       name="qg_ten",
	  *       in="formData",
	  *       required=true,
	  *       type="string"
	  *   ),
	  *   @SWG\Response(response=200, description="successful operation"),
	  *   @SWG\Response(response=406, description="not acceptable"),
	  *   @SWG\Response(response=500, description="internal server error")
	  * )
	  *
	  */

     public function update(Request $request, $id)
     {
		$update = quocgia::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("Updated!", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
