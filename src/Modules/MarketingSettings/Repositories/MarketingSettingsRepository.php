<?php namespace EyeCore\Modules\MarketingSettings\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\MarketingSettings\Models\MarketingSetting;

/**
 * Class MarketingSettingsRepository
 * @package EyeCore\Modules\MarketingSettings\Repositories
 */
class MarketingSettingsRepository extends EloquentRepository implements MarketingSettingsInterface
{
    /**
     * @var MarketingSetting
     */
    private $model;

    /**
     * MarketingSettingsRepository constructor.
     * @param MarketingSetting $model
     */
    function __construct(MarketingSetting $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * Input to array function
     * @param $input
     * @return array
     */
    public function inputToArray($input)
    {
        $settings = [];
        foreach($input as $key => $value) {
            $settings[] = [
                'setting' => $key,
                'value' => $value
            ];
        }
        return $settings;
    }

    /**
     * Update an existing object
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
