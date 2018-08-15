<?php namespace App\Controllers;

use Base\Routing\Controller;
use App\Models\Alerts as AlertModel;
use App\Models\Activity as ActivityModel;

class Activity extends Controller
{

	public function get($id)
	{
		$record = ActivityModel::get($id);

		if ($record) {
			return $record;
		}

		return;
	}


	public function list($handle)
	{
		$dismissed = $this->request->get('dismissed',0);

		$alert = AlertModel::getByHandle($handle);
		if (!$alert) return;

		$records = ActivityModel::getAll($alert->id, $dismissed);

		if ($records) {
			return $records;
		}

		return;
	}


	public function add($handle)
	{
		$type    = strtoupper($this->request->post('type'));
		$level   = strtoupper($this->request->post('level','LOW'));
		$group   = strtoupper($this->request->post('group','DEFAULT'));
		$message = $this->request->post('message','');

		$alert = AlertModel::getByHandle($handle);
		if (!$alert)
		{
			config()->set('api', [
				'error' => 'true',
				'message' => 'Failed to create activity. Missing Alert.'
			]);
		}

		$recordId = ActivityModel::insert($alert->id, [
			'type' => $type,
			'level' => $level,
			'group' => $group,
			'message' => $message
		]);

		if ($recordId) {
			return ActivityModel::get($recordId);
		}

		config()->set('api', [
			'error' => 'true',
			'message' => 'Failed to create new alert'
		]);

		return;
	}


	public function dismiss($id)
	{
		$record = ActivityModel::get($id);

		if ($record) {

			ActivityModel::dismiss($id, 1);

			return ActivityModel::get($id);
		}

		config()->set('api', [
			'error' => 'true',
			'message' => 'Failed to dismiss activity'
		]);

		return;
	}


	public function dismissAll($handle)
	{
		$alert = AlertModel::getByHandle($handle);
		if (!$alert) {
			config()->set('api', [
				'error' => 'true',
				'message' => 'Failed to dismiss activity. Missing Alert.'
			]);
		}

		ActivityModel::dismissAll($alert->id);

		$records = ActivityModel::getAll($alert->id, 0);

		if ($records) {
		return $records;
		}

		return;
	}


	public function delete($id)
	{
		ActivityModel::delete($id);

		$record = ActivityModel::get($id);

		if ($record) {

			config()->set('api', [
				'error' => 'true',
				'message' => 'Failed to delete activity'
			]);

			return $record;
		}

		return;
	}

}
