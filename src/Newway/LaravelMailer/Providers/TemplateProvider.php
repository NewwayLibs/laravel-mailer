<?php namespace Newway\LaravelMailer\Providers;

use Newway\LaravelMailer\Models\Template as TemplateModel;
use Newway\LaravelMailer\Validators\Template as TemplateValidator;
use App;

class TemplateProvider implements ResourceProviderInterface {

    public function find($id) {
        return TemplateModel::findOrFail($id);
    }

    public function model() {
        return new TemplateModel;
    }

    public function create(array $data) {
        return TemplateModel::create($data);
    }

    public function update($template, array $data) {
        if(!$template instanceof TemplateModel) {
            $template = TemplateModel::findOrFail($template);
        }
        return $template->update($data);
    }

    public function destroy($template) {
        if(!$template instanceof TemplateModel) {
            $template = TemplateModel::findOrFail($template);
        }
        $template->delete();
    }

}
