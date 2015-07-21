<?php namespace Newway\LaravelMailer;

class Message {

    public function __construct($template, $text, array $data = []) {
        $this->template = $template;
        $this->text = $text;
        $this->data = $data;
        $this->output = '';
        $this->compile();
    }

    protected function compile() {
        if($this->template) {
            $this->output = preg_replace('/{%\s*yield\s*%}/isU', $this->text, $this->template);
        } else {
            $this->output = $this->text;
        }
        while(preg_match('/.*({%(.*)%}).*/isU', $this->output, $matches)) {
            $dataKey = $matches[2];
            $dataValue = '';
            if(preg_match('/^\s*(\w+)\s*$/', $dataKey, $matches)) {
                $dataKey = $matches[1];
                if(isset($this->data[$dataKey])) {
                    $dataValue = $this->data[$dataKey];
                }
            }
            $this->output = preg_replace('/{%.*?%}/', $dataValue, $this->output, 1);
        }
    }

    public function getMessage() {
        return $this->output;
    }

    public function __toString() {
        return $this->getMessage();
    }
}
