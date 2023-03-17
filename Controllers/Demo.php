<?php

namespace Demo\Controllers;

use Demo\Models\DemoModel;

class Demo extends \App\Controllers\Admin\BaseController
{
    protected $demoModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->demoModel = new DemoModel();
    }

    public function index()
    {

        $data['title'] = trans('demo_lang.demo');
        $numRows = $this->demoModel->getDebugCount();

        $pager = paginate($this->perPage, $numRows);
        $data['demo_data'] = $this->demoModel->getDebugPaginated($this->perPage, $pager->offset);

        return view('Demo\Views\demo\index', $data);
    }
}
