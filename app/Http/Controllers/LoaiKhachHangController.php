<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\loaikhachhang as LoaiKhachHangResource;
use App\loaikhachhang;

class LoaiKhachHangController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/loaikhachhang",
	 *   summary="Create khachhang",
	 *   operationId="loaikhachhang_POST",
	 *   tags={"Loại Khách Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="lkh_ten",
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
		$loaikhachhang = new loaikhachhang();
		$loaikhachhang->lkh_ten = $request->lkh_ten;;
		$loaikhachhang->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/loaikhachhang",
	 *   summary="Get all loaikhachhang..",
	 *   operationId="loaikhachhang_GET",
	 *   tags={"Loại Khách Hàng"},
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
		$data = loaikhachhang::paginate();
		return LoaiKhachHangResource::collection($data);
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/loaikhachhang/{id}",
	 *   summary="Delete loaikhachhang...",
	 *   operationId="loaikhachhang_DELETE",
	 *   tags={"Loại Khách Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input lkh_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = loaikhachhang::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/loaikhachhang/{id}",
	 *   summary="Get loaikhachhang by ID..",
	 *   operationId="loaikhachhang_SHOW",
	 *   tags={"Loại Khách Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_loaikhachhang..",
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
		$data = loaikhachhang::findOrFail($id);
		return new LoaiKhachHangResource($data);
	}

	 /**
	  * @SWG\Patch(
	  *   path="/api/loaikhachhang/{id}",
	  *   summary="Update loaikhachhang",
	  *   operationId="loaikhachhang_PATCH",
	  *   tags={"Loại Khách Hàng"},
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
	  *       name="lkh_ten",
	  *       in="formData",
	  *       type="string"
	  *   ),
	  *   @SWG\Response(response=200, description="successful operation"),
	  *   @SWG\Response(response=406, description="not acceptable"),
	  *   @SWG\Response(response=500, description="internal server error")
	  * )
	  *
	  */

     public function update(Request $request,$id)
     {
		$update = loaikhachhang::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("Updated!", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
