<?php
namespace Flow\WebSocket\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Flow.WebSocket".        *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class ChatController extends MainController {

	/**
	 *
	 * @param array  $user
	 * @return void
	 */
	public function indexAction($user = NULL) {
		session_start();
		if (!empty($user)) {
			$_SESSION['user']= $user;
		}
		if(isset($_SESSION['user'])) {
			$this->view->assign('currentUser', $_SESSION['user']);
		}
	}
}

?>