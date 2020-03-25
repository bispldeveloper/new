<?php namespace EyeCore\Modules\SiteSettings\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\SiteSettings\Models\SiteSetting;

/**
 * Class SiteSettingRepository
 * @package EyeCore\Modules\SiteSettings\Repositories
 */
class SiteSettingRepository extends EloquentRepository implements SiteSettingInterface
{
    /**
     * @var SiteSetting
     */
    private $model;

    /**
     * SiteSettingRepository constructor.
     * @param SiteSetting $model
     */
    function __construct(SiteSetting $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @param $input
     * @return array
     */
    public function inputToArray($input)
    {
        $sitesettings = [];
        foreach($input as $key => $value) {
            $sitesettings[] = [
                'setting' => $key,
                'value' => $value
            ];
        }
        return $sitesettings;
    }

    /**
     * @param $setting
     * @param $data
     * @return bool
     */
    public function update($setting, $data)
    {
        $existingModel = $this->model->where('setting', '=', $data['setting'])->first();
        $existingModel->fill($data);
        if(!$existingModel->save()) {
            return false;
        }
        return $existingModel;
    }
}
