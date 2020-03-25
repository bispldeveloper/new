<?php namespace EyeCore\Modules\Branding\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Branding\Repositories\BrandingRepository;
use EyeCore\Modules\Branding\Requests\BrandingRequest;

/**
 * Class AdminBrandingController
 * @package EyeCore\Modules\Branding\Controllers
 */
class AdminBrandingController extends Controller
{
    /**
     * @var BrandingRepository
     */
    private $brandingRepo;

    /**
     * AdminBrandingController constructor.
     * @param BrandingRepository $brandingRepo
     */
    function __construct(BrandingRepository $brandingRepo)
    {
        $this->brandingRepo = $brandingRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $branding = $this->brandingRepo->getById(1);

        return view('Branding::Admin.index', compact('branding'));
    }

    /**
     * @param BrandingRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BrandingRequest $request, $id)
    {
        if($this->brandingRepo->update($id, $request->input())) {
            return back()
                ->with('flash_message', 'The branding update was completed successfully .')
                ->with('flash_message_type', 'success');
        }
    }
}
