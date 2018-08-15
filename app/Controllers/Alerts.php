<?php namespace App\Controllers;

use Base\Routing\Controller;
use App\Models\Alerts as AlertModel;

class Alerts extends Controller
{


	public function get($handle)
	{
		$alert = AlertModel::getByHandle($handle);

		if ($alert) {
			return $alert;
		}

		return;
	}


	public function list()
	{
		$alerts = AlertModel::getAll();

		if ($alerts) {
			return $alerts;
		}

		return;
	}


    public function add()
	{
		$handle = $this->request->post('handle');
		$description = $this->request->post('description','');
		$status = $this->request->post('status','Y');

		$alertId = AlertModel::insert([
			'handle' => $handle,
			'description' => $description,
			'status' => $status
		]);

		if ($alertId) {
			return AlertModel::get($alertId);
		}

		config()->set('api', [
			'error' => 'true',
			'message' => 'Failed to create new alert'
		]);

		return;
	}


    public function edit($oldHandle)
	{
		$handle = $this->request->post('handle');
		$description = $this->request->post('description');
		$status = $this->request->post('status');

		$fields = [];

		if ($handle) {
			$fields['handle'] = $handle;
		}

		if ($description) {
			$fields['description'] = $description;
		}

		if ($status) {
			$fields['status'] = $status;
		}

		$alertId = AlertModel::editByHandle($oldHandle, $fields);

		if ($alertId) {
			return AlertModel::get($alertId);
		}

		config()->set('api', [
			'error' => 'true',
			'message' => 'Failed to edit alert'
		]);

		return;
	}


    public function delete($handle)
	{
		$handle = $this->request->post('handle');

		AlertModel::deleteByHandle($handle);

		$alert = AlertModel::getByHandle($handle);

		if ($alert) {

			config()->set('api', [
    			'error' => 'true',
    			'message' => 'Failed to delete alert'
    		]);

			return $alert;
		}

		return;
	}

}
