<?php

namespace BasicDashboard\Web\Dashboard\Services;
use BasicDashboard\Web\Common\BaseController;


class DashboardService extends BaseController
{
    public function __construct(
        
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}