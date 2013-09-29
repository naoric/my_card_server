<?php 

class ImageController extends BaseController {
	
	public function image($id = -1) {
		$image = Image::findOrFail($id);
		
		$response = Response::make($image->image, '200', array('Content-Type' => $image->mime));
		
		return $response;
	}
	
}
