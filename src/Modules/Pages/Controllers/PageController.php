<?php namespace EyeCore\Modules\Pages\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Pages\Repositories\PageRepository;

/**
 * Class PageController
 * @package EyeCore\Modules\Pages\Controllers
 */
class PageController extends Controller
{
    /**
     * @var PageRepo|PageRepository
     */
	private $pageRepo;

    /**
     * PageController constructor.
     * @param PageRepository $pageRepo
     */
	function __construct(PageRepository $pageRepo)
	{
		$this->pageRepo = $pageRepo;
	}

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
	public function show($slug)
	{
		if($page = $this->pageRepo->getBy(['slug' => $slug, 'is_module' => false, 'published' => true], ['pagecontent', 'pagecontent.pagetemplateblock', 'pageTemplate'])) {
			$pagecontent = $page->preparePageContent();
			$pageform = $page->preparePageForm();

			return view('Pages::Frontend.' . $page->pageTemplate->getViewFile(), compact('page', 'pagecontent', 'pageform'));
		}
		abort(404);
	}

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
	public function showHomepage()
	{
		$page = $this->pageRepo->getBySlug('/', ['pagecontent', 'pagecontent.pagetemplateblock', 'pageTemplate']);
		$pagecontent = $page->preparePageContent();
        $pageform = $page->preparePageForm();

		return view('Pages::Frontend.' . $page->pageTemplate->getViewFile(), compact('page', 'pagecontent', 'pageform'));
	}
}
