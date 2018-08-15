<?php namespace App\Models;

use Base\Support\System\DB;

class Alerts
{

    const TABLE = 'BaseAlerts';


	public static function get($id)
	{
		return DB::table(static::TABLE)->where('id',$id)->first();
    }


    public static function getByHandle($handle)
	{
		return DB::table(static::TABLE)->where('handle',$handle)->first();
    }


    public static function getAll()
	{
		return DB::table(static::TABLE)->get()->all();
    }


    public static function insert($fields)
	{
        if (!isset($fields['handle'])) return false;
        if ($fields['handle']=='') return false;
        if (static::getByHandle($fields['handle'])) return false;

        $timestamp = date("Y-m-d H:i:s");

		return DB::table(static::TABLE)->insert([
            'handle' => ($fields['handle'] ?? ''),
            'description' => ($fields['description'] ?? ''),
            'status' => ($fields['status'] ?? 'Y'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);
    }


    public static function editByHandle($handle, $fields = [])
	{
        $alert = static::getByHandle($handle);
        if (!$alert) return false;

        $fields['updated_at'] = date("Y-m-d H:i:s");

		DB::table(static::TABLE)->where('id',$alert->id)->update($fields);

        return $alert->id;
    }


    public static function deleteByHandle($handle)
	{
        DB::table(static::TABLE)->where('handle',$handle)->delete();

		return true;
    }


    public static function delete($id)
	{
		DB::table(static::TABLE)->where('id',$id)->delete();

        return true;
    }

}
