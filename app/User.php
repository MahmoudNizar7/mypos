<?php

    namespace App;

    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laratrust\Traits\LaratrustUserTrait;
    use Sqits\UserStamps\Concerns\HasUserStamps;


    class User extends Authenticatable
    {
        use LaratrustUserTrait;
        use Notifiable;
        use HasUserStamps;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password', 'image'
        ];

        protected $appends = ['image_path'];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        public function getFirstNameAttribute($value)
        {
            return ucfirst($value);

        }//end of get first name

        public function getLastNameAttribute($value)
        {
            return ucfirst($value);

        }//end of get last name

        public function getImagePathAttribute()
        {
            return asset('uploads/user_images/' . $this->image);

        }//end of get image path

        public function roles()
        {
            return $this->belongsToMany(Role::class, 'role_user');

        }//end of products


    }//end of model
