<?php namespace EyeCore\Modules\Pages\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Pages\Models\Page;

/**
 * Class PageRepository
 * @package EyeCore\Modules\Pages\Repositories
 */
class PageRepository extends EloquentRepository implements PageInterface {

    /**
     * @var Page
     */
    private $model;

    /**
     * @param Page $model
     */
    function __construct(Page $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @param $page_id
     * @return Page|Page[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|\Illuminate\Database\Query\Builder[]
     */
    public function getWithPageContent($page_id) {
        $page = $this->model->withTrashed()->with(['pagetemplate.blocks.blockcontent' => function($q) use($page_id) {
            $q->where('page_id', '=', $page_id);
        }])->findOrFail($page_id);
        foreach($page->pagetemplate->blocks as $pagetemplateblock) {
            foreach($pagetemplateblock->blockcontent as $key => $pagecontent) {
                $pagetemplateblock->blockcontent[$pagecontent->language] = $pagecontent;
                unset($pagetemplateblock->blockcontent[$key]);
            }
        }
        return $page;
    }
	
	/**
	 * @param $title
	 * @param bool $limit
	 * @return bool
	 */
	public function searchByTitle($title, $limit = false)
	{
		if($title == '') {
			return false;
		}
		
		$query = $this->model->where(function($query) use ($title) {
			$query->where('title', 'like', '%' . $title . '%');
		});
		
		if($limit) {
			$query->take($limit);
		}
		
		return $query->get();
	}
}
