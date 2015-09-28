<?php namespace Rebel59\Eventtracker\Components;

use Cms\Classes\ComponentBase;
Use Rebel59\Eventtracker\Models\Event;
use Carbon\Carbon;
use Cookie;

class EventList extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'rebel59.eventtracker::lang.components.eventlist.name',
            'description' => 'rebel59.eventtracker::lang.components.eventlist.description'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->prepareVars();
        $this->loadAssets();
    }

    protected function prepareVars(){
        $this->page['events'] = $events = Event::where('date', '>=', date('Y-m-d'))->orderBy('date', 'ASC')->get();
        $this->page['today'] = Event::where('date', '=', date('Y-m-d'))->count();
        $this->page['week'] = Event::whereBetween('date', array(Carbon::now(), Carbon::now()->addWeek()))->count();
        $this->page['other_weeks'] = Event::where('date', '>', Carbon::now()->addWeeks(2   ))->count();

        foreach($events as $event){
            $cookies[$event['id']] = Cookie::get('event-'.$event['id']);
        }
        $this->page['cookie'] = $cookies;
    }

    protected function loadAssets(){
        $this->addCss('/plugins/rebel59/eventtracker/assets/css/overview-component.css');
    }

    public function onPlusOne(){
        $eventId = post('eventId');
        $eventName = "event-" . $eventId;
        $event = Event::find($eventId);
        if(!Cookie::get($eventName)){
            Cookie::queue($eventName, $eventId, 2000000); 
            $event->visitors++;
            $data = 1;
        }else{
            Cookie::queue(Cookie::forget($eventName));
            $event->visitors--;
            $data = -1;
        }
        $event->save();

        return ['state' => $data];



        
    }

}