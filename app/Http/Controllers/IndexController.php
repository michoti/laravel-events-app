<?php

namespace App\Http\Controllers;

use App\Repositories\Concretes\CategoryRepo;
use App\Repositories\Concretes\EventRepo;
use App\Repositories\Concretes\EventSliderRepo;
use Illuminate\Http\Request;
use App\Services\RedisService;
use Inertia\Inertia;

class IndexController extends Controller
{
    protected $redisService;
     protected $categoryRepo;
    protected $eventRepo;
    protected $eventSliderRepo;

    /**
     * IndexController constructor.
     * @param RedisService $redisService
     */
    public function __construct(RedisService $redisService, CategoryRepo $categoryRepo, EventSliderRepo $eventSliderRepo, EventRepo $eventRepo)
    {
        $this->redisService = $redisService;
        $this->categoryRepo = $categoryRepo;
        $this->eventSliderRepo = $eventSliderRepo;
        $this->eventRepo = $eventRepo;
    }

    /**
     * @param Request $request
     */
    public function showIndexPage(Request $request)
    {
        $this->redisService->storeIpAddressOfSiteVisitors($request);
        $allCategories = $this->categoryRepo->getAllCategories();
        $noofeventsimages = $this->eventRepo->getPaginatedEvents(6);
        $eventSliderImages = $this->eventSliderRepo->getEventImageSliders(6);
        $events = $this->eventRepo->getPaginatedActiveEvents(3);
        
        return Inertia::render('Home', [
            'eventSliderImages' => $eventSliderImages,
            'noofeventsimages' => $noofeventsimages,
            'allCategories' => $allCategories,
            'events' => $events,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAboutusPage()
    {
        return view('aboutus');
    }

}
