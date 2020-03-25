<?php namespace EyeCore\Modules\Languages\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Languages\Repositories\LanguageRepository;

/**
 * Class LanguageController
 * @package EyeCore\Modules\Languages\Controllers
 */
class LanguageController extends Controller
{
    /**
     * @var LanguageRepository
     */
    private $languageRepo;

    /**
     * LanguageController constructor.
     * @param LanguageRepository $languageRepo
     */
    function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepo = $languageRepo;
    }

    /**
     * @param $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage($language)
    {
        if(array_key_exists($language, app('languages'))) {
            return redirect()->back()->withCookie('language', $language);
        }
        return redirect()->back();
    }
}
