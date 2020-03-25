<?php namespace EyeCore\Modules\SlideshowImage\Controllers;

use App\Http\Controllers\Controller, Session;
use EyeCore\Modules\Slideshow\Repositories\SlideshowRepository;
use EyeCore\Modules\SlideshowImage\Repositories\SlideshowImageRepository;
use EyeCore\Modules\SlideshowImage\Requests\SlideshowImageRequest;
use EyeCore\Modules\SlideshowImage\Models\SlideshowImage;

/**
 * Class AdminSlideshowImageController
 * @package EyeCore\Modules\SlideshowImage\Controllers
 */
class AdminSlideshowImageController extends Controller
{
    /**
     * @var SlideshowRepository
     */
    private $slideshowRepo;

    /**
     * @var SlideshowImageRepository
     */
    private $slideRepo;

    /**
     * AdminSlideshowImageController constructor.
     * @param SlideshowImageRepository $slideRepo
     * @param SlideshowRepository $slideshowRepo
     */
    function __construct(SlideshowImageRepository $slideRepo, SlideshowRepository $slideshowRepo)
    {
        $this->slideRepo = $slideRepo;
        $this->slideshowRepo = $slideshowRepo;
    }

    /**
     * @param SlideshowImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SlideshowImageRequest $request)
    {
        if($this->slideRepo->create($request->input())) {
            return back()
                ->with('flash_message', 'The slide was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param SlideshowImage $slide
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(SlideshowImage $slide)
    {
        return view('SlideshowImage::Admin.edit', compact('slide'));
    }

    /**
     * @param SlideshowImage $slide
     * @param SlideshowImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SlideshowImage $slide, SlideshowImageRequest $request)
    {
        if($slide = $this->slideRepo->update($slide->id, $request->input())) {
            return redirect()
                ->route('mc-admin.slideshows.edit', $slide->slideshow_id)
                ->with('flash_message', 'The slide update was completed successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param SlideshowImage $slide
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SlideshowImage $slide)
    {
        if($this->slideRepo->delete($slide->id)) {
            return back()->with('flash_message', 'The slide was deleted')->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param SlideshowImage $slide
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(SlideshowImage $slide)
    {
        $destroyRoute = route('mc-admin.slides.destroy', $slide->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * Upload Multiple Images
     */
    public function uploadMultipleImages()
    {
        if(request()->ajax()) {

            $images = array_pluck(request()->get('images'), 'path');

            foreach($images as $image) {
                SlideshowImage::create(array(
                    'slideshow_id' => request()->get('id'),
                    'image' => $image
                ));
            }

            Session::flash('flash_message', count($images) . ' images inserted successfully.');
            Session::flash('flash_message_type', 'success');
        }
    }
}
