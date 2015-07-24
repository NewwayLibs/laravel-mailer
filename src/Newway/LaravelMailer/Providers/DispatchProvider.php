<?php namespace Newway\LaravelMailer\Providers;

use Newway\LaravelMailer\Models\Dispatch as DispatchModel;
use Newway\LaravelMailer\Validators\Dispatch as DispatchValidator;
use App;
use Config;

class DispatchProvider implements ResourceProviderInterface {

    public function __construct()
    {
        $this->dispatchValidator = new DispatchValidator(App::make('Laracasts\Validation\FactoryInterface'));
    }

    public function find($id) {
        return DispatchModel::findOrFail($id);
    }

    public function model() {
        return new DispatchModel;
    }

    public function create(array $data) {
        $this->dispatchValidator->validate($data);
        return DispatchModel::create($data);
    }

    public function update($dispatch, array $data) {
        $dispatch = $this->getDispatch($dispatch);
        $this->dispatchValidator->validate($data);
        return $dispatch->update($data);
    }

    public function destroy($dispatch) {
        $dispatch = $this->getDispatch($dispatch);
        $dispatch->delete();
    }

    public function attachGroups($dispatch, array $ids) {
        $dispatch = $this->getDispatch($dispatch);
        $dispatch->groups()->attach($ids);
    }

    public function attachClients($dispatch, array $ids) {
        $dispatch->clients()->attach($ids);
    }

    public function send($dispatch) {
        $dispatch = $this->getDispatch($dispatch);

        $provider = Config::get('laravel-mailer::provider.' . $dispatch->type);
        $class = 'Newway\\LaravelMailer\\Mailers\\' . ucfirst($dispatch->type) . '\\' . str_replace(' ', '', ucwords(strtolower($provider)));

        $mailProvider = new $class;
        $mailProvider->send($dispatch);
        $dispatch->status = DispatchModel::STATUS_SEND;
        $dispatch->save();
    }

    protected function getDispatch($dispatch) {
        if(!$dispatch instanceof DispatchModel) {
            $dispatch = DispatchModel::find($dispatch);
        }
        return $dispatch;
    }

}
