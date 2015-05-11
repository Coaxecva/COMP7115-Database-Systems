<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
class  userController extends BaseController{
	protected  $layout = 'layouts.master';
	public function showProfile()
	{
		$this->layout->content = View::make('user.profile');
	}
}