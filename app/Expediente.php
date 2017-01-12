<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class Expediente extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword;
	 public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expediente';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
   protected $fillable = ['folio_expediente','nombre_paciente','fecha_inicio','genero','fecha_nacimimiento','recibo_pago','recibo_diagnostico','id_alumno','status','clinica'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['password', 'remember_token'];
   
}