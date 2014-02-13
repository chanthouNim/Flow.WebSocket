<?php
namespace Flow\WebSocket\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Flow.Box".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

class MainController extends ActionController {

	/**
	 * @var Array
	 */
	protected $currentUser;

	/**
	 * @var \TYPO3\Flow\Security\Account
	 */
	protected $account;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
	 */
	protected $authenticationManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\Context
	 */
	protected $securityContext;


	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->account = $this->securityContext->getAccount();
	}

	/**
	 * Login action
	 *
	 * @param string  $username
	 * @param string  $email
	 *
	 * @Flow\Validate(argumentName="username", type="NotEmpty")
	 * @Flow\Validate(argumentName="email", type="NotEmpty")
	 * @Flow\Validate(argumentName="email", type="EmailAddress")
	 * @return void
	 */
	public function loginAction($username = NULL, $email = NULL) {
		$this->currentUser['username'] = $username;
		$this->currentUser['email'] = $email;
		$this->redirect('index', 'Chat', NULL, array('user' => $this->currentUser));
	}

	/**
	 * Log out funtion
	 *
	 * @return void
	 */
	public function logoutAction() {
		session_start();
		if(isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
		$this->addFlashMessage('Successfully logged out.');
		$this->redirect('index');
	}
}

?>