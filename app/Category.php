<?php

    namespace App;

    use Astrotomic\Translatable\Translatable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Sqits\UserStamps\Concerns\HasUserStamps;

    class Category extends Model
    {
        use Translatable;
        use HasUserStamps;
        use SoftDeletes;

        public $translatedAttributes = ['name'];
        protected $guarded = [];

        protected static function boot()
        {
            parent::boot();

            static::deleting(function ($item) {
                $relationMethods = ['products'];

                foreach ($relationMethods as $relationMethod) {
                    if ($item->$relationMethod()->count() > 0) {

                        return false;
                        //  return redirect()->back()->with('success', 'Data Added successfully.');
                    }
                }
            });
        }//end of products

        public function products()
        {
            return $this->hasMany(Product::class);

        }

    }//end of model
