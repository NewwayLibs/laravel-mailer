<?php namespace Newway\LaravelMailer\Providers;

use Newway\LaravelMailer\Models\Group as GroupModel;
use Newway\LaravelMailer\Validators\Group as GroupValidator;
use App;

class GroupProvider implements ResourceProviderInterface {

    public function find($id) {
        return GroupModel::findOrFail($id);
    }

    public function create(array $data) {
        return GroupModel::create($data);
    }

    public function update($group, array $data) {
        if(!$group instanceof GroupModel) {
            $group = GroupModel::findOrFail($group);
        }
        return $group->update($data);
    }

    public function destroy($group) {
        if(!$group instanceof GroupModel) {
            $group = GroupModel::findOrFail($group);
        }
        $group->delete();
    }

    public function attachClients($group, array $ids) {
        if(!$group instanceof GroupModel) {
            $group = GroupModel::find($group);
        }
        $group->clients()->attach($ids);
    }

    public function model() {
        return new GroupModel;
    }

}
