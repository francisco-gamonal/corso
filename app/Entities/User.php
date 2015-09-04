<?php namespace Corso\Entities;use Illuminate\Auth\Authenticatable;use Illuminate\Auth\Passwords\CanResetPassword;use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;class User extends Entity implements AuthenticatableContract, CanResetPasswordContract {	use Authenticatable, CanResetPassword;	/**	 * The database table used by the model.	 *	 * @var string	 */	protected $table = 'users';	/**	 * The attributes that are mass assignable.	 *	 * @var array	 */	protected $fillable = ['name', 'email', 'password'];	/**	 * The attributes excluded from the model's JSON form.	 *	 * @var array	 */	protected $hidden = ['password', 'remember_token'];        /**         * Concatenacion de nombre completo usuario         * @return type         */        public function nameComplete(){            return $this->name.' '.$this->last;        }	/**	 * Get the unique identifier for the user.	 *	 * @return mixed	 */	public function getAuthIdentifier()	{		// TODO: Implement getAuthIdentifier() method.	}	/**	 * Get the password for the user.	 *	 * @return string	 */	public function getAuthPassword()	{		// TODO: Implement getAuthPassword() method.	}	/**	 * Get the token value for the "remember me" session.	 *	 * @return string	 */	public function getRememberToken()	{		// TODO: Implement getRememberToken() method.	}	/**	 * Set the token value for the "remember me" session.	 *	 * @param  string $value	 * @return void	 */	public function setRememberToken($value)	{		// TODO: Implement setRememberToken() method.	}	/**	 * Get the column name for the "remember me" token.	 *	 * @return string	 */	public function getRememberTokenName()	{		// TODO: Implement getRememberTokenName() method.	}	/**	 * Get the e-mail address where password reset links are sent.	 *	 * @return string	 */	public function getEmailForPasswordReset()	{		// TODO: Implement getEmailForPasswordReset() method.	}	public function getDatos()	{		// TODO: Implement getDatos() method.	}}