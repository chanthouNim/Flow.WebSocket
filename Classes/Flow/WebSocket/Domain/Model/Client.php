<?php
namespace Flow\WebSocket\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Flow.WebSocket".        *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Client {

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $socket;

	/**
	 * @var boolean
	 */
	protected $handshake;

	/**
	 * @var string
	 */
	protected $pid;


	function Client($id, $socket) {
		$this->id = $id;
		$this->socket = $socket;
		$this->handshake = false;
		$this->pid = null;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	/**
	 * @return socket
	 */
	public function getSocket() {
		return $this->socket;
	}

	/**
	 * @param string $socket
	 * @return void
	 */
	public function setSocket($socket) {
		$this->socket = $socket;
	}

	/**
	 * @return boolean
	 */
	public function getHandshake() {
		return $this->handshake;
	}

	/**
	 * @param boolean $handshake
	 * @return void
	 */
	public function setHandshake($handshake) {
		$this->handshake = $handshake;
	}

	/**
	 * @return string
	 */
	public function getPid() {
		return $this->pid;
	}

	/**
	 * @param string $pid
	 * @return void
	 */
	public function setPid($pid) {
		$this->pid = $pid;
	}
}
?>