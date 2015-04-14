<?php
class SettingsForm extends CFormModel
{
 
    public $mail = array(
        'contactEmail' => '',
        'fromNoReply' => '',
        'server' => '',
        'port' => '',
        'user' => '',
        'password' => '',
    );
    public $home = array(
        'headingTitleEnglish' => '',
        'welcomeTextEnglish' => '',
        'headingTitleIndonesia' => '',
        'welcomeTextIndonesia' => '',
    );
    public $customer = array(
        'headingTitleEnglish' => '',
        'welcomeTextEnglish' => '',
        'labelTextEnglish' => '',
        'headingTitleIndonesia' => '',
        'welcomeTextIndonesia' => '',
        'labelTextIndonesia' => '',
    );
    public $validation = array(
        'headingTitleEnglish' => '',
        'welcomeTextEnglish' => '',
        'codeLabelTextEnglish' => '',
        'headingTitleIndonesia' => '',
        'welcomeTextIndonesia' => '',
        'codeLabelTextIndonesia' => '',
    );
 
    public function getAttributesLabels($key)
    {
        $keys = array(
            'googleAPIKey' => 'Google API Key',
            'numSearchResults' => 'Number of search results at one page',
            'mainTitle' => 'Main Page Title',
            'mainKwrds' => 'Default Keywords (Meta Tag)',
            'mainDescr' => 'Default Description (Meta Tag)',
        );
 
        if(array_key_exists($key, $keys))
            return $keys[$key];
 
        $label = trim(strtolower(str_replace(array('-', '_'), ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $key))));
        $label = preg_replace('/\s+/', ' ', $label);
 
        if (strcasecmp(substr($label, -3), ' id') === 0)
            $label = substr($label, 0, -3);
 
        return ucwords($label);
    }
 
    public function setAttributes($values,$safeOnly=true) 
    { 
        if(!is_array($values)) 
            return; 
 
        foreach($values as $category=>$values) 
        { 
            if(isset($this->$category)) {
                $cat = $this->$category;
                foreach ($values as $key => $value) {
                    if(isset($cat[$key])){
                        $cat[$key] = $value;
                    }
                }
                $this->$category = $cat;
            }
        } 
    }
}
?>