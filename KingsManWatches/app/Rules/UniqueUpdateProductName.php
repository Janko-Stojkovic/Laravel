<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\DB;

class UniqueUpdateProductName implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function __invoke($attribute, $value, $fail)
    {
        $count =  DB::table("products")->where("name", $value)
            ->where("id", "<>", $this->id)->count();

        if($count) {
            $fail("Product name is already taken");
        }
    }
}
