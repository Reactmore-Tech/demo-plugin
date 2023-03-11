<?php

namespace Demo\Controllers;


class Demo extends \App\Controllers\Admin\BaseController
{

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    public function index()
    {

        $data['title'] = trans('demo_lang.demo');

        return view('Demo\Views\demo\index', $data);
    }
}
