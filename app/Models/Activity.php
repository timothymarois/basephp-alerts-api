<?php namespace App\Models;

use Base\Support\System\DB;
use App\Models\Alerts as AlertModel;

class Activity
{

    const TABLE = 'BaseActivity';


    public static function get($id)
	{
		return DB::table(static::TABLE)->where('id',$id)->first();
    }


    public static function getAll($alertId, $dismissed = 0)
	{
		return DB::table(static::TABLE)->where([
            'alert_id' => $alertId,
            'dismissed' => $dismissed
            ])->order('id DESC')->limit(100)->get()->all();
    }


    public static function delete($id)
	{
		DB::table(static::TABLE)->where('id',$id)->delete();

        return true;
    }


    public static function dismiss($id, $dismiss)
	{
        $alert = static::get($id);
        if (!$alert) return false;

        $fields = [];
        $fields['updated_at'] = date("Y-m-d H:i:s");
        $fields['dismissed']  = $dismiss;

		DB::table(static::TABLE)->where('id',$alert->id)->update($fields);
    }


    public static function dismissAll($alertId)
	{
        $alert = AlertModel::get($alertId);
        if (!$alert) return false;

        $fields = [];
        $fields['updated_at'] = date("Y-m-d H:i:s");
        $fields['dismissed']  = 1;

		DB::table(static::TABLE)->where('alert_id',$alert->id)->update($fields);
    }



    public static function insert($alertId, $fields = [])
	{
        $timestamp = date("Y-m-d H:i:s");

		return(DB::table(static::TABLE)->insert([
            'alert_id' => $alertId,
            '`type`' => ($fields['type'] ?? ''),
            '`message`' => ($fields['message'] ?? ''),
            '`group`' => ($fields['group'] ?? 'DEFAULT'),
            '`level`' => ($fields['level'] ?? 'LOW'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]));
    }


}
