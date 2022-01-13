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
    public $follow;
    public $followCount;
    public $follower;
    public $followerCount;

    public function __construct()
    {
        $this->loginUser = Auth::user();
        $this->follow = $this->loginUser->followUsers;
        $this->followCount = $this->follow->count();
        $this->follower = $this->loginUser->followerUsers;
        $this->followerCount = $this->follower->count();
    }
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'loginUser' => $this->loginUser,
            'followCount' => $this->followCount,
            'follower' => $this->follower,
            'followerCount' => $this->followCount,
        ]);
    }

}