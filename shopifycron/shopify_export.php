<?php

//include 'ftp_config.php';
include_once 'global_config.php';

//include the library 'phpseclib0.2.1a' for Handling the SFTP connection

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib/phpseclib1.0.9');

require_once 'Net/SFTP.php';

class SFTPHandler {

	//connection parameters

	private $hostName;
	private $userName;
	private $passCode;
	private $port;
	private $localDirectory;
	private $remoteDirectory;
	private $sftp;
	private $remote_inventory;
	private $local_inventory;

	//function which is called when object is created
	function SFTPHandler() {

		$this->hostName = SFTP_SERVER;
		$this->userName = SFTP_USERNAME;
		$this->passCode = SFTP_PASSWORD;
		$this->port = SFTP_PORT;

	}

	//Connect to SFTP host

	public function connect() {

		$this->sftp = new Net_SFTP($this->hostName);

		if ($this->sftp->login($this->userName, $this->passCode)) {
			return true;
		} else {
			return false;
		}
	}

	public function uploadFile($file = null) {

		//upload a specific file to the server
		if ($file) {

			$success = $this->sftp->put(
				REMOTE_SALES_ORDER . $file,
				HOST_ORDER_UPLOAD_PATH . $file,
				NET_SFTP_LOCAL_FILE
			);
			if ($success) {

				//unlink(HOST_ORDER_UPLOAD_PATH . $file);
				return true;
			}
			return false;
		}

		//Array to store the names of xml files in the local directory.
		$filesToUpload = array();

		//Open the local directory and store all file names in $filesToUpload array

		if ($handle = opendir(HOST_ORDER_UPLOAD_PATH)) {
			//loop the local source directory
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..') {
					$filesToUpload[] = $file;
				}
			}

			closedir($handle);
		}

		//if source directory has any file to upload then upload all files to remote server
		if (!empty($filesToUpload)) {

//upload all the files to the SFTP server
			foreach ($filesToUpload as $file) {

				$success = $this->sftp->put(
					REMOTE_SALES_ORDER . $file,
					HOST_ORDER_UPLOAD_PATH . $file,
					NET_SFTP_LOCAL_FILE
				);
				// If file upload is success remove the file from local directory.

				if ($success) {

				//	unlink(HOST_ORDER_UPLOAD_PATH . $file);
					return true;
				} else {
					//failed to upload the file
					return false;
				}

			}
		}
	}

	public function downloadFile() {

		//List the files in the remote directory

		$this->sftp->chdir('.' . REMOTE_INVENTORY_DIRECTORY);

		$files = $this->sftp->nlist('.', true);

		if ($files) {

			//loop the remote source directory
			foreach ($files as $inventory) {

				if ($inventory != '.' && $inventory != '..') {

					$success = $this->sftp->get(
						REMOTE_INVENTORY . $inventory,
						HOST_INVENTORY_PATH . $inventory);

					if ($success) {

						chmod(HOST_INVENTORY_PATH . $inventory, 0777);

						return $inventory;
					} else {
						return false;
					}
				}
			}
		} else {
			return false;
		}

	}

	public function listShipping() {

		$this->sftp->chdir('.' . REMOTE_SHIPMENT_DIRECTORY);

		$files = $this->sftp->nlist('.', true);
		$shipment_array = array();

		if ($files) {
			$i = 0;

			//loop the remote source directory
			foreach ($files as $shipment) {

				if ($shipment != '.' && $shipment != '..') {

					$shipment_array[$i] = $shipment;
				}
				$i++;
			}

			if (!empty($shipment_array)) {

				return $shipment_array;
			}
			return NULL;

		} else {
			return NULL;
		}
	}

	public function getFile($file) {

		$data = $this->sftp->get(
			REMOTE_SHIPMENT_PATH . $file);

		return $data;
	}

	public function deleteFile($file) {
		$this->sftp->delete($file);
	}

	public function downloadShipping($from_location, $to_location) {

		if (!empty($from_location) && !empty($to_location)) {

			$downlod = $this->sftp->get(
				$from_location,
				$to_location);
			if ($downlod) {
				return true;
			}
			return false;

		}
		return false;

	}

}
