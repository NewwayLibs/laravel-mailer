<?php namespace Newway\LaravelMailer\Providers;

use Newway\LaravelMailer\Models\Client as ClientModel;
use Newway\LaravelMailer\Validators\Client as ClientValidator;
use App;

class ClientProvider {

    public function __construct()
    {
        $this->clientValidator = new ClientValidator(App::make('Laracasts\Validation\FactoryInterface'));
    }

    public function find($id) {
        return ClientModel::findOrFail($id);
    }

    public function create(array $data) {
        $this->clientValidator->validate($data);
        return ClientModel::create($data);
    }

    public function update($client, array $data) {
        if(!$client instanceof ClientModel) {
            $client = ClientModel::findOrFail($client);
        }
        $this->clientValidator->validate($data);
        return $client->update($data);
    }

    public function destroy($client) {
        if(!$client instanceof ClientModel) {
            $client = ClientModel::findOrFail($client);
        }
        $client->delete();
    }

    public function attachGroups($client, array $ids) {
        if(!$client instanceof ClientModel) {
            $client = ClientModel::find($client);
        }
        $client->groups()->attach($ids);
    }

    public function attachDispatches($client, array $ids) {
        if(!$client instanceof ClientModel) {
            $client = ClientModel::find($client);
        }
        $client->dispatches()->attach($ids);
    }

    public function model() {
        return new ClientModel;
    }

}
