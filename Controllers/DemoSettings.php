<?php

namespace Demo\Controllers;

use Demo\Models\DemoSettingsModel;

class DemoSettings extends \App\Controllers\Admin\BaseController
{
    protected $demoSettingsModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->demoSettingsModel = new DemoSettingsModel();
    }

    public function index()
    {

        $data['title'] = trans('demo_lang.demo');

        $data['demo'] = $this->demoSettingsModel->getSettings();

        return view('Demo\Views\settings\index', $data);
    }

    /**
     * Add Translations Post
     */
    public function demoSettingsPost()
    {
        $val = \Config\Services::validation();
        $val->setRule('id', trans("id"), 'required');
        $val->setRule('mode_debug', trans("demo_lang.mode_debug"), 'required');
        if (!$this->validate(getValRules($val))) {
            $response = [
                'status' => 'error',
                'message' => $val->getErrors(),
                'token' => csrf_hash()
            ];
        } else {
            $id = inputPost('id');
            if ($this->demoSettingsModel->editSettings($id)) {
                $response = [
                    'status' => 'success',
                    'message' => trans("msg_updated")
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => trans("msg_error")
                ];
            }
        }

        return json_encode($response);
    }
}
