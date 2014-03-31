<?php namespace App\Modules\Teams\Controllers;

use App\Modules\Teams\Models\Team as Team;
use URL, HTML, FrontController;

class TeamsController extends FrontController {

    public function __construct()
    {
        $this->model = 'Team';

        parent::__construct();
    }

    public function index()
    {
        $teams = Team::orderBy('position', 'ASC')->get();

        $this->pageView('teams::index', compact('teams'));
    }

    /**
     * Show a team
     * 
     * @param  int $id The id of the news
     * @return void
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);

        $this->title($team->title);

        $this->pageView('teams::show', compact('team'));
    }

}