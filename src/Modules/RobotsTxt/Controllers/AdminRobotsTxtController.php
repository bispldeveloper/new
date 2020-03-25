<?php namespace EyeCore\Modules\RobotsTxt\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\RobotsTxt\Repositories\RobotsTxtInterface as RobotsTxtRepo;

/**
 * Class AdminRobotsTxtController
 * @package Eyeweb\RobotsTxt
 */
class AdminRobotsTxtController extends Controller
{
    /**
     * AdminRobotsTxtController constructor.
     * @param \EyeCore\Modules\RobotsTxt\Repositories\RobotsTxtInterface $robotsTxtRepo
     */
    function __construct(RobotsTxtRepo $robotsTxtRepo)
    {
        $this->robotsTxtRepo = $robotsTxtRepo;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $robots_config = $this->robotsTxtRepo->updateConfig(request()->input());

        return redirect()
            ->route('mc-admin.siteconfig.index')
            ->with('flash_message', 'Robots.txt Updated')
            ->with('flash_message_type', 'success');
    }
}
