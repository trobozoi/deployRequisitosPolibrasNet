<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'versions';
	
	protected $primaryKey = 'id';
	
	protected $fillable = [
		'name',
		'application_id'
    ];
	
	public function application()
	{
		return $this->belongsTo('App\Application');
	}
	
	public function clients()
	{
		return $this->hasMany('App\Client');
	}
	
	public function files()
	{
		return $this->hasMany('App\File');
	}
}
