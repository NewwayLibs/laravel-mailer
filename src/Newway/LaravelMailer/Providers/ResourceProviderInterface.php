<?php namespace Newway\LaravelMailer\Providers;

interface ResourceProviderInterface {

    public function find($id);

    public function create(array $data);

    public function update($client, array $data);

    public function destroy($client);

    public function model();

}
