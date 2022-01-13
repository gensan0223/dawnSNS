<?php

namespace App\Http\ViewComposers;

use Auth;
use Illuminate\View\View;

/**
 * Class LayoutComposer
 * @package App\Http\ViewComposers\User\Worker
 */
class LayoutComposer
{
    public $loginUser;

    public function __construct()
    {
        $this->loginUser = Auth::user();
    }
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'loginUser' => $this->loginUser
        ]);
    }

}